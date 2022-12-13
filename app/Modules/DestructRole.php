<?php

namespace App\Modules;

use App\Models\Role;
use Illuminate\Support\Collection;

class DestructRole
{
    public function getRoleAtasanLangsung(Collection $roles)
    {
        return $this->process($roles, 'atasan_langsung');
    }

    public function getRolePenilaiAk(Collection $roles)
    {
        return $this->process($roles, 'penilai_ak');
    }

    public function getRolePenetapAk(Collection $roles)
    {
        return $this->process($roles, 'penetap_ak');
    }

    private function process(Collection $roles, string $role_name)
    {
        foreach ($roles as $role) {
            if ($role instanceof Role) {
                if ($role->name == $role_name) {
                    return $role;
                }
            }
        }
        return null;
    }
}
