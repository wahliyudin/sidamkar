<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubButirKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'butir_kegiatan_id',
        'role_id',
        'nama',
        'satuan_hasil',
        'score',
        'percent'
    ];

    public function butirKegiatan()
    {
        return $this->belongsTo(ButirKegiatan::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}