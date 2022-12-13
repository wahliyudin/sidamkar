<?php

namespace App\Repositories;

use App\Models\LaporanKegiatanJabatan;
use App\Models\Rencana;
use App\Models\User;

class RencanaRepository
{
    private Rencana $rencana;

    public function __construct(Rencana $rencana)
    {
        $this->rencana = $rencana;
    }

    public function getAllByUser(User $user)
    {
        return $this->rencana->query()->where('user_id', $user->id)->get();
    }

    public function getDataRekapCapaian(User $user)
    {
        return Rencana::query()
            ->where('user_id', $user->id)
            ->withWhereHas('laporanKegiatanJabatans', function ($query) {
                $query->where('status', LaporanKegiatanJabatan::SELESAI)->with('butirKegiatan.subUnsur.unsur');
            })
            ->get()->map(function (Rencana $rencana) use ($user) {
                $sesuai_jenjang = [];
                $jenjang_bawah = [];
                $jenjang_atas = [];
                foreach ($rencana->laporanKegiatanJabatans as $laporan) {
                    if ($laporan->butirKegiatan->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id) {
                        array_push($sesuai_jenjang, $laporan);
                    } elseif ($laporan->butirKegiatan->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id + 1) {
                        array_push($jenjang_atas, $laporan);
                    } elseif ($laporan->butirKegiatan->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id - 1) {
                        array_push($jenjang_bawah, $laporan);
                    }
                }
                $rencana->jenjang_bawah = $this->current($jenjang_bawah);
                $rencana->sesuai_jenjang = $this->current($sesuai_jenjang);
                $rencana->jenjang_atas = $this->current($jenjang_atas);
                unset($rencana->laporanKegiatanJabatans);
                return $rencana;
            });
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
            if ($tmp?->butir_kegiatan_id == $data[$i]->butir_kegiatan_id && count($data) - 1 == $i) {
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