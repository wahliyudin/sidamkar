<?php

namespace App\Http\Controllers\PenetapAK\DataPengajuan;

use App\Http\Controllers\Controller;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\PenetapAK\DataPengajuan\InternalService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
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
        $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
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
}