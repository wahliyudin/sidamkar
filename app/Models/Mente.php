<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mente extends Model
{
    use HasFactory;

    protected $fillable = [
        'atasan_langsung_id',
        'fungsional_id'
    ];

    public function fungsional()
    {
        return $this->belongsTo(User::class, 'fungsional_id', 'id');
    }
}