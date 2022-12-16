<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPenunjangProfesi extends Model
{
    use HasFactory, HasUuids;

    const STATUS_LAPORKAN = 1;
    const STATUS_VALIDASI = 2;
    const STATUS_REVISI = 3;
    const STATUS_SELESAI = 4;
    const STATUS_TOLAK = 5;

    const ICON_KEYBOARD = 1; // lapor
    const ICON_SPINNER = 2; // validasi
    const ICON_FILE_PEN = 3; // revisi
    const ICON_PAPER_PLANE = 4; // mengirim revisi
    const ICON_X = 5; // tolak
    const ICON_CHECK = 6; // selesai

    protected $fillable = [
        'laporan_kegiatan_penunjang_profesi_id',
        'keterangan',
        'current_date',
        'detail_kegiatan',
        'catatan',
        'icon',
        'status'
    ];

    public function historyDokumenPenunjangProfesis()
    {
        return $this->hasMany(HistoryDokumenPenunjangProfesi::class);
    }
}