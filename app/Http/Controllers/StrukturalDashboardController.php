<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use App\Models\Mente;
use App\Repositories\PeriodeRepository;
use App\Traits\AuthTrait;
use App\Services\MenteService;

use Yajra\DataTables\DataTables;

class StrukturalDashboardController extends Controller
{
    use AuthTrait;

    private MenteService $menteService;
    private PeriodeRepository $periodeRepository;
    public function __construct(MenteService $menteService, PeriodeRepository $periodeRepository)
    {
        $this->menteService = $menteService;
        $this->periodeRepository = $periodeRepository;
    }
    public function index()
    {
        $user = User::query()->with(['userPejabatStruktural.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $judul = 'Aparatur Struktural Dashboard';

        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->select('*')->get();
        $informasi = DB::table('informasis')->join('role_informasis', 'role_informasis.informasi_id', '=', 'informasis.id')->where('role_informasis.role_id', $role[0]->role_id)->orderBy('informasis.created_at', 'desc')->get();

        $struktural = DB::table('user_pejabat_strukturals')->where('user_id', Auth::user()->id)->get();

        if ($struktural[0]->tingkat_aparatur == 'kab_kota') {
            $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($struktural[0]->kab_kota_id);
            if (!isset($penilaiAndPenetap)) {
                $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($struktural[0]->kab_kota_id);
            }
        } else {
            $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($struktural[0]->provinsi_id);
            if (!isset($penilaiAndPenetap)) {
                $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($struktural[0]->provinsi_id);
            }
        }
        return view('struktural.dashboard', compact('user', 'judul', 'informasi', 'penilaiAndPenetap'));
    }

    public function atasan_langsung_datatable(Request $request)
    {
        if ($request->ajax()) {
            $role_order = 'ASC';
            if (isset($request->order) && $request->order[0]['column'] == 2) {
                $role_order =  $request->order[0]['dir'];
            }
            $user = $this->authUser()->load(['userPejabatStruktural']);
            $periode = Periode::query()->where('is_active', true)->first();
            if ($user->userPejabatStruktural->tingkat_aparatur == 'kab_kota') {
                $tingkat_aparatur = 'AND user_aparaturs.tingkat_aparatur = "kab_kota"';
                $kab_prov = 'AND user_aparaturs.kab_kota_id = ' . $user->userPejabatStruktural->kab_kota_id;
            } else {
                $tingkat_aparatur = 'AND user_aparaturs.tingkat_aparatur = "provinsi"';
                $kab_prov = 'AND user_aparaturs.provinsi_id = ' . $user->userPejabatStruktural->provinsi_id;
            }
            if (isset($periode)) {
                # code...
                $data = DB::select('SELECT
                        users.id,
                        user_aparaturs.nama,
                        user_aparaturs.nip,
                        roles.display_name AS jabatan,
                        pangkat_golongan_tmts.nama AS pangkat,
                        rekapitulasi_kegiatans.created_at AS tanggal,
                        ROUND(SUM(laporan_kegiatan_jabatans.score), 3) AS total
                    FROM users
                    JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                    JOIN role_user ON role_user.user_id = users.id
                    JOIN roles ON roles.id = role_user.role_id
                    JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                    JOIN rekapitulasi_kegiatans ON rekapitulasi_kegiatans.fungsional_id = users.id
                    JOIN laporan_kegiatan_jabatans ON laporan_kegiatan_jabatans.user_id = users.id
                    WHERE rekapitulasi_kegiatans.is_send IN (1, 2, 3)
                        AND users.status_akun = 1
                        AND laporan_kegiatan_jabatans.status = 3
                        ' . $tingkat_aparatur . '
                        ' . $kab_prov . '
                        AND roles.id IN (1,2,3,4,5,6,7)
                        AND laporan_kegiatan_jabatans.current_date BETWEEN ' . '"' . $periode?->awal . '"' . ' AND ' . '"' . $periode?->akhir . '"' . '
                        GROUP BY users.id
                        ORDER BY rekapitulasi_kegiatans.created_at DESC LIMIT 5');
            } else {
                $data = [];
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('atasan-langsung.kegiatan-selesai.show', $row->id) . '"
                    class="btn btn-primary btn-status px-3 text-sm">Detail</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $role_order = 'ASC';
            if (isset($request->order) && $request->order[0]['column'] == 2) {
                $role_order =  $request->order[0]['dir'];
            }
            $user = $this->authUser()->load(['userPejabatStruktural']);
            $periode = $this->periodeRepository->isActive();
            if ($user->userPejabatStruktural->tingkat_aparatur == 'kab_kota') {
                $tingkat_aparatur = 'AND user_aparaturs.tingkat_aparatur = "kab_kota"';
                $kab_prov = 'AND user_aparaturs.kab_kota_id = ' . $user->userPejabatStruktural->kab_kota_id;
            } else {
                $tingkat_aparatur = 'AND user_aparaturs.tingkat_aparatur = "provinsi"';
                $kab_prov = 'AND user_aparaturs.provinsi_id = ' . $user->userPejabatStruktural->provinsi_id;
            }

            if (isset($periode)) {
                # code...
                $data = DB::select('SELECT
                        users.id,
                        user_aparaturs.nama,
                        user_aparaturs.nip,
                        roles.display_name AS jabatan,
                        pangkat_golongan_tmts.nama AS pangkat,
                        ROUND(SUM(laporan_kegiatan_jabatans.score), 3) AS total
                    FROM users
                    JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                    JOIN role_user ON role_user.user_id = users.id
                    JOIN roles ON roles.id = role_user.role_id
                    JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                    JOIN rekapitulasi_kegiatans ON rekapitulasi_kegiatans.fungsional_id = users.id
                    JOIN laporan_kegiatan_jabatans ON laporan_kegiatan_jabatans.user_id = users.id
                    WHERE rekapitulasi_kegiatans.is_send IN (1, 2, 3)
                        AND users.status_akun = 1
                        AND laporan_kegiatan_jabatans.status = 3
                        ' . $tingkat_aparatur . '
                        ' . $kab_prov . '
                        AND roles.id IN (1,2,3,4,5,6,7)
                        AND laporan_kegiatan_jabatans.current_date BETWEEN ' . '"' . $periode->awal . '"' . ' AND ' . '"' . $periode->akhir . '"' . '
                        GROUP BY users.id
                        ORDER BY rekapitulasi_kegiatans.created_at DESC, roles.display_name ' . $role_order);
            } else {
                $data = [];
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $this->statusMekanisme($row->status_mekanisme);
                })
                ->addColumn('action', function ($row) {
                    return view('penilai-ak.data-pengajuan.internal.buttons', compact('row'))->render();
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
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