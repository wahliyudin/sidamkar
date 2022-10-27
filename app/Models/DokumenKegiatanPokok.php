<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKegiatanPokok extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_sub_unsur_butir_kegiatan_id',
        'title',
        'file'
    ];

    public function rencanaSubUnsurButirKegiatan()
    {
        return $this->belongsTo(RencanaSubUnsurButirKegiatan::class);
    }
}
