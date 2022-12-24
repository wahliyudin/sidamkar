<?php

namespace App\Services;

use App\Models\KetentuanNilai;
use App\Models\PenetapanAngkaKredit;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;

class PenetapanService
{
    protected $total;
    protected $statusKenaikanPangkat;
    protected $kelebihanKekuranganPangkat;
    protected $statusKenaikanJenjang;
    protected $kelebihanKekuranganJenjang;
    protected array $result;
    protected RekapitulasiKegiatan $rekapitulasiKegiatan;
    protected KetentuanNilai $ketentuanNilai;
    protected PenetapanAngkaKredit $penetapanAngkaKredit;

    public function __construct(User $user, RekapitulasiKegiatan $rekapitulasiKegiatan, KetentuanNilai $ketentuanNilai, PenetapanAngkaKredit $penetapanAngkaKredit)
    {
        $this->rekapitulasiKegiatan = $rekapitulasiKegiatan;
        $this->ketentuanNilai = $ketentuanNilai;
        $this->penetapanAngkaKredit = $penetapanAngkaKredit;
        $this->user = $user;
    }

    public function process()
    {
        $this->logicTotal();
        $this->akDasarAtauKelebihan();
        $this->akPengalaman();
        $this->processKenaikanPangkat();
        $this->processKenaikanJenjang();
        $this->processPengembangProfesi();
        return $this;
    }

    public function logicTotal()
    {
        $akJabatan = $this->akJabatan($this->rekapitulasiKegiatan);
        $total = $akJabatan;
        if ($total < $this->ketentuanNilai->ak_max) {
            // masih kurang dari 150% ak_min
            $akProfesi = $this->akProfesi($this->rekapitulasiKegiatan);
            $total += $akProfesi;
            if ($total < $this->ketentuanNilai->ak_max) {
                // masih kurang dari 150% ak_min
                $akPenunjang = $this->akPenunjang($this->rekapitulasiKegiatan);
                $total += $akPenunjang;
                if ($total < $this->ketentuanNilai->ak_max) {
                    // masih kurang dari 150% ak_min
                    $this->results['total'] = $total;
                    $this->results['jabatan'] = $akJabatan;
                    $this->results['profesi'] = $akProfesi;
                    $this->results['penunjang'] = $akPenunjang;
                } else {
                    // memenuhi
                    $this->results['total'] = $total;
                    $this->results['jabatan'] = $akJabatan;
                    $this->results['profesi'] = $akProfesi;
                    $this->results['penunjang'] = $akPenunjang;
                }
            } else {
                // memenuhi
                $this->results['total'] = $total;
                $this->results['jabatan'] = $akJabatan;
                $this->results['profesi'] = $akProfesi;
            }
        } else {
            // memenuhi
            $this->results['total'] = $total;
            $this->results['jabatan'] = $akJabatan;
        }
        $this->total = $this->result['total'];
    }

    public function akDasarAtauKelebihan()
    {
        if ($this->user->userAparatur->expired_mekanisme) {
            $this->result['akDasarAtauKelebihan'] = $this->penetapanAngkaKredit->ak_kelebihan;
        }
        $this->result['akDasarAtauKelebihan'] = $this->user->userAparatur->angka_mekanisme;
    }

    public function akPengalaman()
    {
        // ambil dari inputan (optional)
        $this->result['akPengalaman'] = $this->penetapanAngkaKredit->ak_pengalaman;
    }

    public function akJabatan(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        // ambil ak jabatan dari rekap
        return $rekapitulasiKegiatan->total_capaian;
    }

    public function akProfesi(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->jml_ak_profesi;
    }

    public function akPenunjang(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->jml_ak_penunjang;
    }

    public function processKenaikanPangkat()
    {
        // pangkat => ak_kp - total - total_sebelumnya
        $akKP = $this->ketentuanNilai->ak_kp;
        $total = $akKP - $this->total - 0;
        if ($total < 0) {
            $this->result['statusKenaikanPangkat'] = true;
        } else {
            $this->result['statusKenaikanPangkat'] = false;
        }
        $this->result['kelebihanKekuranganPangkat'] = $total;
    }

    public function processKenaikanJenjang()
    {
        // jenjang => ak_kj - total - total_sebelumnya - ak_dasar
        $akKJ = $this->ketentuanNilai->akk_kj;
        $akDasar = $this->ketentuanNilai->ak_dasar;
        $total = $akKJ - $this->total - 0 - $akDasar;
        if ($total < 0) {
            $this->result['statusKenaikanJenjang'] = true;
        } else {
            $this->result['statusKenaikanJenjang'] = false;
        }
        $this->result['kelebihanKekuranganJenjang'] = $total;
    }

    public function processPengembangProfesi()
    {
    }

    public function getResult()
    {
        return $this->result;
    }
}