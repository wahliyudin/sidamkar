<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\MenteDataTable;
use App\Http\Controllers\Controller;
use App\Models\Mente;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MenteController extends Controller
{
    public function index(MenteDataTable $dataTable)
    {
        $mentes = Mente::query()->pluck('fungsional_id')->toArray();
        $fungsionals = User::query()->with('userAparatur')->whereNotIn('id', $mentes)->whereRoleIs(getAllRoleFungsional())->latest()->get();
        $atasanLangsungs = User::query()->with(['userPejabatStruktural', 'mentes'])->whereDoesntHave('mentes')->whereRoleIs('atasan_langsung')->get();
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
}
