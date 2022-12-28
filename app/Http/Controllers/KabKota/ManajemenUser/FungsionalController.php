<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

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

class FungsionalController extends Controller
{
    use RoleTrait;
    private FungsionalService $fungsionalService;

    public function __construct(FungsionalService $fungsionalService)
    {
        $this->fungsionalService = $fungsionalService;
    }

    public function index(FungsionalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.manajemen-user.fungsional.index');
    }

    public function reject(Request $request, $id)
    {
        $this->fungsionalService->reject($request, $id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function verification($id)
    {
        $this->fungsionalService->verification($id);
        return response()->json([
            'success' => 200,
            'message' => "Akun Berhasil DIVERIFIKASI",
        ]);
    }

    public function destroy($id)
    {
        $this->fungsionalService->destroy($id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil dihapus",
        ]);
    }
    public function show($id)
    {
        $user = User::query()->with(['roles', 'userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find($id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->whereIn('nama', $this->getPangkatByRole($user->roles()->first()->name))->get();
        $mekanismePengangkatans = MekanismePengangkatan::query()->get();
        $judul = 'Data Fungsional';

        return view('kabkota.manajemen-user.fungsional.show', compact('user', 'provinsis', 'kab_kota', 'pangkats', 'judul', 'mekanismePengangkatans'));
    }


    public function edit_fungsional($id)
    {
        $user = User::query()->with(['roles', 'userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find($id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->whereIn('nama', $this->getPangkatByRole($user->roles()->first()->name))->get();
        $mekanismePengangkatans = MekanismePengangkatan::query()->get();
        $nomenklatur = NomenKlaturPerangkatDaerah::query()->get();
        $judul = 'Data Fungsional';
        return view('kabkota.manajemen-user.fungsional.edit', compact('user', 'provinsis', 'kab_kota', 'pangkats', 'judul', 'mekanismePengangkatans', 'nomenklatur'));
    }

    public function edit_struktural($id)
    {
        $judul = 'Data Saya';
        $user = User::query()->with(['userPejabatStruktural.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find($id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->get();
        $nomenklatur = NomenKlaturPerangkatDaerah::query()->get();
        return view('kabkota.manajemen-user.struktural.edit', compact('user', 'provinsis', 'kab_kota', 'pangkats', 'judul', 'nomenklatur'));
    }
}
