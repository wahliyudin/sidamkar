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
use App\Models\MekanismePengangkatan;
use App\Models\PangkatGolonganTmt;
use App\Traits\RoleTrait;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use App\Models\NomenKlaturPerangkatDaerah;

class DataSayaController extends Controller
{
    use ImageTrait, RoleTrait;

    public function index()
    {
        $user = User::query()->with(['roles', 'userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->whereIn('nama', $this->getPangkatByRole($user->roles()->first()->name))->get();
        $mekanismePengangkatans = MekanismePengangkatan::query()->get();
        $nomenklatur = NomenKlaturPerangkatDaerah::query()->get();
        $judul = 'Data Saya';
        return view('aparatur.data-saya.index', compact('user', 'provinsis', 'kab_kota', 'pangkats', 'judul', 'mekanismePengangkatans', 'nomenklatur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'pangkat_golongan_tmt_id' => 'required',
            'nomor_karpeg' => 'required',
            'pendidikan_terakhir' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            // 'kab_kota_id' => 'required',
            // 'provinsi_id' => 'required',
            'mekanisme_pengangkatan_id' => 'nullable',
            'angka_mekanisme' => 'nullable',
            'jabatan_tmt' => 'required',
            'golongan_tmt' => 'required',
            'nomenklatur_perangkat_daerah_id' => 'required',
        ], [
            'nomenklatur_perangkat_daerah_id.required' => "Unit Kerja Wajib Diisi."
        ]);
        if (isset($request->angka_mekanisme)) {
            if ($request->angka_mekanisme > 150 || $request->angka_mekanisme < 0) {
                throw ValidationException::withMessages(['Angka Mekanisme tidak boleh lebih dari 150 atau kurang dari 0']);
            }
        }
        $data = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'pangkat_golongan_tmt_id' => $request->pangkat_golongan_tmt_id,
            'jabatan_tmt' => $request->jabatan_tmt,
            'golongan_tmt' => $request->golongan_tmt,
            'nomenklatur_perangkat_daerah_id' => $request->nomenklatur_perangkat_daerah_id,
            'nomor_karpeg' => $request->nomor_karpeg,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => Carbon::make($request->tanggal_lahir)->format('Y-m-d'),
            'jenis_kelamin' => $request->jenis_kelamin,
            // 'kab_kota_id' => $request->kab_kota_id,
            // 'provinsi_id' => $request->provinsi_id,

        ];
        if (isset($request->mekanisme_pengangkatan_id)) {
            $data = array_merge($data, [
                'mekanisme_pengangkatan_id' => $request->mekanisme_pengangkatan_id,
                'angka_mekanisme' => $request->angka_mekanisme,
                'status_mekanisme' => 1
            ]);
        }
        if ($request->hasFile('avatar')) {
            $data['foto_pegawai'] = $this->storeImage($request->file('avatar'), 'aparatur');
        }
        if ($request->hasFile('ttd')) {
            $data['file_ttd'] = $this->storeImage($request->file('ttd'), 'aparatur');
        }
        $user = User::query()->with('userAparatur')->find(auth()->user()->id);
        if (isset($user->userAparatur)) {
            $user->userAparatur()->update($data);
            if (isset($data['foto_pegawai'])) {
                deleteImage($user->userAparatur->foto_pegawai);
            }
            if (isset($data['file_ttd'])) {
                deleteImage($user->userAparatur->file_ttd);
            }
        } else {
            $user->userAparatur()->create($data);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Disimpan'

        ]);
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

    public function showDocKom($id)
    {
        $file = DokKompetensi::query()->findOrFail($id)->file;
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
