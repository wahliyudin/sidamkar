<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mente extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'atasan_langsung_id',
        'fungsional_id'
    ];

    public function fungsional()
    {
        return $this->belongsTo(User::class, 'fungsional_id', 'id');
    }

    public function atasanLangsung()
    {
        return $this->belongsTo(User::class, 'atasan_langsung_id', 'id');
    }
}