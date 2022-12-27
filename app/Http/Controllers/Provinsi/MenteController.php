<?php

namespace App\Http\Controllers\Provinsi;

use App\DataTables\Provinsi\MenteDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenilaiAndPenetapRequest;
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
        $fungsionals = $this->menteService->getFungsionalProvinsi();
        $atasanLangsungs = $this->menteService->getAtasanLangsungProvinsi();
        $user = $this->authUser()->load(['userProvKabKota']);
        $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($user->userProvKabKota->provinsi_id);
        if (!isset($penilaiAndPenetap)) {
            $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($user->userProvKabKota->provinsi_id);
        }
        $email = Provinsi::query()->where('id', $user?->userProvKabKota?->provinsi_id)->first()?->email_info_penetapan;
        $provinsis = Provinsi::query()->get(['id', 'nama']);
        return $dataTable->render('provinsi.mente.index', compact('fungsionals', 'user', 'penilaiAndPenetap', 'atasanLangsungs', 'provinsis', 'periode', 'judul', 'email'));
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
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
                ], [
                    'penilai_ak_damkar_id' => $request->kab_prov_penilai_penetap,
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
                ]);
                break;
            case 'penetap_ak_damkar':
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
                ], [
                    'penetap_ak_damkar_id' => $request->kab_prov_penilai_penetap,
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
                ]);
                break;
            case 'penilai_ak_analis':
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
                ], [
                    'penilai_ak_analis_id' => $request->kab_prov_penilai_penetap,
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
                ]);
                break;
            case 'penetap_ak_analis':
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
                ], [
                    'penetap_ak_analis_id' => $request->kab_prov_penilai_penetap,
                    'provinsi_id' => $user->userProvKabKota->provinsi_id,
                    'tingkat_aparatur' => 'provinsi'
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
        return view('provinsi.mente.show', compact('mentes'));
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

    public function emailPenetapan(Request $request)
    {
        $request->validate([
            'email_penetapan' => 'required|email'
        ], [
            'email_penetapan.required' => 'Email wajib diisi'
        ]);
        Provinsi::query()->where('id', $this->authUser()->load(['userProvKabKota'])?->userProvKabKota?->provinsi_id)->first()?->update([
            'email_info_penetapan' => $request->email_penetapan
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil disimpan'
        ]);
    }
}