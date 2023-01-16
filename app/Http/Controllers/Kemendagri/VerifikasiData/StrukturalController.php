<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class StrukturalController extends Controller
{
    public function index()
    {
        return view('kemendagri.verifikasi-data.fungsiona-umum.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select("SELECT
                user_pejabat_strukturals.nama,
                pangkat_golongan_tmts.nama AS pangkat_golongan,
                nomen_klatur_perangkat_daerahs.nama AS nomenklatur,
                user_pejabat_strukturals.nip,
                user_pejabat_strukturals.no_hp,
                (CASE WHEN user_pejabat_strukturals.jenis_kelamin = 'P' THEN 'Perempuan' ELSE 'Laki-Laki' END) AS jenis_kelamin,
                kab_kotas.nama AS kab_kota,
                provinsis.nama AS provinsi
            FROM users
            JOIN user_pejabat_strukturals ON user_pejabat_strukturals.user_id = users.id
            LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_pejabat_strukturals.pangkat_golongan_tmt_id
            LEFT JOIN nomen_klatur_perangkat_daerahs
                ON nomen_klatur_perangkat_daerahs.id = user_pejabat_strukturals.nomenklatur_perangkat_daerah_id
            LEFT JOIN kab_kotas ON kab_kotas.id  = user_pejabat_strukturals.kab_kota_id
            LEFT JOIN provinsis ON provinsis.id  = user_pejabat_strukturals.provinsi_id");
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function export()
    {
        // return Excel::download(new UmumExport(), 'fungsional-umum.xlsx');
    }
}