<?php

namespace App\Services\PenetapAK\DataPengajuan;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ExternalService
{
    public function getUsers(User $penilai)
    {
        $data = DB::select('SELECT
                users.id,
                user_aparaturs.nama,
                user_aparaturs.nip,
                roles.display_name AS jabatan,
                user_aparaturs.kab_kota_id,
                user_aparaturs.provinsi_id,
                internal.penilai_ak_damkar_id
            FROM users
            LEFT JOIN user_aparaturs ON user_aparaturs.user_id = users.id
            LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
            JOIN role_user ON role_user.user_id = users.id
            JOIN roles ON roles.id = role_user.role_id
            JOIN kab_prov_penilai_and_penetaps AS internal ON internal.kab_kota_id = 3201
            WHERE users.status_akun = 1
                AND roles.id IN (1,2,3,4,5,6,7)
                AND user_aparaturs.kab_kota_id != 3201
                AND user_aparaturs.kab_kota_id IN (SELECT ex_kab_kota.kab_kota_id
                    FROM kab_prov_penilai_and_penetaps AS ex_kab_kota
                        WHERE ex_kab_kota.penilai_ak_damkar_id = internal.penilai_ak_damkar_id)
                OR user_aparaturs.provinsi_id IN (SELECT ex_provinsi.provinsi_id
                    FROM kab_prov_penilai_and_penetaps AS ex_provinsi
                        WHERE ex_provinsi.penilai_ak_damkar_id = internal.penilai_ak_damkar_id)');
        return $data;
    }
}
