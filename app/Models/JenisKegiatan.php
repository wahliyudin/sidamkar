<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function unsurs()
    {
        return $this->hasMany(Unsur::class);
    }
}
