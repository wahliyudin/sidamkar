<?php

namespace App\Exports\Kemendagri\VerifikasiData;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AdminProvinsiExport implements FromArray, WithHeadings, WithTitle
{
    protected $provinsi;
    protected $status;

    public function __construct($provinsi = null, $status = null)
    {
        $this->status = $status;
        $this->provinsi = $provinsi;
    }

    public function array(): array
    {
        $q = "";
        if ($this->status != null) {
            $q .= "WHERE users.status_akun = $this->status";
            if ($this->provinsi != 'all') {
                $q .= " AND provinsis.id = $this->provinsi";
            }
        } else {
            if ($this->provinsi != 'all') {
                $q .= "WHERE provinsis.id = $this->provinsi";
            }
        }

        return DB::select("SELECT
            users.username,
            nomen_klatur_perangkat_daerahs.nama AS nomenklatur,
            user_prov_kab_kotas.no_hp,
            provinsis.nama AS provinsi,
            provinsis.email_info_penetapan,
            users.created_at AS tgl_register
        FROM users
        JOIN user_prov_kab_kotas ON user_prov_kab_kotas.user_id = users.id
        LEFT JOIN nomen_klatur_perangkat_daerahs
            ON nomen_klatur_perangkat_daerahs.id = user_prov_kab_kotas.nomenklatur_perangkat_daerah_id
        JOIN provinsis ON provinsis.id = user_prov_kab_kotas.provinsi_id
        $q");
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nomenklatur',
            'No HP',
            'Provinsi',
            'Email Info Penetapan',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data Admin Provinsi';
    }
}