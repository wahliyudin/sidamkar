<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryKegiatanProfesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_kegiatan_profesi_id',
        'keterangan'
    ];
}
