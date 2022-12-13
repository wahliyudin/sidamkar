<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubButirKegiatanProfesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'butir_kegiatan_profesi_id',
        'role_id',
        'nama',
        'satuan_hasil',
        'score',
        'percent'
    ];

    public function butirKegiatanProfesi()
    {
        return $this->belongsTo(ButirKegiatanProfesi::class);
    }

    public function laporanKegiatanProfesi()
    {
        return $this->hasMany(LaporanKegiatanProfesi::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
