<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rencanaUnsurs()
    {
        return $this->hasMany(RencanaUnsur::class);
    }

    public function laporanKegiatanJabatans()
    {
        return $this->hasMany(LaporanKegiatanJabatan::class);
    }
}
