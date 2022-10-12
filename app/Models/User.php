<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'kab_kota_id',
        'verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * dokKepegawaians
     *
     * @return HasMany
     */
    public function dokKepegawaians(): HasMany
    {
        return $this->hasMany(DokKepegawaian::class);
    }

    /**
     * dokKompetensis
     *
     * @return HasMany
     */
    public function dokKompetensis(): HasMany
    {
        return $this->hasMany(DokKompetensi::class);
    }

    /**
     * kabKota
     *
     * @return BelongsTo
     */
    public function kabKota(): BelongsTo
    {
        return $this->belongsTo(KabKota::class);
    }

    /**
     * userAparatur
     *
     * @return HasOne
     */
    public function userAparatur(): HasOne
    {
        return $this->hasOne(UserAparatur::class);
    }

    /**
     * userPejabatStruktural
     *
     * @return HasOne
     */
    public function userPejabatStruktural(): HasOne
    {
        return $this->hasOne(UserPejabatStruktural::class);
    }

    /**
     * userProvKabKota
     *
     * @return HasOne
     */
    public function userProvKabKota(): HasOne
    {
        return $this->hasOne(UserProvKabKota::class);
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
}
