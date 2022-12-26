<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AparaturDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AparaturController extends Controller
{
    public function index()
    {
        $judul = 'Manajemen Aparatur';
        return view('kemendagri.verifikasi-data.aparatur.index', compact('judul'));
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select('SELECT
                user_aparaturs.nama,
                user_aparaturs.nip,
                provinsis.nama AS provinsi,
                kab_kotas.nama AS kab_kota,
                roles.display_name AS jabatan,
                pangkat_golongan_tmts.nama AS pangkat
            FROM users
            JOIN user_aparaturs ON user_aparaturs.user_id = users.id
            JOIN provinsis ON user_aparaturs.provinsi_id = provinsis.id
            JOIN kab_kotas ON kab_kotas.id = user_aparaturs.kab_kota_id
            JOIN role_user ON role_user.user_id = users.id
            JOIN roles ON roles.id = role_user.role_id
            JOIN pangkat_golongan_tmts ON user_aparaturs.pangkat_golongan_tmt_id
            LIMIT 10');
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
