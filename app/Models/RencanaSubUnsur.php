<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaSubUnsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_unsur_id',
        'sub_unsur_id'
    ];

    public function rencanaUnsur()
    {
        return $this->belongsTo(RencanaUnsur::class);
    }

    public function subUnsur()
    {
        return $this->belongsTo(SubUnsur::class);
    }

    public function rencanaButirKegiatans()
    {
        return $this->hasMany(RencanaButirKegiatan::class);
    }
}
