<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_sub_unsur_id',
        'butir_kegiatan_id',
        'score'
    ];

    public function rencanaSubUnsur()
    {
        return $this->belongsTo(RencanaSubUnsur::class);
    }

    public function butirKegiatan()
    {
        return $this->belongsTo(ButirKegiatan::class);
    }
}
