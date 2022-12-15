<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPenunjangProfesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_kegiatan_penunjang_profesi_id',
        'keterangan',
        'current_date',
        'detail_kegiatan',
        'catatan',
        'icon',
        'status'
    ];
}