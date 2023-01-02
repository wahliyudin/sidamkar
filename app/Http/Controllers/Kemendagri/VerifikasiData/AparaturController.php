<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AparaturDataTable;
use App\Exports\Kemendagri\VerifikasiData\AparaturExport;
use App\Exports\Kemendagri\VerifikasiData\UmumExport;
use App\Exports\Kemendagri\VerifikasiData\StrukturalExport;
use App\Http\Controllers\Controller;
use App\Models\PangkatGolonganTmt;
use App\Models\Provinsi;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AparaturController extends Controller
{
    public function index()
    {
        $judul = 'Manajemen Aparatur';
        $provinsis = Provinsi::query()->get(['id', 'nama']);
        $jabatans = Role::query()->whereIn('id', [1, 2, 3, 4, 5, 6, 7])->get(['id', 'display_name']);
        $pangkats = PangkatGolonganTmt::query()->get(['id', 'nama']);
        return view('kemendagri.verifikasi-data.aparatur.index', compact('judul', 'provinsis', 'jabatans', 'pangkats'));
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
            LEFT JOIN provinsis ON user_aparaturs.provinsi_id = provinsis.id
            LEFT JOIN kab_kotas ON kab_kotas.id = user_aparaturs.kab_kota_id
            LEFT JOIN role_user ON role_user.user_id = users.id
            LEFT JOIN roles ON roles.id = role_user.role_id
            LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function export(Request $request)
    {
        // $request->validate([]);
        return Excel::download(new AparaturExport($request->tingkat, $request->jabatan_id, $request->pangkat_golongan, $request->provinsi_id, $request->kab_kota_id), 'aparaturs.xlsx');
    }

    public function export_umum()
    {
        return Excel::download(new UmumExport(), 'fungsional-umum.xlsx');
    }
    public function export_struktural()
    {
        return Excel::download(new StrukturalExport(), 'struktural.xlsx');
    }
}
