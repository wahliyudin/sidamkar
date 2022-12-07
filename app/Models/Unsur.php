<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kegiatan_id',
        'periode_id',
        'nama'
    ];

    public function scopeKegiatanJabatan(Builder $query): Builder
    {
        return $query->where('jenis_kegiatan_id', 1);
    }

    public function jenisKegiatan()
    {
        return $this->belongsTo(JenisKegiatan::class);
    }


    public function subUnsurs()
    {
        return $this->hasMany(SubUnsur::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}