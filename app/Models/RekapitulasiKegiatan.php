<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapitulasiKegiatan extends Model
{
    use HasFactory, HasUuids;

    const IS_SEND_KE_ATASAN_LANGSUNG = 1;
    const IS_SEND_KE_PENILAI = 2;
    const IS_SEND_KE_PENETAP = 3;

    protected $fillable = [
        'fungsional_id',
        'periode_id',
        'is_send',
        'is_ttd_penilai',
        'is_ttd_penetap',
        'link_pernyataan',
        'name_pernyataan',
        'link_rekap_capaian',
        'name_rekap_capaian',
        'total_capaian',
        'link_pengembang',
        'name_pengembang',
        'jml_ak_profesi',
        'jml_ak_penunjang',
        'link_penilaian_capaian',
        'name_penilaian_capaian',
        'capaian_ak'
    ];

    public function fungsional()
    {
        return $this->belongsTo(User::class, 'fungsional_id', 'id');
    }

    public function historyRekapitulasiKegiatans()
    {
        return $this->hasMany(HistoryRekapitulasiKegiatan::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}