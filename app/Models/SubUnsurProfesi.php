<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnsurProfesi extends Model
{
    use HasFactory;
    protected $fillable = [
        'unsur_profesi_id',
        'nama'
    ];

    public function unsurProfesi()
    {
        return $this->belongsTo(UnsurProfesi::class);
    }

    public function butirKegiatansProfesi()
    {
        return $this->hasMany(ButirKegiatanProfesi::class);
    }
}
