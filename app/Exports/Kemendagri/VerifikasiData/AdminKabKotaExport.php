<?php

namespace App\Exports\Kemendagri\VerifikasiData;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AdminKabKotaExport implements FromArray, WithHeadings, WithTitle
{
    protected $provinsi;
    protected $kab_kota;
    protected $status;

    public function __construct($provinsi = null, $kab_kota = null, $status = null)
    {
        $this->status = $status;
        $this->provinsi = $provinsi;
        $this->kab_kota = $kab_kota;
    }

    public function array(): array
    {
        $q = "";
        if ($this->status != null) {
            $q .= " AND users.status_akun = $this->status";
        }
        if ($this->provinsi != 'all') {
            $q .= " AND provinsis.id = $this->provinsi";
        }
        if (!is_null($this->kab_kota) && $this->kab_kota != 'all') {
            $q .= " AND kab_kotas.id = $this->kab_kota";
        }

        return DB::select("SELECT
            users.username,
            nomen_klatur_perangkat_daerahs.nama AS nomenklatur,
            user_prov_kab_kotas.no_hp,
            provinsis.nama AS provinsi,
            kab_kotas.nama AS kab_kota,
            kab_kotas.email_info_penetapan,
            users.created_at AS tgl_register
        FROM users
        JOIN user_prov_kab_kotas ON user_prov_kab_kotas.user_id = users.id
        LEFT JOIN nomen_klatur_perangkat_daerahs
            ON nomen_klatur_perangkat_daerahs.id = user_prov_kab_kotas.nomenklatur_perangkat_daerah_id
        JOIN provinsis ON provinsis.id = user_prov_kab_kotas.provinsi_id
        JOIN kab_kotas ON kab_kotas.id = user_prov_kab_kotas.kab_kota_id
        JOIN role_user ON role_user.user_id = users.id
        JOIN roles ON roles.id = role_user.role_id
        WHERE roles.name = 'kab_kota'
        $q");
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nomenklatur',
            'No HP',
            'Provinsi',
            'Kab Kota',
            'Email Info Penetapan',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data Admin Provinsi';
    }
}