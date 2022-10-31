<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaUnsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_id',
        'unsur_id'
    ];

    public function unsur()
    {
        return $this->belongsTo(Unsur::class);
    }

    public function rencanaSubUnsurs()
    {
        return $this->hasMany(RencanaSubUnsur::class);
    }
}
