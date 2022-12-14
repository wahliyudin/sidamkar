<?php

namespace App\Http\Controllers;

use App\Facades\Repositories\RekapitulasiKegiatanFacade;
use App\Models\CrossPenilaiAndPenetap;
use App\Models\JenisKegiatan;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Role;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use App\Traits\ScoringTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait, DataTableTrait;

    private PeriodeRepository $periodeRepository;

    public function __construct(PeriodeRepository $periodeRepository)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
        $periode = $this->periodeRepository->isActive();
        $role = Role::query()->find(6);
        return Unsur::query()
            ->where('jenis_kegiatan_id', 2)
            ->where('periode_id', $periode->id)
            ->withWhereHas('subUnsurs', function ($query) use ($role) {
                $query->withWhereHas('butirKegiatans', function ($query) use ($role) {
                    $query->with('role', function ($query) use ($role) {
                        $query->whereIn('id', $this->limiRole($role->id));
                    });
                });
            })
            ->get();
    }
}