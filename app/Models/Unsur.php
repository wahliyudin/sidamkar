<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'jenis_kegiatan_id',
        'periode_id',
        'nama'
    ];

    public function jenisKegiatan()
    {
        return $this->belongsTo(JenisKegiatan::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function subUnsurs()
    {
        return $this->hasMany(SubUnsur::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
