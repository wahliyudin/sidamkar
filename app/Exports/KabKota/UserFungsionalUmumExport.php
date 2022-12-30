<?php

namespace App\Exports\KabKota;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserFungsionalUmumExport implements FromArray, WithHeadings, WithTitle
{
    protected $kab_kota;

    public function __construct($kab_kota)
    {
        $this->kab_kota = $kab_kota;
    }

    public function array(): array
    {
        return DB::select("SELECT
            user_fungsional_umums.nama,
            user_fungsional_umums.jabatan AS jabatan,
            user_fungsional_umums.no_hp,
            kab_kotas.nama AS kab_kota,
            users.created_at AS tgl_register
        FROM users
        JOIN user_fungsional_umums ON user_fungsional_umums.user_id = users.id
        LEFT JOIN kab_kotas ON kab_kotas.id = user_fungsional_umums.kab_kota_id
        WHERE user_fungsional_umums.tingkat_aparatur = 'kab_kota'
            AND kab_kotas.id = $this->kab_kota");
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jabatan',
            'No HP',
            'Kabupaten / Kota',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data Fungsional Umum';
    }
}