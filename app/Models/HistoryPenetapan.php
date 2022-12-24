<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPenetapan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'penetap_id',
        'periode_id',
        'fungsional_id'
    ];
}