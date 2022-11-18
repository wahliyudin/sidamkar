<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDokumenKegiatanJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'history_kegiatan_jabatan_id',
        'link',
        'name',
        'size',
        'type'
    ];
}
