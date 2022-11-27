<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\MenteDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenilaiAndPenetapRequest;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\Mente;
use App\Models\Provinsi;
use App\Models\User;
use App\Services\KabKota\MenteService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MenteController extends Controller
{
    use AuthTrait;

    private MenteService $menteService;

    public function __construct(MenteService $menteService)
    {
        $this->menteService = $menteService;
    }

    public function index(MenteDataTable $dataTable)
    {
        $judul = 'Data Mentee';
        $periode = $this->menteService->getPeriodeActive();
        $fungsionals = $this->menteService->getFungsionalKabKota();
        $atasanLangsungs = $this->menteService->getAtasanLangsungKabKota();
        $user = $this->authUser()->load(['userProvKabKota']);
        $penilaiAndPenetaps = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($user->userProvKabKota->kab_kota_id, ['damkar', 'analis']);
        if (!isset($penilaiAndPenetaps)) {
            $penilaiAndPenetaps = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($user->userProvKabKota->provinsi_id, ['damkar', 'analis']);
        }
        $penilaiPenetapDamkar = null;
        $penilaiPenetapAnalis = null;
        $penilaiAndPenetaps->map(function(KabProvPenilaiAndPenetap $kabProvPenilaiAndPenetap) use (&$penilaiPenetapDamkar, &$penilaiPenetapAnalis){
            if ($kabProvPenilaiAndPenetap->jenis_aparatur == 'damkar') {
                $penilaiPenetapDamkar = $kabProvPenilaiAndPenetap;
            } else {
                $penilaiPenetapAnalis = $kabProvPenilaiAndPenetap;
            }
        });
        $provinsis = Provinsi::query()->get(['id', 'nama']);
        return $dataTable->render('kabkota.mente.index', compact('fungsionals', 'atasanLangsungs', 'penilaiPenetapDamkar', 'penilaiPenetapAnalis', 'provinsis', 'periode', 'judul'));
    }

    public function tingkatKabKota($kab_kota_id, $tingkat_aparatur)
    {
        $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($kab_kota_id, $tingkat_aparatur);
        if (!isset($penilaiAndPenetap?->penilaiAngkaKredit)) {
            throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penilai']);
        }
        return response()->json([
            'penilaiAndPenetap' => [
                'penilai' => [
                    'id' => $penilaiAndPenetap?->penilai_ak_id,
                    'nama' => $penilaiAndPenetap?->penilaiAngkaKredit?->userPejabatStruktural?->nama,
                ],
                'penetap' => [
                    'id' => $penilaiAndPenetap?->penetap_ak_id,
                    'nama' => $penilaiAndPenetap?->penetapAngkaKredit?->userPejabatStruktural?->nama,
                ]
            ],
        ]);
    }

    public function tingkatProvinsi($provinsi_id, $tingkat_aparatur)
    {
        $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($provinsi_id, $tingkat_aparatur);
        if (!isset($penilaiAndPenetap?->penilaiAngkaKredit)) {
            throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penilai']);
        }

        return response()->json([
            'penilaiAndPenetap' => [
                'penilai' => [
                    'id' => $penilaiAndPenetap?->penilai_ak_id,
                    'nama' => $penilaiAndPenetap?->penilaiAngkaKredit?->userPejabatStruktural?->nama,
                ],
                'penetap' => [
                    'id' => $penilaiAndPenetap?->penetap_ak_id,
                    'nama' => $penilaiAndPenetap?->penetapAngkaKredit?->userPejabatStruktural?->nama,
                ]
            ],
        ]);
    }

    public function storePenilaiAndPenetap(StorePenilaiAndPenetapRequest $request)
    {
        $user = $this->authUser()->load('userProvKabKota')->userProvKabKota;
        $this->menteService->storePenilaiAndPenetapKabKota($request->penilai, $request->penetap, $request->tingkat_aparatur, $request->kab_kota_id, $request->provinsi_id, $user->kab_kota_id, $user->provinsi_id);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diterapkan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'atasan_langsung' => 'required',
            'fungsionals' => 'required|array'
        ]);
        $fungsionals = [];
        foreach ($request->fungsionals as $fungsional) {
            array_push($fungsionals, [
                'fungsional_id' => $fungsional
            ]);
        }
        User::query()->find($request->atasan_langsung)->mentes()->createMany($fungsionals);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        $mentes = User::query()->withWhereHas('mentes.fungsional.roles')->find($id)->mentes;
        return view('kabkota.mente.show', compact('mentes'));
    }

    public function edit($id)
    {
        $atasan_langsung_id = Mente::query()->where('fungsional_id', $id)->first()?->atasan_langsung_id;
        if (!$atasan_langsung_id) {
            throw ValidationException::withMessages(['Pejabat fungsional belum memiliki atasan langsung']);
        }
        return response()->json([
            'data' => $atasan_langsung_id
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'atasan_langsung' => 'required'
        ]);
        $aparatur = User::query()->where('status_akun', 1)->whereRoleIs(getAllRoleFungsional())->find($id);
        if (!$aparatur) {
            throw ValidationException::withMessages(['Data tidak ditemukan']);
        }
        $aparatur->mente()->update([
            'atasan_langsung_id' => $request->atasan_langsung
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diubah'
        ]);
    }
}