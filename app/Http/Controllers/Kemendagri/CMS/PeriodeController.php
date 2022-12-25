<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\DataTables\Kemendagri\CMS\PeriodeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Rules\PeriodeRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PeriodeController extends Controller
{
    public function index(PeriodeDataTable $dataTable)
    {
        $judul = 'CMS Periode';
        $periode = Periode::query()->where('is_active', true)->first();
        $periodeLast = Periode::query()->get()->last();
        return $dataTable->render('kemendagri.cms.periode.index', compact('periode', 'periodeLast', 'judul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'awal' => ['required', new PeriodeRule()],
            'akhir' => ['required', new PeriodeRule()],
        ]);
        Periode::query()->create([
            'awal' => Carbon::make($request->awal)->format('Y-m-d'),
            'akhir' => Carbon::make($request->akhir)->format('Y-m-d'),
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil disimpan'
        ]);
    }

    public function switch(Request $request, $id)
    {
        $request->validate([
            'is_active' => 'required'
        ]);
        $periode = Periode::query()->find($id);
        if (!$periode) {
            throw ValidationException::withMessages(['Data tidak ditemukan']);
        }
        if ($request->is_active == 'true') {
            $periode->update(['is_active' => true]);
            $this->updateNotIn($id);
        } else {
            $periode->update(['is_active' => false]);
        }
        return response()->json([
            'message' => "Berhasil diubah"
        ]);
    }

    public function updateNotIn($id)
    {
        return Periode::query()->whereNotIn('id', [$id])->update(['is_active' => false]);
    }
}