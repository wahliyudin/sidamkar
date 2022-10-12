<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KabKota;
use Illuminate\Http\Request;

class KabKotaController extends Controller
{
    public function byProvinsiId($provinsi_id)
    {
        return json_encode(KabKota::query()->where('provinsi_id', $provinsi_id)->get(['id', 'nama']));
    }
}
