<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFungsionalUmum extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'tingkat_aparatur',
        'no_hp',
        'jabatan',
        'provinsi_id',
        'kab_kota_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}