<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenetapanAngkaKredit extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'periode_id',
        'user_id',
        'ak_kelebihan',
        'ak_pengalaman'
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}