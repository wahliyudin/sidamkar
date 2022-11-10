<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_kegiatan_jabatan_id',
        'status',
        'catatan',
        'icon',
        'keterangan'
    ];

    public function laporanKegiatanJabatan()
    {
        return $this->belongsTo(LaporanKegiatanJabatan::class);
    }
}
