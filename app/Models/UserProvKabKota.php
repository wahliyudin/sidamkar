<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProvKabKota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomenklatur_perangkat_daerah',
        'file_permohonan'
    ];
}
