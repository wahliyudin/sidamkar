<?php

namespace App\Traits;

use App\Models\Role;

/**
 * Scoring
 */
trait ScoringTrait
{
    public function getScore(int $authRole, int $role, float $score): float|null
    {
        if ($authRole == $role) return $score;
        if ($role - 1 == $authRole) return (80 / 100) * $score;
        if ($role + 1 == $authRole) return $score;
        return null;
    }

    public function limiRole($role)
    {
        if ($role >= 1 && $role <= 4) {
            if ($role == 4) return [$role - 1, $role];
            if ($role == 1) return [$role + 1, $role];
            return [$role + 1, $role - 1, $role];
        }
        if ($role >= 5 && $role <= 7) {
            if ($role == 7) return [$role - 1, $role];
            if ($role == 5) return [$role + 1, $role];
            return [$role + 1, $role - 1, $role];
        }
    }

    public function groupRole(Role $role)
    {
        if (in_array($role->name, getAllRoleFungsionalDamkar())) {
            return 'damkar';
        }
        if (in_array($role->name, getAllRoleFungsionalAnalis())) {
            return 'analis';
        }
    }
}