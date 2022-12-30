<?php

namespace App\Http\Controllers\Provinsi\ManajemenUser;

use App\DataTables\Provinsi\ManajemenUser\StrukturalDataTable;
use App\Exports\Provinsi\UserPejabatStrukturalExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerifStrukturalRequest;
use App\Services\Provinsi\StrukturalService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\PangkatGolonganTmt;
use Maatwebsite\Excel\Facades\Excel;

class StrukturalController extends Controller
{
    private StrukturalService $strukturalService;

    public function __construct(StrukturalService $strukturalService)
    {
        $this->strukturalService = $strukturalService;
    }

    public function index(StrukturalDataTable $dataTable)
    {
        return $dataTable->render('provinsi.manajemen-user.struktural.index');
    }


    public function reject(Request $request, $id)
    {
        $this->strukturalService->reject($request, $id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function verification(VerifStrukturalRequest $requset, $id)
    {
        $this->strukturalService->verificationStruktural($requset, $id);
        return response()->json([
            'success' => 200,
            'message' => "Akun Berhasil DIVERIFIKASI",
        ]);
    }

    public function destroy($id)
    {
        $this->strukturalService->destroy($id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil dihapus",
        ]);
    }

    public function show($id)
    {
        $judul = 'Data Struktural';
        $user = User::query()->with(['userPejabatStruktural.provinsi.kabkotas', 'roles', 'dokKepegawaians', 'dokKompetensis'])->find($id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->get();
        return view('kabkota.manajemen-user.struktural.show', compact('user', 'provinsis', 'kab_kota', 'pangkats', 'judul'));
    }

    public function export(Request $request)
    {
        $provinsi_id = $this->authUser()->load(['userProvKabKota'])?->userProvKabKota?->provinsi_id;
        return Excel::download(new UserPejabatStrukturalExport($provinsi_id, $request->status), 'pejabat-struktural.xlsx');
    }
}