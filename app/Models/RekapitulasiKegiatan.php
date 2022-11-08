<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapitulasiKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'fungsional_id',
        'file',
        'file_name'
    ];

    public function fungsional()
    {
        return $this->belongsTo(User::class, 'fungsional_id', 'id');
    }

    public function historyRekapitulasiKegiatans()
    {
        return $this->hasMany(HistoryRekapitulasiKegiatan::class);
    }
}
