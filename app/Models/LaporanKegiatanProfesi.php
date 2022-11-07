<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatanProfesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'butir_kegiatan_id',
        'sub_butir_kegiatan_id',
        'detail_kegiatan',
        'current_date',
        'score',
        'status',
        'catatan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function butirKegiatan()
    {
        return $this->belongsTo(ButirKegiatan::class);
    }

    public function subButirKegiatan()
    {
        return $this->belongsTo(SubButirKegiatan::class);
    }

    public function dokumenKegiatanProfesis()
    {
        return $this->hasMany(DokumenKegiatanProfesi::class);
    }

    public function historyKegiatanProfesis()
    {
        return $this->hasMany(HistoryKegiatanProfesi::class);
    }
}
