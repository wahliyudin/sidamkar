<?php

namespace App\Http\Controllers\PenilaiAK\DataPengajuan;

use App\Http\Controllers\Controller;
use App\Models\RekapitulasiKegiatan;
use App\Repositories\PeriodeRepository;
use App\Repositories\UserRepository;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ExternalController extends Controller
{
    use AuthTrait, DataTableTrait;
    private UserRepository $userRepository;
    private PeriodeRepository $periodeRepository;

    public function __construct(UserRepository $userRepository, PeriodeRepository $periodeRepository)
    {
        $this->userRepository = $userRepository;
        $this->periodeRepository = $periodeRepository;
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
                JOIN kab_prov_penilai_and_penetaps
                    ON (kab_prov_penilai_and_penetaps.penilai_ak_analis_id = ' . '"' . $auth->id . '"' . '
                        OR kab_prov_penilai_and_penetaps.penilai_ak_damkar_id = ' . '"' . $auth->id . '"' . ')
                RIGHT JOIN cross_penilai_and_penetaps
                    ON cross_penilai_and_penetaps.kab_prov_penilai_and_penetap_id = kab_prov_penilai_and_penetaps.id
                WHERE users.status_akun = 1
                    AND roles.name IN (' . join(',', $this->getRoles($this->authUser()->roles()->pluck('name')->toArray())) . ')
                    AND kab_prov_penilai_and_penetaps.kab_kota_id = ' . $auth->userPejabatStruktural->kab_kota_id . '
                    AND kab_prov_penilai_and_penetaps.tingkat_aparatur = "kab_kota"
                    AND user_aparaturs.kab_kota_id = cross_penilai_and_penetaps.kab_kota_id
                    AND user_aparaturs.tingkat_aparatur = "kab_kota"
                    AND EXISTS (SELECT * FROM rekapitulasi_kegiatans WHERE rekapitulasi_kegiatans.fungsional_id = users.id AND rekapitulasi_kegiatans.is_send IN (2, 3))
                    ORDER BY roles.display_name ' . $role_order);
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

    public function show($id)
    {
        $periode = $this->periodeRepository->isActive();
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $id)
            ->where('periode_id', $periode->id)->first();
        $user = $this->userRepository->getUserById($id)->load('userAparatur');
        return view('penilai-ak.data-pengajuan.external.show', compact('user', 'rekapitulasiKegiatan'));
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