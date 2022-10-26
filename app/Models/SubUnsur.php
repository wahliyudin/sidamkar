<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'unsur_id',
        'nama'
    ];

    public function unsur()
    {
        return $this->belongsTo(Unsur::class);
    }

    public function butirKegiatans()
    {
        return $this->hasMany(ButirKegiatan::class);
    }
}
