<?php

namespace App\Http\Controllers\Provinsi;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PengangkatanController extends Controller
{
    use AuthTrait;

    public function index()
    {
        return view('provinsi.pengangkatan.index');
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
                user_aparaturs.nama,
                CONCAT(MONTHNAME(periodes.awal), " ", YEAR(periodes.awal), " - ", MONTHNAME(periodes.akhir), " ", YEAR(periodes.akhir))
                    AS periode,
                roles.display_name AS jabatan,
                penetapan_kenaikan_pangkat_jenjangs.is_naik
            FROM user_aparaturs
            JOIN penetapan_kenaikan_pangkat_jenjangs ON penetapan_kenaikan_pangkat_jenjangs.fungsional_id = user_aparaturs.user_id
            JOIN periodes ON periodes.id = penetapan_kenaikan_pangkat_jenjangs.periode_id
            JOIN role_user ON role_user.user_id = user_aparaturs.user_id
            JOIN roles ON roles.id = role_user.role_id
            WHERE user_aparaturs.tingkat_aparatur = "provinsi"
                AND user_aparaturs.provinsi_id = ' . $auth->userProvKabKota->provinsi_id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $this->statusPengangkatan($row->is_naik);
                })
                ->addColumn('action', function ($row) {
                    return view('provinsi.pengangkatan.buttons', compact('row'))->render();
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
}