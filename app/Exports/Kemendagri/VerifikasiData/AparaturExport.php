<?php

namespace App\Exports\Kemendagri\VerifikasiData;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AparaturExport implements FromArray, WithHeadings, WithTitle
{
    protected $tingkat;
    protected $jabatan;
    protected $pangkat_golongan;
    protected $provinsi;
    protected $kab_kota;

    public function __construct($tingkat, $jabatan = null, $pangkat_golongan = null, $provinsi, $kab_kota = null)
    {
        $this->tingkat = $tingkat;
        $this->jabatan = $jabatan;
        $this->pangkat_golongan = $pangkat_golongan;
        $this->provinsi = $provinsi;
        $this->kab_kota = $kab_kota;
    }

    public function array(): array
    {
        if ($this->tingkat == 'provinsi') {
            $q = "AND user_aparaturs.tingkat_aparatur = 'provinsi' AND provinsis.id = $this->provinsi";
        } else {
            $q = "AND user_aparaturs.tingkat_aparatur = 'kab_kota' AND kab_kotas.id = $this->kab_kota";
        }
        if ($this->jabatan != null) {
            $q .= " AND roles.id = $this->jabatan";
        }
        if ($this->pangkat_golongan != null) {
            $q .= " AND pangkat_golongan_tmts.id = $this->pangkat_golongan";
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
            kab_kotas.nama AS kab_kota,
            user_aparaturs.created_at AS tgl_register
        FROM users
        JOIN user_aparaturs ON user_aparaturs.user_id = users.id
        LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
        LEFT JOIN nomen_klatur_perangkat_daerahs
                ON nomen_klatur_perangkat_daerahs.id = user_aparaturs.nomenklatur_perangkat_daerah_id
        JOIN provinsis ON provinsis.id = user_aparaturs.provinsi_id
        JOIN kab_kotas ON kab_kotas.id = user_aparaturs.kab_kota_id
        JOIN role_user ON role_user.user_id = users.id
        JOIN roles ON roles.id = role_user.role_id
        WHERE users.status_akun = 1
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
            'Kabupaten / Kota',
            'Tanggal Registrasi'
        ];
    }

    public function title(): string
    {
        return 'Data Aparatur';
    }
}