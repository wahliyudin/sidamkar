<?php

namespace App\Http\Controllers\PenetapAK\DataPengajuan;

use App\Http\Controllers\Controller;
use App\Models\PenetapanAngkaKredit;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\PenetapAK\DataPengajuan\InternalService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class InternalController extends Controller
{
    use AuthTrait;

    protected InternalService $internalService;
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    protected PeriodeRepository $periodeRepository;
    protected UserRepository $userRepository;

    public function __construct(InternalService $internalService, UserRepository $userRepository, PeriodeRepository $periodeRepository, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository)
    {
        $this->internalService = $internalService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->periodeRepository = $periodeRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('penetap-ak.data-pengajuan.internal.index');
    }

    public function show($id)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($id)->load('userAparatur');
        $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode->id);
        return view('penetap-ak.data-pengajuan.internal.show', compact('user', 'rekapitulasiKegiatan'));
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            // $role_order = 'DESC';
            // if (isset($request->order) && $request->order[0]['column'] == 2) {
            //     $role_order =  $request->order[0]['dir'];
            // }
            $user = $this->authUser()->load(['userPejabatStruktural', 'roles']);
            $data = $this->internalService->getUsers($user);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('penetap-ak.data-pengajuan.internal.show', $row->id) . '" class="btn btn-blue btn-sm">Detail</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function ttd(Request $request, $id)
    {
        $request->validate([
            'no_penetapan' => 'required',
            'nama_penetap' => 'required',
        ], [
            'no_penetapan.required' => 'Nomor Surat Penetapan Wajib Diisi',
            'nama_penetap.required' => 'Nama Yang Menetapkan Wajib Diisi',
        ]);
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($id)->load(['userAparatur.pangkatGolonganTmt']);
        $penetapAk = $this->authUser()->load(['userPejabatStruktural']);
        if ($penetapAk->userPejabatStruktural->tingkat_aparatur == 'provinsi') {
            $email = User::query()->withWhereHas('userProvKabKota', function ($query) use ($penetapAk) {
                $query->where('provinsi_id', $penetapAk->userPejabatStruktural->provinsi_id);
            })->first()?->userProvKabKota?->email_info_penetapan;
        } else {
            $email = User::query()->withWhereHas('userProvKabKota', function ($query) use ($penetapAk) {
                $query->where('kab_kota_id', $penetapAk->userPejabatStruktural->kab_kota_id);
            })->first()?->userProvKabKota?->email_info_penetapan;
        }
        if ($email == null || !$email) {
            throw ValidationException::withMessages(['Maaf, Email Info Penetapan Belum Ditentukan Oleh Admin Kab Kota / Provinsi']);
        }
        if (!isset($penetapAk?->userPejabatStruktural?->file_ttd)) {
            throw ValidationException::withMessages(['Maaf, Anda Belum Melengkapi Profil']);
        }
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode->id);
        $this->internalService->ttdRekapitulasi($rekap, $user, $periode, $penetapAk, $request->no_penetapan, $request->nama_penetap, $email);
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
}