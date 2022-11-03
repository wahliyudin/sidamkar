<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesi_sub_unsur_id',
        'butir_kegiatan_id',
        'status',
        'catatan'
    ];
}
