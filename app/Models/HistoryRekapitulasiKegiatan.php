<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryRekapitulasiKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rekapitulasi_kegiatan_id',
        'struktural_id',
        'content'
    ];

    public function struktural()
    {
        return $this->belongsTo(User::class, 'struktural_id', 'id');
    }

    public function rekapitulasiKegiatan()
    {
        return $this->belongsTo(RekapitulasiKegiatan::class);
    }
}
