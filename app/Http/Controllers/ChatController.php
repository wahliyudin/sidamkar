<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('chatbox');
    }

    public function store(Request $request)
    {
        try {
            $chat = Unsur::query()->create([
                'from' => Auth::user()->id,
                'to' => '97ef74a7-bb9d-40d5-9115-6311e76de570',
                'message' => $request->message,
                'status' => 0
            ]);
            
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ditambahkan'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => $th->getCode(),
                'message' => $th->getMessage()
            ]);
        }
    }
}