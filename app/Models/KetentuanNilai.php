<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetentuanNilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'pangkat_golongan_tmt_id',
        'ak_min',
        'ak_max',
        'ak_kp',
        'akk_kj',
        'ak_pemeliharaan',
        'ak_bangprof',
        'ak_dasar',
        'ak_max_bangprof_penunjang',
        'ak_max_penunjang',
    ];
}