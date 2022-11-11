<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KabKota extends Model
{
    use HasFactory;

    protected $fillable = [
        'provinsi_id',
        'nama'
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

    public function penilaiAngkaKredit()
    {
        return $this->hasOne(PenilaiAngkaKredit::class);
    }
}
