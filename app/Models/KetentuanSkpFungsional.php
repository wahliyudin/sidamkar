<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetentuanSkpFungsional extends Model
{
    use HasFactory;
    protected $fillable = [
        'ketentuan_skp_id',
        'status',
        'user_id',
        'nilai_skp',
        'periode_id',
        'file'
    ];

    public function ketentuanSkp()
    {
        return $this->belongsTo(KetentuanSkp::class);
    }
}
