<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAparatur extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'nama',
        'pangkat_golongan_tmt_id',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'kab_kota_id',
        'tingkat_aparatur',
        'provinsi_id',
        'foto_pegawai',
        'no_hp',
        'jenjang',
        'nomor_karpeg',
        'alamat',
        'mekanisme_pengangkatan_id',
        'angka_mekanisme',
        'status_mekanisme'
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

    public function kabKota(): BelongsTo
    {
        return $this->belongsTo(KabKota::class);
    }

    public function pangkatGolonganTmt(): BelongsTo
    {
        return $this->belongsTo(PangkatGolonganTmt::class);
    }

    public function mekanismePengangkatan()
    {
        return $this->belongsTo(MekanismePengangkatan::class);
    }
}