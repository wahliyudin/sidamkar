<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPejabatStruktural extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'pangkat_golongan_tmt',
        'nomenklatur_jabatan',
        'nip',
        'foto_pegawai',
        'file_sk_penilai_ak',
        'file_ttd'
    ];
}
