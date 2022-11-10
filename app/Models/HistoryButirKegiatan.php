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
        'detail_kegiatan',
        'keterangan'
    ];

    public function laporanKegiatanJabatan()
    {
        return $this->belongsTo(LaporanKegiatanJabatan::class);
    }

    public function dokumenHistoryButirKegiatans()
    {
        return $this->hasMany(DokumenHistoryButirKegiatan::class);
    }
}
