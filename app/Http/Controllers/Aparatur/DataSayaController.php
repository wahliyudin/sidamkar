<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use App\Models\DokKepegawaian;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataSayaController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $user = User::query()->with(['userAparatur', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        return view('aparatur.data-saya.index', compact('user'));
    }

    public function showDocKepeg($id)
    {
        $file = DokKepegawaian::query()->findOrFail($id)->file;
        return view('aparatur.data-saya.show-document', compact('file'));
    }

    public function storeDocKepeg(Request $request)
    {
        try {
            $file = $this->storeFile($request->file('doc_kepegawaian'), 'fungsional/doc');
            User::query()->find(Auth::user()->id)->dokKepegawaians()->create([
                'file' => $file,
                'nama' => $request->nama
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storeDocKom(Request $request)
    {
        try {
            $file = $this->storeFile($request->file('doc_kompetensi'), 'fungsional/doc');
            User::query()->find(Auth::user()->id)->dokKompetensis()->create([
                'file' => $file,
                'nama' => $request->nama
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
