<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabProvPenilaiAndPenetap extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'penilai_ak_damkar_id',
        'penilai_ak_analis_id',
        'penetap_ak_damkar_id',
        'penetap_ak_analis_id',
        'tingkat_aparatur',
        'kab_kota_id',
        'provinsi_id'
    ];

    /**
     * scopeTingkatAparaturIs
     *
     * @param Builder $query
     * @param  array|string $tingkat_aparatur // analis dan damkar
     * @return Builder
     */
    public function scopeTingkatAparaturIs(Builder $query, $tingkat_aparatur): Builder
    {
        $method = is_array($tingkat_aparatur) ? 'whereIn' : 'where';
        return $query->$method('tingkat_aparatur', $tingkat_aparatur);
    }

    public function penilaiAngkaKreditDamkar()
    {
        return $this->belongsTo(User::class, 'penilai_ak_damkar_id', 'id');
    }

    public function penetapAngkaKreditDamkar()
    {
        return $this->belongsTo(User::class, 'penetap_ak_damkar_id', 'id');
    }

    public function penilaiAngkaKreditAnalis()
    {
        return $this->belongsTo(User::class, 'penilai_ak_analis_id', 'id');
    }

    public function penetapAngkaKreditAnalis()
    {
        return $this->belongsTo(User::class, 'penetap_ak_analis_id', 'id');
    }

    public function crossPenilaiAndPenetaps()
    {
        return $this->hasMany(CrossPenilaiAndPenetap::class);
    }
}
