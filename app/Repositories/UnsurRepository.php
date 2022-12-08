<?php

namespace App\Repositories;

use App\Models\Unsur;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnsurRepository
{
    protected Unsur $unsur;

    public function __construct(Unsur $unsur)
    {
        $this->unsur = $unsur;
    }

    public function getRekapUnsurs(User $user)
    {
        // return $this->unsur->query()
        //     ->kegiatanJabatan()
        //     ->withWhereHas('subUnsurs', function ($query) use ($user) {
        //         $query->withWhereHas('butirKegiatans', function ($query) use ($user) {
        //             $query->withSum('laporanKegiatanJabatans', 'score')
        //                 ->withCount('laporanKegiatanJabatans')
        //                 ->withWhereHas('laporanKegiatanJabatans', function ($query) use ($user) {
        //                     $query->where('user_id', $user->id);
        //                 });
        //         });
        //     })
        //     ->get();
        return DB::select("SELECT laporan_kegiatan_jabatans.id as laporan_jabatan_id, unsurs.id as unsur_id, unsurs.nama as unsur, sub_unsurs.id as sub_unsur_id, sub_unsurs.nama as sub_unsur, butir_kegiatans.nama as butir, DATE(laporan_kegiatan_jabatans.current_date) as tanggal, butir_kegiatans.satuan_hasil, COUNT(laporan_kegiatan_jabatans.butir_kegiatan_id) as volume, butir_kegiatans.score, SUM(laporan_kegiatan_jabatans.score) as jumlah_angka_kredit FROM unsurs JOIN sub_unsurs ON unsurs.id = sub_unsurs.unsur_id JOIN butir_kegiatans ON sub_unsurs.id = butir_kegiatans.sub_unsur_id JOIN laporan_kegiatan_jabatans ON butir_kegiatans.id = laporan_kegiatan_jabatans.butir_kegiatan_id WHERE laporan_kegiatan_jabatans.status = 3 AND laporan_kegiatan_jabatans.user_id = '$user->id' GROUP BY butir_kegiatans.id, DATE(laporan_kegiatan_jabatans.current_date) ORDER BY DATE(laporan_kegiatan_jabatans.current_date) DESC, butir_kegiatans.id ASC");
    }
}