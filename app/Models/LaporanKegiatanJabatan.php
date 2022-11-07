<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatanJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_butir_kegiatan_id',
        'detail_kegiatan',
        'current_date',
        'score',
        'status',
        'catatan'
    ];

    public function dokumenKegiatanPokoks()
    {
        return $this->hasMany(DokumenKegiatanPokok::class);
    }

    public function rencanaButirKegiatan()
    {
        return $this->belongsTo(RencanaButirKegiatan::class);
    }

    public function historyButirKegiatans()
    {
        return $this->hasMany(HistoryButirKegiatan::class);
    }
}
