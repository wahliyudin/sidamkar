<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;

    const JENIS_KEGIATAN_JABATAN = 1;
    const JENIS_KEGIATAN_PROFESI = 2;
    const JENIS_KEGIATAN_PENUNJANG = 3;

    protected $fillable = [
        'nama'
    ];

    public function unsurs()
    {
        return $this->hasMany(Unsur::class);
    }

    public function unsurKegiatanProfesi()
    {
        return $this->hasMany(UnsurKegiatanProfesi::class);
    }
}