<?php

namespace App\Repositories;

use App\Models\PengembanganPenunjangProfesi;
use App\Models\Periode;
use App\Models\User;

class PengembanganPenunjangProfesiRepository
{
    protected PengembanganPenunjangProfesi $pengembanganPenunjangProfesi;

    public function __construct(PengembanganPenunjangProfesi $pengembanganPenunjangProfesi)
    {
        $this->pengembanganPenunjangProfesi = $pengembanganPenunjangProfesi;
    }

    public function getByFungsionalAndPeriode(User $user, $periode)
    {
        return $this->pengembanganPenunjangProfesi->query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode?->id)
            ->first();
    }

    public function updateOrCreate($user_id, $periode_id, $link, $name, $jml_ak_profesi, $jml_ak_penunjang)
    {
        $pengembanganPenunjangProfesi = $this->pengembanganPenunjangProfesi->query()
            ->where('fungsional_id', $user_id)
            ->where('periode_id', $periode_id)
            ->first();
        if ($pengembanganPenunjangProfesi instanceof PengembanganPenunjangProfesi) {
            deleteImage($pengembanganPenunjangProfesi->link);
            $pengembanganPenunjangProfesi->update([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'link' => $link,
                'name' => $name,
                'jml_ak_profesi' => $jml_ak_profesi,
                'jml_ak_penunjang' => $jml_ak_penunjang
            ]);
        } else {
            $this->pengembanganPenunjangProfesi->query()->create([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'link' => $link,
                'name' => $name,
                'jml_ak_profesi' => $jml_ak_profesi,
                'jml_ak_penunjang' => $jml_ak_penunjang
            ]);
        }
    }
}
