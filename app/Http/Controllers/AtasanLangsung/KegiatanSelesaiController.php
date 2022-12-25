<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatanJabatan;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\GeneratePdfService;
use App\Services\MenteService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class KegiatanSelesaiController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private MenteService $menteService;
    private GeneratePdfService $generatePdfService;
    private RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    private UserRepository $userRepository;

    public function __construct(PeriodeRepository $periodeRepository, MenteService $menteService, GeneratePdfService $generatePdfService, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository, UserRepository $userRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->menteService = $menteService;
        $this->generatePdfService = $generatePdfService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $judul = 'Kegiatan Selesai';
        $user = $this->authUser()->load('userPejabatStruktural');
        $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($user->userPejabatStruktural->kab_kota_id, ['damkar', 'analis']);
        if (!isset($penilaiAndPenetap)) {
            $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($user->userPejabatStruktural->provinsi_id, ['damkar', 'analis']);
        }
        return view('atasan-langsung.kegiatan-selesai.index', compact('penilaiAndPenetap', 'judul'));
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

    public function show($id)
    {
        $periode = $this->periodeRepository->isActive();
        $user = User::query()->findOrFail($id);
        $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        if (!isset($rekapitulasiKegiatan)) {
            abort(404);
        }
        return view('atasan-langsung.kegiatan-selesai.show', compact('rekapitulasiKegiatan', 'user'));
    }

    public function ttd($id)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($id);
        $atasan_langsung = $this->authUser()->load(['userPejabatStruktural']);
        if (!isset($atasan_langsung?->userPejabatStruktural?->file_ttd)) {
            throw ValidationException::withMessages(['Maaf, Anda Belum Melengkapi Profil']);
        }
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        $this->generatePdfService->ttdRekapitulasi($rekap, $user, $periode, $atasan_langsung);
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }

    public function sendToPenilai($user_id)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($user_id);
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        $this->rekapitulasiKegiatanRepository->sendToPenilai($rekap);
        return response()->json([
            'success' => 200,
            'message' => 'Berhasil dikirim ke Penilai'
        ]);
    }
}
