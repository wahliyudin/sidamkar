<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama',
        'email_info_penetapan'
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

    public function kabProvPenilaiAndPenetaps()
    {
        return $this->hasMany(KabProvPenilaiAndPenetap::class);
    }

    public function kabProvPenilaiAndPenetap()
    {
        return $this->hasOne(KabProvPenilaiAndPenetap::class);
    }

    public function crossPenilaiAndPenetap()
    {
        return $this->hasOne(CrossPenilaiAndPenetap::class);
    }

    public function crossPenilaiAndPenetaps()
    {
        return $this->hasMany(CrossPenilaiAndPenetap::class);
    }
}