<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    public function index()
    {

        dd(ucwords('sdj sdjhsd'));
    }
}