<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryRekapitulasiKegiatan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'rekapitulasi_kegiatan_id',
        'content'
    ];

    public function rekapitulasiKegiatan()
    {
        return $this->belongsTo(RekapitulasiKegiatan::class);
    }
}