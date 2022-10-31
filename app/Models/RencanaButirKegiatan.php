<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaButirKegiatan extends Model
{
    use HasFactory;
    /*
        1 => prosess
        2 => revisi
        3 => tolak
        4 => selesai
    */
    protected $fillable = [
        'rencana_sub_unsur_id',
        'butir_kegiatan_id',
        'status',
        'catatan'
    ];

    public function rencanaSubUnsur()
    {
        return $this->belongsTo(RencanaSubUnsur::class);
    }

    public function butirKegiatan()
    {
        return $this->belongsTo(ButirKegiatan::class);
    }

    public function dokumenKegiatanPokoks()
    {
        return $this->hasMany(DokumenKegiatanPokok::class);
    }

    public function historyButirKegiatans()
    {
        return $this->hasMany(HistoryButirKegiatan::class);
    }
}
