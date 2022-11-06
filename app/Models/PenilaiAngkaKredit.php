<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaiAngkaKredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'aparatur_id',
        'penilai_ak_id'
    ];

    public function penilaiAK()
    {
        return $this->belongsTo(User::class, 'penilai_ak_id', 'id');
    }
}
