<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKegiatanPenunjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_butir_kegiatan_sub_butir_kegiatan_id',
        'title',
        'file'
    ];

    public function rencanaButirKegiatanSubButirKegiatan()
    {
        return $this->belongsTo(RencanaButirKegiatanSubButirKegiatan::class);
    }
}
