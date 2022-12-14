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
            $data = DB::select(
                'SELECT
                        users.id AS user_id,
                        user_aparaturs.nama,
                        user_aparaturs.nip,
                        roles.display_name,
                        pangkat_golongan_tmts.nama AS golongan
                    FROM users
                    JOIN user_aparaturs ON user_aparaturs.user_id = users.id
                    LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
                    JOIN role_user ON role_user.user_id = users.id
                    JOIN roles ON roles.id = role_user.role_id
                    WHERE users.status_akun = 1
                        AND roles.name IN (' . join(',', $this->getRoles($this->authUser()->roles()->pluck('name')->toArray())) . ')
                        AND user_aparaturs.tingkat_aparatur = "kab_kota"
                        AND EXISTS (SELECT * FROM rekapitulasi_kegiatans WHERE rekapitulasi_kegiatans.fungsional_id = users.id)
                        AND NOT EXISTS (SELECT * FROM kab_prov_penilai_and_penetaps
                            WHERE kab_prov_penilai_and_penetaps.kab_kota_id = user_aparaturs.kab_kota_id)
                        AND EXISTS (SELECT * FROM cross_penilai_and_penetaps
                            WHERE cross_penilai_and_penetaps.kab_kota_id = user_aparaturs.kab_kota_id)
                        ORDER BY roles.display_name ' . $role_order
            );
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('penilai-ak.data-pengajuan.external.show', $row->user_id) . '" class="btn btn-blue btn-sm">Detail</a>';
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
        return view('penilai-ak.data-pengajuan.external.show', compact('user', 'rekapitulasiKegiatan'));
    }
}
