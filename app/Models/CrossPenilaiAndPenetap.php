<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossPenilaiAndPenetap extends Model
{
    use HasFactory;

    protected $fillable = [
        'kab_kota_id',
        'provinsi_id',
        'tingkat_aparatur',
        'kab_prov_penilai_and_penetap_id'
    ];

    public function scopeTingkatAparaturIs(Builder $query, $tingkat_aparatur): Builder
    {
        $method = is_array($tingkat_aparatur) ? 'whereIn' : 'where';
        return $query->$method('tingkat_aparatur', $tingkat_aparatur);
    }

    public function kabProvPenilaiAndPenetap()
    {
        return $this->belongsTo(KabProvPenilaiAndPenetap::class);
    }
}
