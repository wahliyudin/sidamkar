<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnsurKegiatanProfesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'unsur_kegiatan_profesi_id',
        'nama'
    ];

    public function unsurKegiatanProfesi()
    {
        return $this->belongsTo(UnsurKegiatanProfesi::class);
    }

    public function butirKegiatanKegiatanProfesi()
    {
        return $this->hasMany(ButirKegiatanKegiatanProfesi::class);
    }
}
