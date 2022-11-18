<?php

namespace App\Traits;

/**
 * Scoring
 */
trait ScoringTrait
{
    public function getScore(int $authRole, int $role, float $score): float|null
    {
        if ($authRole == $role) return $score;
        if ($role - 1 == $authRole) return (80/100) * $score;
        if ($role + 1 == $authRole) return $score;
        return null;
    }
}
