<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButirKegiatanProfesi extends Model
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

    public function subUnsurProfesi()
    {
        return $this->belongsTo(SubUnsurProfesi::class);
    }

    public function subButirKegiatanProfesi()
    {
        return $this->hasMany(SubButirKegiatanProfesi::class);
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
