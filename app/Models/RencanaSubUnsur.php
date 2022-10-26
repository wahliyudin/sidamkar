<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaSubUnsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_id',
        'sub_unsur_id'
    ];

    public function rencana()
    {
        return $this->belongsTo(Rencana::class);
    }

    public function subUnsur()
    {
        return $this->belongsTo(SubUnsur::class);
    }

    public function rencanaSubUnsurButirKegiatans()
    {
        return $this->hasMany(RencanaSubUnsurButirKegiatan::class);
    }
}
