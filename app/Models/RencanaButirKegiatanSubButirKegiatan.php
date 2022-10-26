<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaButirKegiatanSubButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_butir_kegiatan_id',
        'sub_butir_kegiatan_id',
        'score',
        'percent'
    ];

    public function rencanaButirKegiatan()
    {
        return $this->belongsTo(RencanaButirKegiatan::class);
    }

    public function subButirKegiatan()
    {
        return $this->belongsTo(SubButirKegiatan::class);
    }

    public function dokumenKegiatanPenunjang()
    {
        return $this->hasMany(DokumenKegiatanPenunjang::class);
    }
}
