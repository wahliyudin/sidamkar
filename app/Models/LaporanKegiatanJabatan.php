<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LaporanKegiatanJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'rencana_id',
        'butir_kegiatan_id',
        'detail_kegiatan',
        'score',
        'status',
        'catatan'
    ];

    public function rencana(): BelongsTo
    {
        return $this->belongsTo(Rencana::class);
    }

    public function dokumenKegiatanJabatans(): HasMany
    {
        return $this->hasMany(DokumenKegiatanJabatan::class);
    }

    public function butirKegiatan(): BelongsTo
    {
        return $this->belongsTo(ButirKegiatan::class);
    }

    public function historyKegiatanJabatans(): HasMany
    {
        return $this->hasMany(HistoryKegiatanJabatan::class);
    }
}
