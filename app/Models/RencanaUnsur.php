<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaUnsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'rencana_id',
        'unsur_id'
    ];
}
