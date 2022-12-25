<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenetapanKenaikanPangkatJenjang extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'fungsional_id',
        'periode_id',
        'is_naik'
    ];

    public function fungsional()
    {
        return $this->belongsTo(User::class, 'fungsional_id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}