<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_butir_kegiatan_id',
        'keterangan'
    ];

    public function rencanaButirKegiatan()
    {
        return $this->belongsTo(RencanaButirKegiatan::class);
    }
}
