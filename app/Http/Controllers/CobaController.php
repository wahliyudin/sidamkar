<?php

namespace App\Http\Controllers;

use App\Facades\Repositories\RekapitulasiKegiatanFacade;
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
        return DB::select('SELECT
                user_aparaturs.nama,
                roles.display_name,
                user_aparaturs.nip,
                pangkat_golongan_tmts.nama AS golongan
            FROM users
                JOIN kab_prov_penilai_and_penetaps
                    ON (
                        kab_prov_penilai_and_penetaps.penilai_ak_analis_id = "97f7b5b2-7e9e-4cb7-a961-051ed8718bd2"
                        OR kab_prov_penilai_and_penetaps.penilai_ak_damkar_id = "97f7b5b2-7e9e-4cb7-a961-051ed8718bd2"
                        )
            JOIN user_aparaturs ON user_aparaturs.user_id = users.id
            JOIN role_user ON role_user.user_id = users.id
            JOIN roles ON role_user.role_id = roles.id
            LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
            WHERE user_aparaturs.kab_kota_id = 1101
                AND users.status_akun = 1
                AND roles.id IN (1,2,3,4,5,6,7)
                AND user_aparaturs.tingkat_aparatur = "kab_kota"
                ORDER BY roles.display_name ASC');
    }
}
