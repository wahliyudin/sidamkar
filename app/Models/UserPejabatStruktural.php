<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPejabatStruktural extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'pangkat_golongan_tmt',
        'nomenklatur_jabatan',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'foto_pegawai',
        'file_sk',
        'file_ttd',
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
}
