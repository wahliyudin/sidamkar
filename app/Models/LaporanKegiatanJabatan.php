<?php

namespace App\Models;

use App\Enums\LaporanKegiatanStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LaporanKegiatanJabatan extends Model
{
    use HasFactory, HasUuids;

    const VALIDASI = 1;
    const REVISI = 2;
    const SELESAI = 3;
    const TOLAK = 4;

    protected $fillable = [
        'kode',
        'rencana_id',
        'periode_id',
        'user_id',
        'butir_kegiatan_id',
        'detail_kegiatan',
        'current_date',
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

    public function butirKegiatanKegiatanProfesi(): BelongsTo
    {
        return $this->belongsTo(ButirKegiatanKegiatanProfesi::class);
    }

    public function historyKegiatanJabatans(): HasMany
    {
        return $this->hasMany(HistoryKegiatanJabatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}