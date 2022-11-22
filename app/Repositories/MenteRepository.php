<?php

namespace App\Repositories;

use App\Models\Mente;

class MenteRepository
{
    private Mente $mente;

    public function __construct(Mente $mente)
    {
        $this->mente = $mente;
    }

    public function getFungsionalIds(): array
    {
        return $this->mente->query()->pluck('fungsional_id')->toArray();
    }
}
