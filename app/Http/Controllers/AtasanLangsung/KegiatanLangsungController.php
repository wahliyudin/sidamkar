<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;

class KegiatanLangsungController extends Controller
{
    public function index()
    {

        $periode = Periode::query()->where('is_active', true)->first();
        $fungsionals = User::query()
            ->withWhereHas('userAparatur', function ($query) {
                $query->where('kab_kota_id', 1101);
            })
            ->whereHas('rekapitulasiKegiatan', function($query){
                $query->where('is_send', true);
            })
            ->whereRoleIs(getAllRoleFungsional())
            ->with([
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans' => function ($query) use ($periode) {
                    $query->withSum(['laporanKegiatanJabatans' => function ($query) use ($periode) {
                        $query->where('status', 4)->whereBetween('current_date', [$periode->awal, $periode->akhir]);
                    }], 'score');
                },
            ])
            ->get()->map(function (User $user) {
                foreach ($user->rencanas as $rencana) {
                    foreach ($rencana->rencanaUnsurs as $rencanaUnsur) {
                        foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur) {
                            foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan) {
                                $user->angka_kredit += $rencanaButirKegiatan->laporan_kegiatan_jabatans_sum_score;
                            }
                        }
                    }
                }
                return $user;
            });
        return view('atasan-langsung.kegiatan-selesai', compact('fungsionals'));
    }

    public function show($id)
    {
    }
}
