<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\Exports\Kemendagri\VerifikasiData\UmumExport;
use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class FungsionalUmumController extends Controller
{
    use AuthTrait;

    public function index()
    {
        return view('kemendagri.verifikasi-data.fungsiona-umum.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select("SELECT
                user_fungsional_umums.nama,
                user_fungsional_umums.jabatan AS jabatan,
                user_fungsional_umums.no_hp,
                provinsis.nama AS provinsi,
                kab_kotas.nama AS kab_kota
            FROM users
            JOIN user_fungsional_umums ON user_fungsional_umums.user_id = users.id
            LEFT JOIN kab_kotas ON kab_kotas.id = user_fungsional_umums.kab_kota_id
            LEFT JOIN provinsis ON provinsis.id = user_fungsional_umums.provinsi_id ");
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function export()
    {
        return Excel::download(new UmumExport(), 'fungsional-umum.xlsx');
    }
}