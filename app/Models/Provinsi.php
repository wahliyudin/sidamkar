<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    /**
     * kabKotas
     *
     * @return HasMany
     */
    public function kabKotas()
    {
        return $this->hasMany(KabKota::class);
    }
}
