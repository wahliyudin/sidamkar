<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KabKota extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'provinsi_id',
        'nama',
        'email_info_penetapan'
    ];

    /**
     * provinsi
     *
     * @return BelongsTo
     */
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function userAparatur()
    {
        return $this->hasMany(UserAparatur::class);
    }

    public function userPejabatStruktural()
    {
        return $this->hasMany(UserPejabatStruktural::class);
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