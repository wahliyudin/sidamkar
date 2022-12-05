<?php

namespace App\Repositories;

use App\Models\Unsur;
use App\Models\User;

class UnsurRepository
{
    protected Unsur $unsur;

    public function __construct(Unsur $unsur)
    {
        $this->unsur = $unsur;
    }

    public function getRekapUnsurs(User $user)
    {
        return $this->unsur->query()
            ->kegiatanJabatan()
            ->withWhereHas('subUnsurs', function ($query) use ($user) {
                $query->withWhereHas('butirKegiatans', function ($query) use ($user) {
                    $query->withSum('laporanKegiatanJabatans', 'score')
                        ->withCount('laporanKegiatanJabatans')
                        ->withWhereHas('laporanKegiatanJabatans', function ($query) use ($user) {
                            $query->where('user_id', $user->id);
                        });
                });
            })
            ->get();
    }
}