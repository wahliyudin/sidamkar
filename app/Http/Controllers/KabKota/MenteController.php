<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\MenteDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenilaiAndPenetapRequest;
use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\Mente;
use App\Models\Provinsi;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\MenteService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MenteController extends Controller
{
    use AuthTrait;

    protected MenteService $menteService;
    protected PeriodeRepository $periodeRepository;

    public function __construct(MenteService $menteService, PeriodeRepository $periodeRepository)
    {
        $this->menteService = $menteService;
        $this->periodeRepository = $periodeRepository;
    }

    public function index(MenteDataTable $dataTable)
    {
        $judul = 'Data Mentee';
        $periode = $this->menteService->getPeriodeActive();
        $fungsionals = $this->menteService->getFungsionalKabKota();
        $atasanLangsungs = $this->menteService->getAtasanLangsungKabKota();
        $user = $this->authUser()->load(['userProvKabKota']);
        $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($user->userProvKabKota->kab_kota_id);
        if (!isset($penilaiAndPenetap)) {
            $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($user->userProvKabKota->kab_kota_id);
        }
        $provinsis = Provinsi::query()->get(['id', 'nama']);
        return $dataTable->render('kabkota.mente.index', compact('fungsionals', 'penilaiAndPenetap', 'atasanLangsungs', 'provinsis', 'periode', 'judul'));
    }

    public function tingkatKabKota(Request $request, $kab_kota_id)
    {
        $request->validate(['penilai_penetap' => 'required|in:penilai,penetap', 'jenis_aparatur' => 'required']);
        $data = [];
        switch ($request->jenis_aparatur) {
            case 'penilai_ak_damkar':
                $data = $this->menteService->getKabKotaPenilaiAKDamkar($kab_kota_id);
                break;
            case 'penetap_ak_damkar':
                $data = $this->menteService->getKabKotaPenetapAKDamkar($kab_kota_id);
                break;
            case 'penilai_ak_analis':
                $data = $this->menteService->getKabKotaPenilaiAKAnalis($kab_kota_id);
                break;
            case 'penetap_ak_analis':
                $data = $this->menteService->getKabKotaPenetapAKAnalis($kab_kota_id);
                break;
        }
        return response()->json($data);
    }

    public function tingkatProvinsi(Request $request, $provinsi_id)
    {
        $request->validate(['penilai_penetap' => 'required|in:penilai,penetap', 'jenis_aparatur' => 'required']);
        $data = [];
        switch ($request->jenis_aparatur) {
            case 'penilai_ak_damkar':
                $data = $this->menteService->getProvinsiPenilaiAKDamkar($provinsi_id);
                break;
            case 'penetap_ak_damkar':
                $data = $this->menteService->getProvinsiPenetapAKDamkar($provinsi_id);
                break;
            case 'penilai_ak_analis':
                $data = $this->menteService->getProvinsiPenilaiAKAnalis($provinsi_id);
                break;
            case 'penetap_ak_analis':
                $data = $this->menteService->getProvinsiPenetapAKAnalis($provinsi_id);
                break;
        }
        return response()->json($data);
    }

    public function storePenilaiAndPenetap(Request $request)
    {
        $user = $this->authUser()->load('userProvKabKota');
        $periode = $this->periodeRepository->isActive();
        switch ($request->jenis_aparatur) {
            case 'penilai_ak_damkar':
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ], [
                    'penilai_ak_damkar_id' => $request->kab_prov_penilai_penetap,
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ]);
                break;
            case 'penetap_ak_damkar':
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ], [
                    'penetap_ak_damkar_id' => $request->kab_prov_penilai_penetap,
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ]);
                break;
            case 'penilai_ak_analis':
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ], [
                    'penilai_ak_analis_id' => $request->kab_prov_penilai_penetap,
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ]);
                break;
            case 'penetap_ak_analis':
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ], [
                    'penetap_ak_analis_id' => $request->kab_prov_penilai_penetap,
                    'kab_kota_id' => $user->userProvKabKota->kab_kota_id,
                    'tingkat_aparatur' => 'kab_kota',
                    'periode_id' => $periode->id
                ]);
                break;
        }
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
