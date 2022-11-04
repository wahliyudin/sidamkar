<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_informasis')->withTimestamps();
    }

}
