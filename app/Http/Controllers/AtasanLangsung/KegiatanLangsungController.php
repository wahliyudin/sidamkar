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
            ->whereRoleIs(getAllRoleFungsional())
            ->whereHas('rencanas')
            ->with([
                'roles',
                'rencanas.rencanaUnsurs.unsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur.butirKegiatans',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans' => function ($query) {
                    $query->where('status', 4)->withSum('butirKegiatan', 'score');
                },
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.laporanKegiatanJabatans' => function($query) use ($periode){
                    $query->whereBetween('current_date', [$periode->awal, $periode->akhir]);
                },
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.laporanKegiatanJabatan' => function($query) use ($periode){
                    $query->whereBetween('current_date', [$periode->awal, $periode->akhir]);
                },
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.laporanKegiatanJabatan.dokumenKegiatanPokoks',
            ])
            ->get()->map(function (User $user) {
                foreach ($user->rencanas as $rencana) {
                    foreach ($rencana->rencanaUnsurs as $rencanaUnsur) {
                        foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur) {
                            foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan) {
                                $rencanaButirKegiatan->butir_kegiatan_sum_score *= count($rencanaButirKegiatan->laporanKegiatanJabatans);
                                $user->angka_kredit += $rencanaButirKegiatan->butir_kegiatan_sum_score;
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
