<?php

namespace App\Http\Controllers\PenilaiAk\DataPengajuan;

use App\DataTables\PenilaiAk\DataPengajuan\InternalDataTable;
use App\Http\Controllers\Controller;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    private UserRepository $userRepository;
    private PeriodeRepository $periodeRepository;

    public function __construct(UserRepository $userRepository, PeriodeRepository $periodeRepository)
    {
        $this->userRepository = $userRepository;
        $this->periodeRepository = $periodeRepository;
    }

    public function index(InternalDataTable $dataTable)
    {
        return $dataTable->render('penilai-ak.data-pengajuan.internal.index');
    }

    public function show($id)
    {
        $periode = $this->periodeRepository->isActive();
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $id)
            ->where('periode_id', $periode->id)->first();
        $user = $this->userRepository->getUserById($id)->load('userAparatur');
        return view('penilai-ak.data-pengajuan.internal.show', compact('user', 'rekapitulasiKegiatan'));
    }
}