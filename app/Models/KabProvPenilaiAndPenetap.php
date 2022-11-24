<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabProvPenilaiAndPenetap extends Model
{
    use HasFactory;

    protected $fillable = [
        'penilai_ak_id',
        'penetap_ak_id',
        'kab_kota_id',
        'provinsi_id'
    ];

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