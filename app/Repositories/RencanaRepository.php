<?php

namespace App\Repositories;

use App\Models\Rencana;
use App\Models\User;

class RencanaRepository
{
    private Rencana $rencana;

    public function __construct(Rencana $rencana)
    {
        $this->rencana = $rencana;
    }

    public function getAllByUser(User $user)
    {
        return $this->rencana->query()->where('user_id', $user->id)->get();
    }
}
