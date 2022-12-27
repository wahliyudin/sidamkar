<?php

namespace App\Http\Controllers\Provinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HistoriPenetapanController extends Controller
{
    public function index()
    {
        return view('provinsi.histori-penetapan.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $role_order = 'DESC';
            if (isset($request->order) && $request->order[0]['column'] == 2) {
                $role_order =  $request->order[0]['dir'];
            }
            $data = DB::select('SELECT
                    history_penetapans.nama_penetap,
                    CONCAT(MONTHNAME(periodes.awal), " ", YEAR(periodes.awal), " - ", MONTHNAME(periodes.akhir), " ", YEAR(periodes.akhir))
                        AS periode,
                    user_aparaturs.nama,
                    history_penetapans.tgl_ttd
                FROM history_penetapans
                JOIN periodes ON periodes.id = history_penetapans.periode_id
                JOIN user_aparaturs ON user_aparaturs.user_id = history_penetapans.fungsional_id
                JOIN role_user ON role_user.user_id = history_penetapans.fungsional_id
                JOIN roles ON roles.id = role_user.role_id
                WHERE roles.id IN (1, 2, 3, 5, 6)
                AND user_aparaturs.tingkat_aparatur = "provinsi"
                ORDER BY history_penetapans.tgl_ttd DESC');
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
}