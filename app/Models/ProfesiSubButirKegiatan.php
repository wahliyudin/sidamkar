<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiSubButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesi_butir_kegiatan_id',
        'sub_butir_kegiatan_id',
        'status',
        'catatan'
    ];
}
