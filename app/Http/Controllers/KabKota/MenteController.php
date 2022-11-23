<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\MenteDataTable;
use App\Http\Controllers\Controller;
use App\Models\Mente;
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
        $user = $this->authUser()->load(['userProvKabKota.kab_kota.penilaiAngkaKredit', 'userProvKabKota.kab_kota.penetapAngkaKredit']);
        $penilai = $user->userProvKabKota?->kab_kota?->penilaiAngkaKredit?->userPejabatStruktural?->nama;
        $penetap = $user->userProvKabKota?->kab_kota?->penetapAngkaKredit?->userPejabatStruktural?->nama;
        return $dataTable->render('kabkota.mente.index', compact('fungsionals', 'atasanLangsungs', 'penilai', 'penetap', 'periode', 'judul'));
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
