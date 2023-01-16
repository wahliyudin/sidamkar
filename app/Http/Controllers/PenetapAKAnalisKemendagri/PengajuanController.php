<?php

namespace App\Http\Controllers\PenetapAKAnalisKemendagri;

use App\Http\Controllers\Controller;
use App\Models\PenetapanAngkaKredit;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\PenetapAKKemendagri\DataPengajuanService;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class PengajuanController extends Controller
{
    use AuthTrait, DataTableTrait;

    private UserRepository $userRepository;
    private PeriodeRepository $periodeRepository;
    private DataPengajuanService $dataPengajuanService;
    private RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;

    public function __construct(UserRepository $userRepository, PeriodeRepository $periodeRepository, DataPengajuanService $dataPengajuanService, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository)
    {
        $this->userRepository = $userRepository;
        $this->periodeRepository = $periodeRepository;
        $this->dataPengajuanService = $dataPengajuanService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
    }

    public function index()
    {
        return view('penetap-ak-analis-kemendagri.data-pengajuan.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $role_order = 'DESC';
            if (isset($request->order) && $request->order[0]['column'] == 2) {
                $role_order =  $request->order[0]['dir'];
            }
            $periode = $this->periodeRepository->isActive();
            $data = DB::select('SELECT
                    users.id,
                    user_aparaturs.nama,
                    user_aparaturs.nip,
                    roles.display_name,
                    (CASE WHEN user_aparaturs.jenis_kelamin = "P" THEN "Perempuan" ELSE "Laki-Laki" END) AS jenis_kelamin
                FROM users
                LEFT JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                JOIN role_user ON role_user.user_id = users.id
                JOIN roles ON roles.id = role_user.role_id
                LEFT JOIN mekanisme_pengangkatans ON user_aparaturs.mekanisme_pengangkatan_id = mekanisme_pengangkatans.id
                JOIN rekapitulasi_kegiatans ON (rekapitulasi_kegiatans.fungsional_id = users.id AND rekapitulasi_kegiatans.is_send IN (3) AND rekapitulasi_kegiatans.periode_id = ' . $periode?->id . ')
                WHERE users.status_akun = 1
                    AND roles.id IN (7)');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('penetap-ak-analis-kemendagri.data-pengajuan.show', $row->id) . '" class="btn btn-blue btn-sm">Detail</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function show($id)
    {
        $periode = $this->periodeRepository->isActive();
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $id)
            ->where('periode_id', $periode?->id)->first();
        $user = $this->userRepository->getUserById($id)->load('userAparatur');
        $penetapanAngkaKredit = PenetapanAngkaKredit::query()->where('periode_id', $periode?->id)->where('user_id', $user->id)->first();
        return view('penetap-ak-analis-kemendagri.data-pengajuan.show', compact('user', 'rekapitulasiKegiatan', 'penetapanAngkaKredit'));
    }

    public function ttd(Request $request, $id)
    {
        $request->validate([
            'no_penetapan' => 'required',
            'nama_penetap' => 'required',
        ], [
            'no_penetapan.required' => 'Nomor Surat Penetapan Wajib Diisi',
            'nama_penetap.required' => 'Nama Yang Menetapkan Wajib Diisi',
        ]);
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($id)->load(['userAparatur.pangkatGolonganTmt']);
        $penetapAk = $this->authUser()->load(['userPejabatStruktural']);
        $email = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('user_kemendagris', 'users.id', '=', 'user_kemendagris.user_id')
            ->where('role_user.role_id', '=', 10)
            ->select('users.id', 'user_kemendagris.email_info_penetapan')
            ->first()?->email_info_penetapan;
        if ($email == null || !$email) {
            throw ValidationException::withMessages(['Maaf, Email Info Penetapan Belum Ditentukan Oleh Admin Pusat']);
        }
        if (!isset($penetapAk?->userPejabatStruktural?->file_ttd)) {
            throw ValidationException::withMessages(['Maaf, Anda Belum Melengkapi Profil']);
        }
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode?->id);
        $this->dataPengajuanService->ttdRekapitulasi($rekap, $user, $periode, $penetapAk, $request->no_penetapan, $request->nama_penetap, $email);
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
}