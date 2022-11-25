<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_unsur_id',
        'nama',
        'satuan_hasil',
        'score'
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
}