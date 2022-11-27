<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabProvPenilaiAndPenetap extends Model
{
    use HasFactory;

    protected $fillable = [
        'penilai_ak_id',
        'penetap_ak_id',
        'jenis_aparatur',
        'kab_kota_id',
        'provinsi_id'
    ];

    /**
     * scopeJenisAparaturIs
     *
     * @param Builder $query
     * @param  array|string $jenis_aparatur // analis dan damkar
     * @return Builder
     */
    public function scopeJenisAparaturIs(Builder $query, $jenis_aparatur): Builder
    {
        $method = is_array($jenis_aparatur) ? 'whereIn' : 'where';
        return $query->$method('jenis_aparatur', $jenis_aparatur);
    }

    public function penilaiAngkaKredit()
    {
        return $this->belongsTo(User::class, 'penilai_ak_id', 'id');
    }

    public function penetapAngkaKredit()
    {
        return $this->belongsTo(User::class, 'penetap_ak_id', 'id');
    }

    public function crossPenilaiAndPenetaps()
    {
        return $this->hasMany(CrossPenilaiAndPenetap::class);
    }
}