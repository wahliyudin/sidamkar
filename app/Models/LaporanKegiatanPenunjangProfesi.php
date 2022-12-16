<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatanPenunjangProfesi extends Model
{
    use HasFactory, HasUuids;

    const VALIDASI = 1;
    const REVISI = 2;
    const SELESAI = 3;
    const TOLAK = 4;

    protected $fillable = [
        'kode',
        'periode_id',
        'user_id',
        'butir_kegiatan_id',
        'sub_butir_kegiatan_id',
        'detail_kegiatan',
        'current_date',
        'score',
        'status',
        'catatan'
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

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

    public function historyPenunjangProfesis()
    {
        return $this->hasMany(HistoryPenunjangProfesi::class);
    }

    public function dokumenPenunjangProfesis()
    {
        return $this->hasMany(DokumenPenunjangProfesi::class);
    }
}