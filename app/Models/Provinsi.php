<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'penilai_ak_id',
        'penetap_ak_id'
    ];

    /**
     * kabKotas
     *
     * @return HasMany
     */
    public function kabKotas()
    {
        return $this->hasMany(KabKota::class);
    }

    public function penilaiAngkaKredit()
    {
        return $this->belongsTo(User::class, 'penilai_ak_id', 'id');
    }

    public function penetapAngkaKredit()
    {
        return $this->belongsTo(User::class, 'penetap_ak_id', 'id');
    }
}
