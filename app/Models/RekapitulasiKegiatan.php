<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapitulasiKegiatan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'fungsional_id',
        'periode_id',
        'is_send',
        'is_ttd',
        'link_pernyataan',
        'name_pernyataan',
        'link_rekap_capaian',
        'name_rekap_capaian',
        'link_pengembang',
        'name_pengembang',
        'link_penilaian_capaian',
        'name_penilaian_capaian'
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