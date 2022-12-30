<?php

namespace App\Exports\Provinsi;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserFungsionalExport implements FromArray, WithHeadings, WithTitle
{
    protected $jabatan;
    protected $status;
    protected $provinsi;

    public function __construct($provinsi, $jabatan = null, $status = null)
    {
        $this->provinsi = $provinsi;
        $this->jabatan = $jabatan;
        $this->status = $status;
    }

    public function array(): array
    {
        $q = "";
        if ($this->status != null) {
            $q .= "AND users.status_akun = $this->status";
        }
        if ($this->jabatan != null) {
            $q .= " AND roles.id = $this->jabatan";
        }

        return DB::select("SELECT
            user_aparaturs.nama,
            pangkat_golongan_tmts.nama AS pangkat,
            roles.display_name AS jabatan,
            user_aparaturs.golongan_tmt,
            user_aparaturs.jabatan_tmt,
            nomen_klatur_perangkat_daerahs.nama AS nomenklatur,
            user_aparaturs.nip,
            user_aparaturs.nomor_karpeg,
            user_aparaturs.tempat_lahir,
            user_aparaturs.tanggal_lahir,
            CASE WHEN user_aparaturs.jenis_kelamin = 'P' THEN 'Perempuan' ELSE 'Laki-Laki' END AS jenis_kelamin,
            user_aparaturs.no_hp,
            user_aparaturs.alamat,
            provinsis.nama AS provinsi,
            users.created_at AS tgl_register
        FROM users
        JOIN user_aparaturs ON user_aparaturs.user_id = users.id
        LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
        LEFT JOIN nomen_klatur_perangkat_daerahs
                ON nomen_klatur_perangkat_daerahs.id = user_aparaturs.nomenklatur_perangkat_daerah_id
        LEFT JOIN provinsis ON provinsis.id = user_aparaturs.provinsi_id
        JOIN role_user ON role_user.user_id = users.id
        JOIN roles ON roles.id = role_user.role_id
        WHERE user_aparaturs.tingkat_aparatur = 'provinsi'
            AND provinsis.id = $this->provinsi
        $q");
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Pangkat Golongan',
            'Jabatan',
            'Golongan TMT',
            'Jabatan TMT',
            'Nomenklatur',
            'NIP',
            'Nomor Karpeg',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'No HP',
            'Alamat',
            'Provinsi',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data Fungsional';
    }
}