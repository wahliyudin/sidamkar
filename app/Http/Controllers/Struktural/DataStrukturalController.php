<?php
namespace App\Http\Controllers\Struktural;

use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Auth;

// use Requests Data Aparatur
use App\Http\Requests\DataAparatur\StoreDataAparatur;
use App\Models\PangkatGolonganTmt;
use App\Traits\AuthTrait;
use Carbon\Carbon;


class DataStrukturalController extends Controller
{
    use ImageTrait, AuthTrait;

    public function index()
    {
        $judul = 'Data Saya';
        $user = User::query()->with(['userPejabatStruktural.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->get();
        return view('struktural.data-saya.index', compact('user', 'provinsis', 'kab_kota', 'pangkats', 'judul'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nip' => 'required',
            'pangkat_golongan_tmt_id' => 'required',
            'nomor_karpeg' => 'required',
            'pendidikan_terakhir' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            // 'provinsi_id' => 'required'
        ];
        if ($this->authUser()->tingkat_aparatur == 'kab_kota') {
            $rules['kab_kota_id'] = 'required';
        }
        $request->validate($rules);
        $data = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'pangkat_golongan_tmt_id' => $request->pangkat_golongan_tmt_id,
            'nomor_karpeg' => $request->nomor_karpeg,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => Carbon::make($request->tanggal_lahir)->format('Y-m-d'),
            'jenis_kelamin' => $request->jenis_kelamin,
            // 'kab_kota_id' => $request?->kab_kota_id ?? null,
            // 'provinsi_id' => $request->provinsi_id,
        ];
        if ($request->hasFile('avatar')) {
            $data['foto_pegawai'] = $this->storeImage($request->file('avatar'), 'aparatur');
        }
        if ($request->hasFile('ttd')) {
            $data['file_ttd'] = $this->storeImage($request->file('ttd'), 'aparatur');
        }
        $user = User::query()->with('userPejabatStruktural')->find(auth()->user()->id);
        if (isset($user->userPejabatStruktural)) {
            $user->userPejabatStruktural()->update($data);
            if (isset($data['foto_pegawai'])) {
                deleteImage($user->userPejabatStruktural->foto_pegawai);
            }
            if (isset($data['file_ttd'])) {
                deleteImage($user->userPejabatStruktural->file_ttd);
            }
        } else {
            $user->userPejabatStruktural()->create($data);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Disimpan'

        ]);
    }

    public function create()
    {
        return view('struktural.data-saya.index');
    }

    public function showDocKepeg($id)
    {
        $file = DokKepegawaian::query()->findOrFail($id)->file;
        return view('struktural.data-saya.show-document', compact('file'));
    }

    public function storeDocKepeg(Request $request)
    {
        try {
            $file = $this->storeFile($request->file('doc_kepegawaian'), 'struktural/doc');
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
            $file = $this->storeFile($request->file('doc_kompetensi'), 'struktural/doc');
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
