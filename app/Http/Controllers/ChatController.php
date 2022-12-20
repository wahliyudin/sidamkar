<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $chat_list = DB::table('chats')->join('users', 'chats.from', '=', 'users.id')->where('chats.id', '=', DB::raw('(SELECT MAX(chats.id) as id FROM chats JOIN users ON chats.from = users.id WHERE chats.from = \'97ef74a7-bb9d-40d5-9115-6311e76de570\' GROUP BY chats.from)'))->select('users.id', 'users.username', 'chats.message', 'chats.created_at')->get();

        return view('chatbox');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            try {
                $chat = Chat::query()->create([
                    'from' => Auth::user()->id,
                    'to' => $request->to,
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

    public function conversation(Request $request)
    {
        if ($request->ajax()) {
            $conversation = DB::table('chats')->where('chats.from', '=', Auth::user()->id)->orWhere('chats.to', '=', Auth::user()->id)->select('chats.*')->get();

            return response()->json([
                'status' => 200,
                'data' => $conversation,
                'message' => 'Berhasil mendapatkan conversation'
            ]);
        }
    }

    public function chatList(Request $request)
    {
        if ($request->ajax()) {
            $check_role = Auth::user()->roles()->first();

            $chat_list = DB::table('chats')->join('users', 'chats.from', '=', 'users.id')->select('users.id', 'users.username')->get();

            return response()->json([
                'status' => 200,
                'data' => $chat_list,
                'message' => 'Berhasil mendapatkan chat list'
            ]);
        }
    }
}