<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\DataTables\Kemendagri\CMS\PeriodeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Rules\PeriodeRule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index(PeriodeDataTable $dataTable)
    {   
        $judul = 'CMS Periode';
        $periode = Periode::query()->where('is_active', true)->first();
        return $dataTable->render('kemendagri.cms.periode.index', compact('periode', 'judul'));
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
}
