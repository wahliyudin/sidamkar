<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

use App\DataTables\KabKota\ManajemenUser\StrukturalDataTable;
use App\Exports\KabKota\UserPejabatStrukturalExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\RejectRequest;
use App\Http\Requests\VerifStrukturalRequest;
use App\Models\Provinsi;
use App\Models\User;
use App\Services\KabKota\StrukturalService;
use Illuminate\Http\Request;
use App\Models\KabKota;
use App\Models\PangkatGolonganTmt;
use App\Traits\AuthTrait;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\KabProvPenilaiAndPenetap;

class StrukturalController extends Controller
{
    use AuthTrait;

    private StrukturalService $strukturalService;

    public function __construct(StrukturalService $strukturalService)
    {
        $this->strukturalService = $strukturalService;
    }

    public function index(StrukturalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.manajemen-user.struktural.index');
    }

    public function reject(RejectRequest $request, $id)
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
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()->get();

        return view('kabkota.manajemen-user.struktural.show', compact('user', 'provinsis', 'kab_kota', 'pangkats', 'kabProvPenilaiAndPenetap', 'judul'));
    }

    public function export(Request $request)
    {
        $kab_kota_id = $this->authUser()->load(['userProvKabKota'])?->userProvKabKota?->kab_kota_id;
        return Excel::download(new UserPejabatStrukturalExport($kab_kota_id, $request->status), 'pejabat-struktural.xlsx');
    }
}
