<?php

namespace App\Http\Controllers;

use App\Traits\ScoringTrait;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    use ScoringTrait;

    public function index()
    {
        dd($this->getScore(1, 0, 0.002));
    }
}
