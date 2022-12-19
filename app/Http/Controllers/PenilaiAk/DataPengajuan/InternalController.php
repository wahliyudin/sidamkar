<?php

namespace App\Http\Controllers\PenilaiAK\DataPengajuan;

use App\DataTables\PenilaiAK\DataPengajuan\InternalDataTable;
use App\Http\Controllers\Controller;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\PenilaiAK\DataPengajuan\InternalService;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InternalController extends Controller
{
    use AuthTrait, DataTableTrait;
    private UserRepository $userRepository;
    private PeriodeRepository $periodeRepository;
    private RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    private InternalService $internalService;

    public function __construct(UserRepository $userRepository, PeriodeRepository $periodeRepository, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository, InternalService $internalService)
    {
        $this->userRepository = $userRepository;
        $this->periodeRepository = $periodeRepository;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->internalService = $internalService;
    }

    public function index()
    {
        return view('penilai-ak.data-pengajuan.internal.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $role_order = 'DESC';
            if (isset($request->order) && $request->order[0]['column'] == 2) {
                $role_order =  $request->order[0]['dir'];
            }
            $user = $this->authUser()->load(['userPejabatStruktural', 'roles']);
            $data = DB::select('SELECT
                        users.id AS user_id,
                        user_aparaturs.nama,
                        user_aparaturs.nip,
                        roles.display_name,
                        pangkat_golongan_tmts.nama AS golongan
                    FROM users
                        JOIN kab_prov_penilai_and_penetaps
                            ON (
                                kab_prov_penilai_and_penetaps.penilai_ak_analis_id = "' . $user->id . '"
                                OR kab_prov_penilai_and_penetaps.penilai_ak_damkar_id = "' . $user->id . '"
                                )
                    JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                    JOIN role_user ON role_user.user_id = users.id
                    JOIN roles ON role_user.role_id = roles.id
                    LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                    WHERE user_aparaturs.kab_kota_id = kab_prov_penilai_and_penetaps.kab_kota_id
                        AND users.status_akun = 1
                        AND roles.name IN (' . join(',', $this->getRoles($this->authUser()->roles()->pluck('name')->toArray())) . ')
                        AND user_aparaturs.tingkat_aparatur = "kab_kota"
                        AND EXISTS (SELECT * FROM rekapitulasi_kegiatans WHERE rekapitulasi_kegiatans.fungsional_id = users.id AND rekapitulasi_kegiatans.is_send IN (2, 3))
                        ORDER BY roles.display_name ' . $role_order);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('penilai-ak.data-pengajuan.internal.show', $row->user_id) . '" class="btn btn-blue btn-sm">Detail</a>';
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
            ->where('periode_id', $periode->id)->first();
        $user = $this->userRepository->getUserById($id)->load('userAparatur');
        return view('penilai-ak.data-pengajuan.internal.show', compact('user', 'rekapitulasiKegiatan'));
    }

    public function ttd($id)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($id)->load(['mente.atasanLangsung.userPejabatStruktural']);
        $atasan_langsung = $user->mente->atasanLangsung;
        $penilai_ak = $this->authUser()->load(['userPejabatStruktural']);
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        $this->internalService->ttdRekapitulasi($rekap, $user, $periode, $atasan_langsung, $penilai_ak);
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
            'message' => 'Berhasil dikirim ke Penetap'
        ]);
    }
}