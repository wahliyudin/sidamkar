<?php

namespace App\Http\Controllers\PenilaiAK\DataPengajuan;

use App\Http\Controllers\Controller;
use App\Models\PenetapanAngkaKredit;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Models\UserAparatur;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\PenilaiAK\DataPengajuan\ExternalService;
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
        return view('penilai-ak.data-pengajuan.external.index');
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
                    users.id AS user_id,
                    user_aparaturs.nama,
                    user_aparaturs.nip,
                    pangkat_golongan_tmts.nama AS pangkat,
                    roles.display_name AS jabatan,
                    user_aparaturs.status_mekanisme,
                    user_aparaturs.angka_mekanisme,
                    mekanisme_pengangkatans.nama AS mekanisme
                FROM users
                LEFT JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                JOIN role_user ON role_user.user_id = users.id
                JOIN roles ON roles.id = role_user.role_id
                LEFT JOIN mekanisme_pengangkatans ON user_aparaturs.mekanisme_pengangkatan_id = mekanisme_pengangkatans.id
                JOIN kab_prov_penilai_and_penetaps AS internal ON ' . $internal . '
                JOIN rekapitulasi_kegiatans ON (rekapitulasi_kegiatans.fungsional_id = users.id AND rekapitulasi_kegiatans.is_send IN (2, 3) AND rekapitulasi_kegiatans.periode_id = ' . $periode->id . ')
                WHERE users.status_akun = 1
                    AND user_aparaturs.kab_kota_id IN (SELECT ex_kab_kota.kab_kota_id
                        FROM kab_prov_penilai_and_penetaps AS ex_kab_kota
                            WHERE ex_kab_kota.penilai_ak_damkar_id = internal.penilai_ak_damkar_id
                                OR ex_kab_kota.penilai_ak_analis_id = internal.penilai_ak_analis_id)
                    OR user_aparaturs.provinsi_id IN (SELECT ex_provinsi.provinsi_id
                        FROM kab_prov_penilai_and_penetaps AS ex_provinsi
                            WHERE ex_provinsi.penilai_ak_damkar_id = internal.penilai_ak_damkar_id
                                OR ex_provinsi.penilai_ak_analis_id = internal.penilai_ak_analis_id)
                    AND roles.id IN (1,2,3,5,6)
                    AND users.id NOT IN (SELECT
                                users.id
                        FROM users
                        LEFT JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                        LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                        JOIN role_user ON role_user.user_id = users.id
                        JOIN roles ON roles.id = role_user.role_id
                        LEFT JOIN mekanisme_pengangkatans ON user_aparaturs.mekanisme_pengangkatan_id = mekanisme_pengangkatans.id
                        JOIN kab_prov_penilai_and_penetaps AS internal ON internal.kab_kota_id = 1101
                        JOIN rekapitulasi_kegiatans ON (rekapitulasi_kegiatans.fungsional_id = users.id
                                AND rekapitulasi_kegiatans.is_send IN (2, 3) AND rekapitulasi_kegiatans.periode_id = ' . $periode->id . ')
                        WHERE users.status_akun = 1
                                AND user_aparaturs.tingkat_aparatur = "kab_kota"
                                AND roles.id IN (1,2,3,5,6)
                                AND user_aparaturs.kab_kota_id = 1101)
                    ORDER BY roles.display_name ' . $role_order);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $this->statusMekanisme($row->status_mekanisme);
                })
                ->addColumn('action', function ($row) {
                    return view('penilai-ak.data-pengajuan.external.buttons', compact('row'))->render();
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }

    public function show($id)
    {
        $periode = $this->periodeRepository->isActive();
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $id)
            ->where('periode_id', $periode->id)->first();
        if (!isset($rekapitulasiKegiatan)) {
            abort(404);
        }
        $user = $this->userRepository->getUserById($id)->load('userAparatur');
        $penetapanAngkaKredit = PenetapanAngkaKredit::query()->where('periode_id', $periode->id)->where('user_id', $user->id)->first();
        return view('penilai-ak.data-pengajuan.external.show', compact('user', 'rekapitulasiKegiatan', 'penetapanAngkaKredit'));
    }


    public function storePenetapan(Request $request, $id)
    {
        $user = User::query()->with(['userAparatur.pangkatGolonganTmt'])->findOrFail($id);
        $rules = [
            'ak_pengalaman' => 'nullable'
        ];
        if ($user->userAparatur->expired_mekanisme) {
            $rules['ak_kelebihan'] = 'required';
        }
        $request->validate($rules);
        $periode = $this->periodeRepository->isActive();
        $this->externalService->storePenetapan($user, null, $periode, $request->ak_kelebihan, $request->ak_pengalaman);
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
    public function ttd(Request $request, $id)
    {
        $request->validate([
            'no_penilaian_capaian' => 'required',
            'no_pengembang' => 'required'
        ], [
            'no_penilaian_capaian.required' => 'Nomor Surat Penilaian Capain Wajib Diisi',
            'no_pengembang.required' => 'Nomor Surat Pengembang & Penunjang Wajib Diisi'
        ]);
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($id)->load(['mente.atasanLangsung.userPejabatStruktural']);
        $penilai_ak = $this->authUser()->load(['userPejabatStruktural']);
        if (!isset($penilai_ak?->userPejabatStruktural?->file_ttd)) {
            throw ValidationException::withMessages(['Maaf, Anda Belum Melengkapi Profil']);
        }
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        $this->externalService->ttdRekapitulasi($rekap, $user, $periode, $penilai_ak, $request->no_pengembang, $request->no_penilaian_capaian);
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }

    public function sendToPenetap($user_id)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($user_id);
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        $this->rekapitulasiKegiatanRepository->sendToPenetap($rekap);
        return response()->json([
            'success' => 200,
            'message' => 'Berhasil dikirim ke Penetap'
        ]);
    }

    public function verified($id)
    {
        $userAparatur = UserAparatur::query()->where('user_id', $id)->first();
        if (!$userAparatur) {
            abort(404);
        }
        $userAparatur->update([
            'status_mekanisme' => 3
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diverifikasi'
        ]);
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required'
        ]);
        $userAparatur = UserAparatur::query()->where('user_id', $id)->first();
        if (!$userAparatur) {
            abort(404);
        }
        $userAparatur->update([
            'status_mekanisme' => 4
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ditolak'
        ]);
    }

    public function revision(Request $request, $id)
    {
        $userAparatur = UserAparatur::query()->where('user_id', $id)->first();
        if (!$userAparatur) {
            abort(404);
        }
        $userAparatur->update([
            'status_mekanisme' => 2
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil direvisi'
        ]);
    }

    public function statusMekanisme($status)
    {
        switch ($status) {
            case 1:
                return '<span class="badge bg-yellow text-white text-sm py-2 px-3 rounded-md">Menunggu</span>';
                break;
            case 2:
                return '<span class="badge bg-red text-white text-sm py-2 px-3 rounded-md">Revisi</span>';
                break;
            case 3:
                return '<span class="badge bg-green text-white text-sm py-2 px-3 rounded-md">Verified</span>';
                break;
            case 4:
                return '<span class="badge bg-black text-white text-sm py-2 px-3 rounded-md">Ditolak</span>';
                break;
            default:
                return '<span class="badge bg-gray text-white text-sm py-2 px-3 rounded-md">Belum Menginput</span>';
                break;
        }
    }
}