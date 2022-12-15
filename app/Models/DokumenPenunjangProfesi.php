<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPenunjangProfesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_kegiatan_penunjang_profesi_id',
        'name',
        'link',
        'size',
        'type'
    ];
}