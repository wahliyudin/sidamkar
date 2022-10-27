<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use App\Models\DokKepegawaian;
use App\Models\DokKompetensi;
use App\Models\KabKota;
use App\Models\Provinsi;
use App\Models\User;

// use App\Models\UserPejabatStruktural;
use App\Models\Role;
use App\Models\UserAparatur;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Requests Data Aparatur
use App\Http\Requests\DataAparatur\StoreDataAparatur;

class DataSayaController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $user = User::query()->with(['userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $user_fungional = UserAparatur::query()->get();
        $role_user = userAparatur::query()->get();
        return view('aparatur.data-saya.index', compact('user', 'provinsis', 'kab_kota'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        User::query()->find(auth()->user()->id)->userAparatur()->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'pangkat_golongan_tmt' => $request->pangkat,
            'nomor_karpeg' => $request->nomor_karpeg,
            'pendidikan_terakhir' => $request->Pen_terakhir,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kab_kota_id' => $request->kab_kota_id,
            'provinsi_id' => $request->provinsi_id,
        ]);
        return to_route('data-saya');
    }

    public function create()
    {
        return view('aparatur.data-saya.index');
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

    public function destroyDocKepeg($id)
    {
        try {
            $dokKepeg = DokKepegawaian::query()->findOrFail($id);
            deleteImage($dokKepeg->file);
            $dokKepeg->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroyDocKom($id)
    {
        try {
            $dokKom = DokKompetensi::query()->findOrFail($id);
            deleteImage($dokKom->file);
            $dokKom->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
