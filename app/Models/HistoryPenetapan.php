<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPenetapan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama_penetap',
        'periode_id',
        'fungsional_id',
        'tgl_ttd'
    ];

    public function fungsional()
    {
        return $this->belongsTo(User::class, 'fungsional_id');
    }
}