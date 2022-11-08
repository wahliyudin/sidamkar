<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapitulasiKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'fungsional_id',
        'periode_id',
        'file',
        'file_name',
        'is_send'
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
