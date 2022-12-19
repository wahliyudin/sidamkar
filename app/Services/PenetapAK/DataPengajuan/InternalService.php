<?php

namespace App\Services\PenetapAK\DataPengajuan;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class InternalService
{
    public function getUsers(User $user)
    {
        return DB::select('SELECT
                users.id,
                user_aparaturs.nama,
                user_aparaturs.nip,
                roles.display_name,
                (CASE WHEN user_aparaturs.jenis_kelamin = "P" THEN "Perempuan" ELSE "Laki-Laki" END) AS jenis_kelamin
            FROM users
            JOIN user_aparaturs ON user_aparaturs.user_id = users.id
            LEFT JOIN kab_prov_penilai_and_penetaps ON (
                kab_prov_penilai_and_penetaps.penetap_ak_damkar_id = ' . '"' . $user->id . '"' . '
                OR kab_prov_penilai_and_penetaps.penetap_ak_analis_id = ' . '"' . $user->id . '"' . '
            )
            JOIN role_user ON role_user.user_id = users.id
            JOIN roles ON role_user.role_id = roles.id
            JOIN rekapitulasi_kegiatans ON rekapitulasi_kegiatans.fungsional_id = users.id
            WHERE users.status_akun = 1
                AND rekapitulasi_kegiatans.is_send = 3
                AND user_aparaturs.tingkat_aparatur = kab_prov_penilai_and_penetaps.tingkat_aparatur
                AND (CASE WHEN kab_prov_penilai_and_penetaps.tingkat_aparatur = "kab_kota" THEN
                    kab_prov_penilai_and_penetaps.kab_kota_id = user_aparaturs.kab_kota_id
                    ELSE
                    kab_prov_penilai_and_penetaps.provinsi_id = user_aparaturs.provinsi_id END)
                AND (CASE WHEN kab_prov_penilai_and_penetaps.penetap_ak_damkar_id IS NOT NULL THEN
                    roles.id IN (1,2,3,4) ELSE
                    (CASE WHEN kab_prov_penilai_and_penetaps.penetap_ak_damkar_id
                        AND kab_prov_penilai_and_penetaps.penetap_ak_analis_id IS NOT NULL THEN
                        roles.id IN (1,2,3,4,5,6,7) ELSE
                        roles.id IN (5,6,7) END) END)');
    }
}