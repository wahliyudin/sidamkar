<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossPenilaiAndPenetap extends Model
{
    use HasFactory;

    protected $fillable = [
        'kab_kota_id',
        'provinsi_id',
        'kab_prov_penilai_and_penetap_id'
    ];

    public function kabProvPenilaiAndPenetap()
    {
        return $this->belongsTo(KabProvPenilaiAndPenetap::class);
    }
}