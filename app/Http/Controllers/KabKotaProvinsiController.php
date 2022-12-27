<?php

namespace App\Http\Controllers;

use App\DataTables\KabKota\ManajemenUser\FungsionalDataTable;
use App\Http\Controllers\Controller;
use App\Services\FungsionalService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\PangkatGolonganTmt;
use App\Models\MekanismePengangkatan;
use App\Traits\RoleTrait;
use Carbon\Carbon;
use App\Models\NomenKlaturPerangkatDaerah;
use Illuminate\Validation\ValidationException;

class KabKotaProvinsiController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'nip' => 'required',
        //     'pangkat_golongan_tmt_id' => 'required',
        //     'nomor_karpeg' => 'required',
        //     'pendidikan_terakhir' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'kab_kota_id' => 'required',
        //     'provinsi_id' => 'required',
        //     'mekanisme_pengangkatan_id' => 'nullable',
        //     'angka_mekanisme' => 'nullable',
        //     'jabatan_tmt' => 'required',
        //     'golongan_tmt' => 'required',
        //     'nomenklatur_perangkat_daerah_id' => 'required',
        // ], [
        //     'nomenklatur_perangkat_daerah_id.required' => "Unit Kerja Wajib Diisi."
        // ]);
        if (isset($request->angka_mekanisme)) {
            if ($request->angka_mekanisme > 56.25 || $request->angka_mekanisme < 0) {
                throw ValidationException::withMessages(['Angka Mekanisme tidak boleh lebih dari 56.25 atau kurang dari 0']);
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
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kab_kota_id' => $request->kab_kota_id,
            'provinsi_id' => $request->provinsi_id,

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
        $user = User::query()->with('userAparatur')->find($request->user_id);
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
}
