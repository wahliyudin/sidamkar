<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDokumenPenunjangProfesi extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'history_penunjang_profesi_id',
        'name',
        'link',
        'size',
        'type'
    ];
}