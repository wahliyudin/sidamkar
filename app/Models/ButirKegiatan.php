<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_unsur_id',
        'role_id',
        'nama',
        'satuan_hasil',
        'score',
        'percent'
    ];

    public function subUnsur()
    {
        return $this->belongsTo(SubUnsur::class);
    }

    public function subButirKegiatans()
    {
        return $this->hasMany(SubButirKegiatan::class);
    }

    public function laporanKegiatanJabatans()
    {
        return $this->hasMany(LaporanKegiatanJabatan::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function laporanKegiatanPenunjangProfesis()
    {
        return $this->hasMany(LaporanKegiatanPenunjangProfesi::class);
    }
}