<?php

namespace App\Exports\Kemendagri\VerifikasiData;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UmumExport implements FromArray, WithHeadings, WithTitle
{
    // protected $kab_kota;

    // public function __construct($kab_kota)
    // {
    //     $this->kab_kota = $kab_kota;
    // }

    public function array(): array
    {
        return DB::select("SELECT
            user_fungsional_umums.nama,
            user_fungsional_umums.jabatan AS jabatan,
            user_fungsional_umums.no_hp,
            user_fungsional_umums.tingkat_aparatur,
            kab_kotas.nama AS kab_kota,
            provinsis.nama AS provinsi,
            users.created_at AS tgl_register
        FROM users
        JOIN user_fungsional_umums ON user_fungsional_umums.user_id = users.id
        LEFT JOIN kab_kotas ON kab_kotas.id = user_fungsional_umums.kab_kota_id
        LEFT JOIN provinsis ON provinsis.id = user_fungsional_umums.provinsi_id ");
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jabatan',
            'No HP',
            'Tingkat Aparatur',
            'Kabupaten / Kota',
            'Provinsi',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data Fungsional Umum';
    }
}
