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
        $periode = $this->periodeRepository->isActive();
        $user = User::query()->with(['roles',
        'userAparatur.pangkatGolonganTmt'])->find('97e7d44b-df87-4033-9eb0-ab7724d6fc56');
        $atasan_langsung = User::query()->whereRoleIs('atasan_langsung')->with(['userPejabatStruktural' => function($query) use ($user){
            $query->with('pangkatGolonganTmt')->where('kab_kota_id', $user->userAparatur->kab_kota_id);
        }])->first();
        $rencanas = Rencana::query()
            ->where('user_id', $user->id)
            ->withWhereHas('laporanKegiatanJabatans', function ($query) {
                $query->where('status', LaporanKegiatanJabatan::SELESAI)->with('butirKegiatan.subUnsur.unsur');
            })
            ->get()->map(function (Rencana $rencana) use ($user) {
                $sesuai_jenjang = [];
                $jenjang_bawah = [];
                $jenjang_atas = [];
                foreach ($rencana->laporanKegiatanJabatans as $laporan) {
                    if ($laporan->butirKegiatan->subUnsur->unsur->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id) {
                        array_push($sesuai_jenjang, $laporan);
                    } elseif ($laporan->butirKegiatan->subUnsur->unsur->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id + 1) {
                        array_push($jenjang_atas, $laporan);
                    } elseif ($laporan->butirKegiatan->subUnsur->unsur->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id - 1) {
                        array_push($jenjang_bawah, $laporan);
                    }
                }
                $rencana->jenjang_bawah = $this->current($jenjang_bawah);
                $rencana->sesuai_jenjang = $this->current($sesuai_jenjang);
                $rencana->jenjang_atas = $this->current($jenjang_atas);
                unset($rencana->laporanKegiatanJabatans);
                return $rencana;
            });
        $pdf_rekap = PDF::loadView('generate-pdf.rekapitulasi-capaian', compact('rencanas', 'user', 'atasan_langsung', 'periode'))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return response()->file("storage/rekapitulasi/$file_name.pdf");
    }

    private function current($data)
    {
        $sum = 0;
        $count = 0;
        $tmp = isset($data[0]) ? $data[0] : null;
        $current = [];
        for ($i = 0; $i < count($data); $i++) {
            $sum += $data[$i]->score;
            $count++;
            if ($tmp?->butir_kegiatan_id == $data[$i]->butir_kegiatan_id && count($data) - 1 == $i) {
                unset($data[$i]->butirKegiatan->subUnsur);
                array_push($current, [
                    'jumlah_ak' => $sum,
                    'volume' => $count,
                    'butir_kegiatan' => $data[$i]->butirKegiatan
                ]);
                $sum = 0;
                $count = 0;
            }
            $tmp = $data[$i];
        }
        return $current;
    }
}