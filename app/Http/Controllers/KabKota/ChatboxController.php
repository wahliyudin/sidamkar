<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatboxController extends Controller
{
    public function index()
    {
        return view('kabkota.chatbox');
    }
}
