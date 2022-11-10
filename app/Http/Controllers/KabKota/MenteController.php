<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\MenteDataTable;
use App\Http\Controllers\Controller;
use App\Models\KabKota;
use App\Models\Mente;
use App\Models\PenetapAngkaKredit;
use App\Models\PenilaiAngkaKredit;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class MenteController extends Controller
{
    public function index(MenteDataTable $dataTable)
    {
        $judul = 'Data Mentee';
        $periode = Periode::query()->where('is_active', true)->first();
        $mentes = Mente::query()->pluck('fungsional_id')->toArray();
        $fungsionals = User::query()->whereHas('userAparatur', function ($query) {
            $query->where('kab_kota_id', auth()->user()->load('userProvKabKota')->userProvKabKota->kab_kota_id);
        })->where('status_akun', 1)->whereNotIn('id', $mentes)->whereRoleIs(getAllRoleFungsional())->latest()->get();
        $atasanLangsungs = User::query()->withWhereHas('userPejabatStruktural', function ($query) {
            $query->where('kab_kota_id', auth()->user()->load('userProvKabKota')->userProvKabKota->kab_kota_id);
        })->where('status_akun', 1)->whereRoleIs('atasan_langsung')->get();
        $penilais = User::query()->withWhereHas('userPejabatStruktural', function ($query) {
            $query->where('kab_kota_id', auth()->user()->load('userProvKabKota')->userProvKabKota->kab_kota_id);
        })->where('status_akun', 1)->whereRoleIs('penilai_ak')->get();
        $penetaps = User::query()->withWhereHas('userPejabatStruktural', function ($query) {
            $query->where('kab_kota_id', auth()->user()->load('userProvKabKota')->userProvKabKota->kab_kota_id);
        })->where('status_akun', 1)->whereRoleIs('penetap_ak')->get();
        $penilai = PenilaiAngkaKredit::query()->with('penilaiAK.userPejabatStruktural')->where('kab_kota_id', auth()->user()->load('userProvKabKota')->userProvKabKota->kab_kota_id)->first()?->penilaiAK?->userPejabatStruktural;
        $penetap = PenetapAngkaKredit::query()->with('penetapAK.userPejabatStruktural')->where('kab_kota_id', auth()->user()->load('userProvKabKota')->userProvKabKota->kab_kota_id)->first()?->penetapAK?->userPejabatStruktural;
        return $dataTable->render('kabkota.mente.index', compact('fungsionals', 'atasanLangsungs', 'penilais', 'penetaps', 'penilai', 'penetap', 'periode', 'judul'));
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
            throw ValidationException::withMessages(['Data tidak ditemukan']);
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
