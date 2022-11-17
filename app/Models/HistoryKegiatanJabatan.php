<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryKegiatanJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_kegiatan_jabatan_id',
        'status',
        'catatan',
        'icon',
        'detail_kegiatan',
        'keterangan'
    ];

    public function laporanKegiatanJabatan(): BelongsTo
    {
        return $this->belongsTo(LaporanKegiatanJabatan::class);
    }
}
