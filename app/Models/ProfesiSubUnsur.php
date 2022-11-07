<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiSubUnsur extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesi_unsur_id',
        'sub_unsur_id'
    ];
}
