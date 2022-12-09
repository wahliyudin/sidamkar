<?php

namespace App\Http\Controllers;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    private PeriodeRepository $periodeRepository;

    public function __construct(PeriodeRepository $periodeRepository)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
        return str('http://127.0.0.1:8000/storage/user-struktural/639217054cd06.jpeg')->replace(env('APP_URL')."/storage/user-struktural/", '');
        // $user = User::query()->with(['kabProvPenilais', 'userPejabatStruktural:id,user_id,tingkat_aparatur'])->where('username', 'Penilai AK')->first();
        // $kabKotas = $user->kabProvPenilais()->pluck('kab_kota_id')->toArray();
        // $jenisAparaturs = $user->kabProvPenilais()->pluck('jenis_aparatur')->toArray();
        // return User::query()
        //     ->where('status_akun', User::STATUS_ACTIVE)
        //     ->withWhereHas('userAparatur', function ($query) use ($user, $kabKotas) {
        //         $query->with(['kabKota'])->whereIn('kab_kota_id', $kabKotas)
        //             ->where('tingkat_aparatur', $user->userPejabatStruktural->tingkat_aparatur);
        //     })
        //     ->whereRoleIs($this->getRoles($jenisAparaturs))
        //     ->get();
    }

    public function getRoles($jenisAparaturs)
    {
        $roles = [];
        if (in_array('analis', $jenisAparaturs)) {
            $roles = array_merge($roles, getAllRoleFungsionalAnalis());
        }
        if (in_array('damkar', $jenisAparaturs)) {
            $roles = array_merge($roles, getAllRoleFungsionalDamkar());
        }
        return $roles;
    }
}