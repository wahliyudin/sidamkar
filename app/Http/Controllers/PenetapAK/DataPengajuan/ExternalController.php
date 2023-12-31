<?php

namespace App\Http\Controllers\PenetapAK\DataPengajuan;

use App\Http\Controllers\Controller;
use App\Models\KabKota;
use App\Models\PenetapanAngkaKredit;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Models\UserAparatur;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\PenetapAK\DataPengajuan\ExternalService;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class ExternalController extends Controller
{
    use AuthTrait, DataTableTrait;
    private UserRepository $userRepository;
    private PeriodeRepository $periodeRepository;
    private ExternalService $externalService;
    private RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;

    public function __construct(UserRepository $userRepository, PeriodeRepository $periodeRepository, ExternalService $externalService, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository)
    {
        $this->userRepository = $userRepository;
        $this->periodeRepository = $periodeRepository;
        $this->externalService = $externalService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
    }

    public function index()
    {
        return view('penetap-ak.data-pengajuan.external.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $role_order = 'DESC';
            if (isset($request->order) && $request->order[0]['column'] == 2) {
                $role_order =  $request->order[0]['dir'];
            }
            $auth = $this->authUser()->load(['userPejabatStruktural']);
            if ($auth->userPejabatStruktural->tingkat_aparatur == 'kab_kota') {
                $internal = 'internal.kab_kota_id = ' . $auth->userPejabatStruktural->kab_kota_id;
                $aparatur = 'user_aparaturs.kab_kota_id = ' . $auth->userPejabatStruktural->kab_kota_id;
            } else {
                $internal = 'internal.provinsi_id = ' . $auth->userPejabatStruktural->provinsi_id;
                $aparatur = 'user_aparaturs.provinsi_id = ' . $auth->userPejabatStruktural->provinsi_id;
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
                JOIN kab_prov_penilai_and_penetaps AS internal ON ' . $internal . '
                JOIN rekapitulasi_kegiatans ON (rekapitulasi_kegiatans.fungsional_id = users.id AND rekapitulasi_kegiatans.is_send IN (2, 3) AND rekapitulasi_kegiatans.periode_id = ' . $periode?->id . ')
                WHERE users.status_akun = 1
                    AND user_aparaturs.kab_kota_id IN (SELECT ex_kab_kota.kab_kota_id
                        FROM kab_prov_penilai_and_penetaps AS ex_kab_kota
                            WHERE ex_kab_kota.penetap_ak_damkar_id = internal.penetap_ak_damkar_id
                                OR ex_kab_kota.penetap_ak_analis_id = internal.penetap_ak_analis_id)
                    OR user_aparaturs.provinsi_id IN (SELECT ex_provinsi.provinsi_id
                        FROM kab_prov_penilai_and_penetaps AS ex_provinsi
                            WHERE ex_provinsi.penetap_ak_damkar_id = internal.penetap_ak_damkar_id
                                OR ex_provinsi.penetap_ak_analis_id = internal.penetap_ak_analis_id)
                    AND roles.id IN (1,2,3,5,6)
                    AND users.id NOT IN (SELECT
                                users.id
                            FROM users
                            LEFT JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                            LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                            JOIN role_user ON role_user.user_id = users.id
                            JOIN roles ON roles.id = role_user.role_id
                            LEFT JOIN mekanisme_pengangkatans ON user_aparaturs.mekanisme_pengangkatan_id = mekanisme_pengangkatans.id
                            JOIN kab_prov_penilai_and_penetaps AS internal ON ' . $internal . '
                            JOIN rekapitulasi_kegiatans ON (rekapitulasi_kegiatans.fungsional_id = users.id
                                AND rekapitulasi_kegiatans.is_send IN (2, 3) AND rekapitulasi_kegiatans.periode_id = ' . $periode?->id . ')
                            WHERE users.status_akun = 1
                                    AND user_aparaturs.tingkat_aparatur = "' . $auth->userPejabatStruktural->tingkat_aparatur . '"
                                    AND roles.id IN (1,2,3,5,6)
                                    AND ' . $aparatur . ')
                    ORDER BY roles.display_name ' . $role_order);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('penetap-ak.data-pengajuan.external.show', $row->id) . '" class="btn btn-blue btn-sm">Detail</a>';
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
        return view('penetap-ak.data-pengajuan.external.show', compact('user', 'rekapitulasiKegiatan', 'penetapanAngkaKredit'));
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
        if ($penetapAk->userPejabatStruktural->tingkat_aparatur == 'provinsi') {
            $email = Provinsi::query()->where('id', $penetapAk->userPejabatStruktural->provinsi_id)->first()?->email_info_penetapan;
        } else {
            $email = KabKota::query()->where('id', $penetapAk->userPejabatStruktural->kab_kota_id)->first()?->email_info_penetapan;
        }
        if ($email == null || !$email) {
            throw ValidationException::withMessages(['Maaf, Email Info Penetapan Belum Ditentukan Oleh Admin Kab Kota / Provinsi']);
        }
        if (!isset($penetapAk?->userPejabatStruktural?->file_ttd)) {
            throw ValidationException::withMessages(['Maaf, Anda Belum Melengkapi Profil']);
        }
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode?->id);
        $this->externalService->ttdRekapitulasi($rekap, $user, $periode, $penetapAk, $request->no_penetapan, $request->nama_penetap, $email);
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
}
