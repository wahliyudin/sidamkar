<?php

namespace App\Exports\Provinsi;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserPejabatStrukturalExport implements FromArray, WithHeadings, WithTitle
{
    protected $provinsi;
    protected $status;

    public function __construct($provinsi = null, $status = null)
    {
        $this->provinsi = $provinsi;
        $this->status = $status;
    }

    public function array(): array
    {
        $q = "";
        if ($this->status != null) {
            $q .= "AND users.status_akun = $this->status";
        }
        return DB::select("SELECT
                user_pejabat_strukturals.nama,
                pangkat_golongan_tmts.nama AS pangkat_golongan,
                user_pejabat_strukturals.jabatan_tmt,
                user_pejabat_strukturals.golongan_tmt,
                nomen_klatur_perangkat_daerahs.nama AS nomenklatur,
                user_pejabat_strukturals.nip,
                user_pejabat_strukturals.no_hp,
                user_pejabat_strukturals.tempat_lahir,
                user_pejabat_strukturals.tanggal_lahir,
                (CASE WHEN user_pejabat_strukturals.jenis_kelamin = 'P' THEN 'Perempuan' ELSE 'Laki-Laki' END) AS jenis_kelamin,
                provinsis.nama AS provinsi,
                users.created_at AS tgl_register
            FROM users
            JOIN user_pejabat_strukturals ON user_pejabat_strukturals.user_id = users.id
            LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_pejabat_strukturals.pangkat_golongan_tmt_id
            LEFT JOIN nomen_klatur_perangkat_daerahs
                ON nomen_klatur_perangkat_daerahs.id = user_pejabat_strukturals.nomenklatur_perangkat_daerah_id
            JOIN provinsis ON provinsis.id  = user_pejabat_strukturals.provinsi_id
            WHERE user_pejabat_strukturals.tingkat_aparatur = 'provinsi'
                AND provinsis.id = $this->provinsi
                $q");
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Pangkat Golongan',
            'Jabatan TMT',
            'Golongan TMT',
            'Nomenklatur',
            'NIP',
            'No HP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Provinsi',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data User Pejabat Struktural';
    }
}