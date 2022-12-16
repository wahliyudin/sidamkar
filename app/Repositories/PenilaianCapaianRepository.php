<?php

namespace App\Repositories;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\KetentuanNilai;
use App\Models\KetentuanSkpFungsional;
use App\Models\PenilaianCapaian;
use App\Models\Periode;
use App\Models\User;
use Carbon\Carbon;

class PenilaianCapaianRepository
{
    protected PenilaianCapaian $penilaianCapaian;

    public function __construct(PenilaianCapaian $penilaianCapaian)
    {
        $this->penilaianCapaian = $penilaianCapaian;
    }

    public function getByFungsionalAndPeriode(User $user, Periode $periode)
    {
        return $this->penilaianCapaian->query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode->id)
            ->first();
    }

    public function updateOrCreate($user_id, $periode_id, $capaian_ak, $link, $name)
    {
        $penilaianCapaian = $this->penilaianCapaian->query()
            ->where('fungsional_id', $user_id)
            ->where('periode_id', $periode_id)
            ->first();
        if ($penilaianCapaian instanceof PenilaianCapaian) {
            deleteImage($penilaianCapaian->link);
            $penilaianCapaian->update([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'capaian_ak' => $capaian_ak,
                'link' => $link,
                'name' => $name
            ]);
        } else {
            $this->penilaianCapaian->query()->create([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'capaian_ak' => $capaian_ak,
                'link' => $link,
                'name' => $name
            ]);
        }
    }

    public function generatePenilaianCapaian(Periode $periode, User $user, $target_ak_skp)
    {
        $user = $user->load(['roles', 'userAparatur.pangkatGolonganTmt', 'ketentuanSkpFungsional.ketentuanSkp']);
        $capaian = $this->ketentuanSKPFungsional($user->ketentuanSkpFungsional);
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        $ketentuan_nailai = KetentuanNilai::query()
            ->where('role_id', $role?->id)
            ->where('pangkat_golongan_tmt_id', $user->userAparatur->pangkat_golongan_tmt_id)
            ->first();
        return [
            'user' => $user,
            'role' => $role,
            'periode' => concatPriodeY($periode),
            'target_ak_skp' => $target_ak_skp,
            'capaian' => $capaian,
            'persentase' => $capaian . '%',
            'ak_min' => $ketentuan_nailai->ak_min,
            'ak_max' => $ketentuan_nailai->ak_max,
            'total_ak' => $target_ak_skp * ($capaian / 100),
            'result' => $this->calculateCapaian($target_ak_skp, $capaian, $ketentuan_nailai->ak_max)
        ];
    }

    public function calculateCapaian($target_ak_skp, $capaian, $ak_max)
    {
        $result = $target_ak_skp * ($capaian / 100);
        if ($result > $ak_max) {
            return $ak_max;
        }
        return $result;
    }

    public function ketentuanSKPFungsional(KetentuanSkpFungsional $ketentuanSkpFungsional)
    {
        if (isset($ketentuanSkpFungsional->ketentuanSkp)) {
            return $ketentuanSkpFungsional->ketentuanSkp->nilai;
        }
        return $ketentuanSkpFungsional->nilai_skp;
    }
}