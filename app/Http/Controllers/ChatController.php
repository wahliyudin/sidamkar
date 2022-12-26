<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Events\ChatEvent;
use Pusher\Pusher as Pusher;

class ChatController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $chat_list = DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', 10)->select('users.id', 'users.username')->first();

        $new_massage = DB::table('chats')->join('users', 'chats.to', '=', 'users.id')->where('chats.to', '!=', Auth::user()->id)->select(DB::raw('COUNT(chats.id) as count'))->whereStatus(0)->groupBy('users.id')->orderBy('chats.created_at', 'DESC')->first();

        return view('chatbox', ["data" => $chat_list, "new" => $new_massage]);
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            try {
                $check_role = Auth::user()->roles()->first();
                
                if ($check_role->id != 10) {
                    $admin_id = DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', 10)->select('users.id')->first();

                    $chat = Chat::query()->create([
                        'from' => Auth::user()->id,
                        'to' => $admin_id->id,
                        'message' => $request->message,
                        'status' => 0
                    ]);
                } else {
                    $chat = Chat::query()->create([
                        'from' => Auth::user()->id,
                        'to' => $request->to,
                        'message' => $request->message,
                        'status' => 0
                    ]);
                }

                $chat = [
                    "from" => Auth::user()->id,
                    "to" => $request->to
                ];

                $options = array(
                    'cluster' => 'ap1',
                    'useTLS' => true
                );

                $pusher = new Pusher(
                    '8065b88b38209d3beaa9',
                    '72aba97b9fc11a0ae4aa',
                    '1529126',
                    $options
                );
        
                $pusher->trigger('channel-chat', 'chat-in-out', $chat);
                
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
            $from = $request->from;

            $conversation = DB::select(DB::Raw("SELECT chats.* FROM chats WHERE (chats.from = '".Auth::user()->id."' AND chats.to = '".$from."') OR (chats.from = '".$from."' AND chats.to = '".Auth::user()->id."')"));

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
            $chat_list = DB::table('chats')->join('users', 'chats.from', '=', 'users.id')->where('chats.from', '!=', Auth::user()->id)->select('users.id', 'users.username')->groupBy('users.id')->orderBy('chats.created_at', 'DESC')->get();

            $new_massage = DB::table('chats')->join('users', 'chats.to', '=', 'users.id')->where('chats.to', '!=', Auth::user()->id)->select(DB::raw('COUNT(chats.id) as count'))->whereStatus(0)->groupBy('users.id')->orderBy('chats.created_at', 'DESC')->first();

            return response()->json([
                'status' => 200,
                'data' => $chat_list,
                'new' => $new_massage,
                'message' => 'Berhasil mendapatkan chat list'
            ]);
        }
    }
}