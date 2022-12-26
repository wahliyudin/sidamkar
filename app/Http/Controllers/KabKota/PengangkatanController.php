<?php

namespace App\Http\Controllers\KabKota;

use App\Facades\Modules\DestructRoleFacade;
use App\Http\Controllers\Controller;
use App\Models\PenetapanKenaikanPangkatJenjang;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\RoleTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PengangkatanController extends Controller
{
    use AuthTrait, RoleTrait;

    public function index()
    {
        return view('kabkota.pengangkatan.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $role_order = 'DESC';
            if (isset($request->order) && $request->order[0]['column'] == 2) {
                $role_order =  $request->order[0]['dir'];
            }
            $auth = $this->authUser()->load(['userProvKabKota']);
            $data = DB::select('SELECT
                user_aparaturs.user_id AS id,
                user_aparaturs.nama,
                CONCAT(MONTHNAME(periodes.awal), " ", YEAR(periodes.awal), " - ", MONTHNAME(periodes.akhir), " ", YEAR(periodes.akhir))
                    AS periode,
                roles.display_name AS jabatan,
                roles.name AS r_name,
                penetapan_kenaikan_pangkat_jenjangs.is_naik,
                penetapan_kenaikan_pangkat_jenjangs.id AS penetapan,
                pangkat_golongan_tmts.nama AS pangkat
            FROM user_aparaturs
            JOIN penetapan_kenaikan_pangkat_jenjangs ON penetapan_kenaikan_pangkat_jenjangs.fungsional_id = user_aparaturs.user_id
            JOIN periodes ON periodes.id = penetapan_kenaikan_pangkat_jenjangs.periode_id
            JOIN role_user ON role_user.user_id = user_aparaturs.user_id
            JOIN roles ON roles.id = role_user.role_id
            JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
            WHERE user_aparaturs.tingkat_aparatur = "kab_kota"
                AND user_aparaturs.kab_kota_id = ' . $auth->userProvKabKota->kab_kota_id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $this->statusPengangkatan($row->is_naik);
                })
                ->addColumn('action', function ($row) {
                    $pangkatNaik = $this->getPangkatSelanjutnya($row->pangkat);
                    $jenjangNaik = $this->getJenjangSelanjutnya($row->r_name);
                    return view('kabkota.pengangkatan.buttons', compact('row', 'pangkatNaik', 'jenjangNaik'))->render();
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }

    public function statusPengangkatan($status)
    {
        switch ($status) {
            case 0:
                return '<span class="badge bg-yellow text-white text-sm py-2 px-3 rounded-md">Menunggu</span>';
                break;
            case 1:
                return '<span class="badge bg-green text-white text-sm py-2 px-3 rounded-md">Verified</span>';
                break;
            case 2:
                return '<span class="badge bg-black text-white text-sm py-2 px-3 rounded-md">Ditolak</span>';
                break;
        }
    }

    public function verifikasi(Request $request, $id)
    {
        $user = User::query()->with(['roles', 'userAparatur'])->where('id', $id)->first();
        $penetapan = PenetapanKenaikanPangkatJenjang::query()->where('id', $request->penetapan)->first();
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        if ($penetapan->naik_jenjang && $penetapan->naik_pangkat) {
            $user->syncRoles([$role->id + 1]);
            $user->userAparatur()->update([
                'pangkat_golongan_tmt_id' => $user->userAparatur->pangkat_golongan_tmt_id + 1
            ]);
        }
        $penetapan->update([
            'is_naik' => 1
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diterapkan'
        ]);
    }

    public function tolak(Request $request)
    {
        $request->validate([
            'penetapan' => 'required'
        ]);
        $penetapan = PenetapanKenaikanPangkatJenjang::query()->where('id', $request->penetapan)->first();
        $penetapan->update([
            'is_naik' => 2
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Ditolak'
        ]);
    }
}