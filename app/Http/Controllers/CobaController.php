<?php

namespace App\Http\Controllers;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    private PeriodeRepository $periodeRepository;

    public function __construct(PeriodeRepository $periodeRepository)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
        $user = User::query()->with('roles')->find('97e728a9-7363-4388-86f5-06b64ae825fb');
        $rencanas = Rencana::query()
            ->where('user_id', $user->id)
            ->withWhereHas('laporanKegiatanJabatans', function ($query) {
                $query->where('status', LaporanKegiatanJabatan::SELESAI)->with('butirKegiatan.subUnsur.unsur');
            })
            ->get()->map(function (Rencana $rencana) use ($user) {
                $sesuai_jenjang = [];
                $jenjang_bawah = [];
                $jenjang_atas = [];
                foreach ($rencana->laporanKegiatanJabatans as $laporan) {
                    if ($laporan->butirKegiatan->subUnsur->unsur->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id) {
                        array_push($sesuai_jenjang, $laporan);
                    } elseif ($laporan->butirKegiatan->subUnsur->unsur->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id + 1) {
                        array_push($jenjang_atas, $laporan);
                    } elseif ($laporan->butirKegiatan->subUnsur->unsur->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id - 1) {
                        array_push($jenjang_bawah, $laporan);
                    }
                }
                $rencana->jenjang_bawah = $this->current($jenjang_bawah);
                $rencana->sesuai_jenjang = $this->current($sesuai_jenjang);
                $rencana->jenjang_atas = $this->current($jenjang_atas);
                unset($rencana->laporanKegiatanJabatans);
                return $rencana;
            });
        return $rencanas;
    }

    public function current($data)
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