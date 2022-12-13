<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapitulasiKegiatan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'fungsional_id',
        'periode_id',
        'is_send',
        'is_ttd'
    ];

    public function fungsional()
    {
        return $this->belongsTo(User::class, 'fungsional_id', 'id');
    }

    public function historyRekapitulasiKegiatans()
    {
        return $this->hasMany(HistoryRekapitulasiKegiatan::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}