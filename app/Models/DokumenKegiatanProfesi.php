<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKegiatanProfesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'profesi_butir_kegiatan_id',
        'profesi_sub_butir_kegiatan_id'
    ];
}
