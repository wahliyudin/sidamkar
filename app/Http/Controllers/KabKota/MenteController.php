<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\MenteDataTable;
use App\Http\Controllers\Controller;
use App\Models\Mente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MenteController extends Controller
{
    public function index(MenteDataTable $dataTable)
    {
        $mentes = Mente::query()->pluck('fungsional_id')->toArray();
        $fungsionals = User::query()->whereHas('userAparatur', function ($query) {
            $query->where('kab_kota_id', Auth::user()->userProvKabKota->kab_kota_id);
        })->where('status_akun', 1)->whereNotIn('id', $mentes)->whereRoleIs(getAllRoleFungsional())->latest()->get();
        $atasanLangsungs = User::query()->whereHas('userPejabatStruktural', function ($query) {
            $query->where('kab_kota_id', Auth::user()->userProvKabKota->kab_kota_id);
        })->where('status_akun', 1)->whereDoesntHave('mentes')->whereRoleIs('atasan_langsung')->get();
        return $dataTable->render('kabkota.mente.index', compact('fungsionals', 'atasanLangsungs'));
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
        return view('kabkota.mente.show');
    }

    public function edit($id)
    {
        $mentes = Mente::query()->whereNot('atasan_langsung_id', $id)->pluck('fungsional_id')->toArray();
        $mentesTrue = Mente::query()->where('atasan_langsung_id', $id)->pluck('fungsional_id')->toArray();
        $fungsionals = User::query()->withWhereHas('userAparatur', function ($query) {
                $query->where('kab_kota_id', Auth::user()->userProvKabKota->kab_kota_id);
            })
            ->where('status_akun', 1)
            ->whereNotIn('id', $mentes)
            ->whereRoleIs(getAllRoleFungsional())
            ->latest()
            ->get()
            ->map(function (User $user) use ($mentesTrue) {
                $user->isChecked = in_array($user->id, $mentesTrue);
                return $user;
            });
        return response()->json([
            'data' => $fungsionals
        ]);
    }

    public function update(Request $request, $id)
    {
        $atasanLangsung = User::query()->where('status_akun', 1)->withWhereHas('mentes')->whereRoleIs('atasan_langsung')->find($id);
        if (!isset($request->fungsionals)) {
            $atasanLangsung->mentes()->delete();
        } else {
            $fungsionals = $atasanLangsung->mentes()->pluck('fungsional_id')->toArray();
            $comingFungsionals = $request->fungsionals;
            $createds = [];
            for ($i=0; $i < count($comingFungsionals); $i++) {
                if (!in_array($comingFungsionals[$i], $fungsionals)) {
                    array_push($createds, [
                        'fungsional_id' => $comingFungsionals[$i]
                    ]);
                }
            }
            for ($i=0; $i < count($fungsionals); $i++) {
                if (!in_array($fungsionals[$i], $comingFungsionals)) {
                    $atasanLangsung->mentes()->where('fungsional_id',$fungsionals[$i])->first()->delete();
                }
            }
            $atasanLangsung->mentes()->createMany($createds);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diubah'
        ]);
    }
}
