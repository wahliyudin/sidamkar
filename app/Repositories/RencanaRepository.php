<?php

namespace App\Repositories;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\Rencana;
use App\Models\User;
use App\Traits\ScoringTrait;
use Illuminate\Support\Facades\DB;

class RencanaRepository
{
    use ScoringTrait;

    private Rencana $rencana;

    public function __construct(Rencana $rencana)
    {
        $this->rencana = $rencana;
    }

    public function getAllByUser(User $user, Periode $periode)
    {
        return $this->rencana->query()->where('periode_id', $periode->id)->where('user_id', $user->id)->get();
    }

    public function getDataRekapCapaian(User $user, Periode $periode)
    {
        $total = 0;
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        $limitRole = $this->limiRole($role->id);
        $sesuai_jenjang = isset($limitRole[2]) ? $limitRole[2] : '""';
        $jenjang_atas = isset($limitRole[0]) ? $limitRole[0] : '""';
        $jenjang_bawah = isset($limitRole[1]) ? $limitRole[1] : '""';
        $data = DB::select('SELECT
                rencanas.id AS rencana_id,
	            rencanas.nama AS rencana,
                (CASE WHEN butir_kegiatans.role_id = ' . $sesuai_jenjang . ' THEN "sesuai_jenjang"
                    ELSE (CASE WHEN butir_kegiatans.role_id = ' . $jenjang_atas . ' THEN "jenjang_atas"
                        ELSE (CASE WHEN butir_kegiatans.role_id = ' . $jenjang_bawah . ' THEN "jenjang_bawah" END)END)END) AS tingkat_role,
                butir_kegiatans.nama AS butir_kegiatan_nama,
                butir_kegiatans.satuan_hasil,
                butir_kegiatans.score,
                COUNT(laporan_kegiatan_jabatans.id) AS volume,
                SUM(laporan_kegiatan_jabatans.score) AS jumlah_ak
            FROM rencanas
            JOIN laporan_kegiatan_jabatans ON laporan_kegiatan_jabatans.rencana_id = rencanas.id
            JOIN butir_kegiatans ON butir_kegiatans.id = laporan_kegiatan_jabatans.butir_kegiatan_id
            JOIN sub_unsurs ON sub_unsurs.id = butir_kegiatans.sub_unsur_id
            JOIN unsurs ON unsurs.id = sub_unsurs.unsur_id
            WHERE rencanas.user_id = ' . '"' . $user->id . '"' . '
                AND laporan_kegiatan_jabatans.status = 3
                AND laporan_kegiatan_jabatans.periode_id = ' . $periode->id . '
            GROUP BY laporan_kegiatan_jabatans.butir_kegiatan_id');
        $rencanas = [];
        foreach ($data as $item) {
            if (isset($rencanas[$item->rencana_id])) {
                array_push($rencanas[$item->rencana_id]['rencanas'], json_decode(json_encode($item), true));
            } else {
                $rencanas[$item->rencana_id] = [
                    'rencana' => $item->rencana,
                    'rencanas' => [json_decode(json_encode($item), true)]
                ];
            }
            $total += $item->jumlah_ak;
        }
        return [
            $rencanas,
            $total
        ];
    }

    private function current($data)
    {
        $sum = 0;
        $count = 0;
        $tmp = isset($data[0]) ? $data[0] : null;
        $current = [];
        for ($i = 0; $i < count($data); $i++) {
            $sum += $data[$i]->score;
            $count++;
            if ($tmp?->butir_kegiatan_id == $data[$i]->butir_kegiatan_id) {
                unset($data[$i]->butirKegiatan->subUnsur);
                array_push($current, [
                    'jumlah_ak' => $sum,
                    'volume' => $count,
                    'butir_kegiatan' => $data[$i]->butirKegiatan
                ]);
                $sum = 0;
                $count = 0;
            }
            $tmp = $data[$i];
        }
        return $current;
    }
}