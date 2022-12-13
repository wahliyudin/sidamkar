<?php

namespace App\Http\Controllers\PenilaiAK\DataPengajuan;

use App\DataTables\PenilaiAK\DataPengajuan\InternalDataTable;
use App\Http\Controllers\Controller;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\UserRepository;
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

    public function __construct(UserRepository $userRepository, PeriodeRepository $periodeRepository)
    {
        $this->userRepository = $userRepository;
        $this->periodeRepository = $periodeRepository;
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
                    user_aparaturs.jenis_kelamin,
                    roles.display_name,
                    pangkat_golongan_tmts.nama AS golongan
                FROM users
                JOIN user_aparaturs ON users.id = user_aparaturs.user_id
                JOIN pangkat_golongan_tmts ON user_aparaturs.pangkat_golongan_tmt_id = pangkat_golongan_tmts.id
                JOIN kab_prov_penilai_and_penetaps ON kab_prov_penilai_and_penetaps.kab_kota_id = user_aparaturs.kab_kota_id
                JOIN users AS user_penilai ON user_penilai.id = kab_prov_penilai_and_penetaps.penilai_ak_damkar_id
                JOIN role_user ON role_user.user_id = users.id
                JOIN roles ON role_user.role_id = roles.id
                JOIN rekapitulasi_kegiatans ON rekapitulasi_kegiatans.fungsional_id = users.id
                WHERE users.status_akun = 1
                    AND user_aparaturs.tingkat_aparatur = "kab_kota"
                    AND user_aparaturs.kab_kota_id = ?
                    AND roles.name IN (' . join(',', $this->getRoles($this->authUser()->roles()->pluck('name')->toArray())) . ')
                    ORDER BY roles.name ' . $role_order . '', [$user->userPejabatStruktural->kab_kota_id]);
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
}
