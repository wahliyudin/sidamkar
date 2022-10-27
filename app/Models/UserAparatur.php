<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAparatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'jenjang',
        'nip',
        'nomor_karpeg',
        'pangkat_golongan_tmt',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'foto_pegawai',
        'no_hp',
        'alamat',
        'kab_kota_id',
        'provinsi_id',
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

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function kabkota(): BelongsTo
    {
        return $this->belongsTo(kabkota::class);
    }
}
