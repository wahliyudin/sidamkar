<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPejabatStruktural extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'nama',
        'pangkat_golongan_tmt_id',
        'nip',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'nomenklatur_jabatan',
        'kab_kota_id',
        'tingkat_aparatur',
        'provinsi_id',
        'foto_pegawai',
        'eselon',
        'is_active',
        'catatan',
        'file_ttd',
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

    public function pangkatGolonganTmt()
    {
        return $this->belongsTo(PangkatGolonganTmt::class);
    }
}