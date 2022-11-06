<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenetapAngkaKredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'aparatur_id',
        'penetap_ak_id'
    ];

    public function penetapAK()
    {
        return $this->belongsTo(User::class, 'penetap_ak_id', 'id');
    }
}
