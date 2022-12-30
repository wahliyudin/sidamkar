<?php

namespace App\Exports\Provinsi;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserFungsionalUmumExport implements FromArray, WithHeadings, WithTitle
{
    protected $provinsi;

    public function __construct($provinsi)
    {
        $this->provinsi = $provinsi;
    }

    public function array(): array
    {
        return DB::select("SELECT
            user_fungsional_umums.nama,
            user_fungsional_umums.jabatan AS jabatan,
            user_fungsional_umums.no_hp,
            provinsis.nama AS provinsi,
            users.created_at AS tgl_register
        FROM users
        JOIN user_fungsional_umums ON user_fungsional_umums.user_id = users.id
        LEFT JOIN provinsis ON provinsis.id = user_fungsional_umums.provinsi_id
        WHERE user_fungsional_umums.tingkat_aparatur = 'provinsi'
            AND provinsis.id = $this->provinsi");
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jabatan',
            'No HP',
            'Provinsi',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data Fungsional Umum';
    }
}