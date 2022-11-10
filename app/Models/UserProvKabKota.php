<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProvKabKota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomenklatur_perangkat_daerah_id',
        'file_permohonan',
        'is_active',
        'catatan',
        'kab_kota_id',
        'provinsi_id'
    ];

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function kab_kota()
    {
        return $this->belongsTo(KabKota::class);
    }
}
