<?php

namespace App\Modules\Dokumen;

use App\Models\KetentuanNilai;
use App\Models\PenetapanAngkaKredit;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;

class Penetapan
{
    protected $total;
    protected $statusKenaikanPangkat;
    protected $kelebihanKekuranganPangkat;
    protected $statusKenaikanJenjang;
    protected $kelebihanKekuranganJenjang;
    protected array $result = [];
    protected RekapitulasiKegiatan $rekapitulasiKegiatan;
    protected KetentuanNilai $ketentuanNilai;
    protected PenetapanAngkaKredit $penetapanAngkaKredit;
    protected $akLamaJabatan;

    public function __construct(User $user, RekapitulasiKegiatan $rekapitulasiKegiatan, KetentuanNilai $ketentuanNilai, PenetapanAngkaKredit $penetapanAngkaKredit, $akLamaJabatan)
    {
        $this->rekapitulasiKegiatan = $rekapitulasiKegiatan;
        $this->akLamaJabatan = $akLamaJabatan;
        $this->ketentuanNilai = $ketentuanNilai;
        $this->penetapanAngkaKredit = $penetapanAngkaKredit;
        $this->user = $user;
    }

    public function process()
    {
        $this->akJabatanOld();
        $this->logicTotal();
        $this->akDasarAtauKelebihan();
        $this->akPengalaman();
        $this->result['total'] = ($this->result['total'] - $this->result['akJabatanNew']) + (isset($this->result['akJabatanOld']) ? $this->result['akJabatanOld'] : 0) + $this->result['akPengalaman'] + $this->result['akDasarAtauKelebihan'];
        $this->total = $this->result['total'];
        $this->processKenaikanPangkat();
        $this->processKenaikanJenjang();
        $this->processPengembangProfesi();
        return $this;
    }

    public function logicTotal()
    {
        $results = [];
        $akJabatan = $this->akJabatan($this->rekapitulasiKegiatan) + (isset($this->result['akJabatanOld']) ? $this->result['akJabatanOld'] : 0);
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
                    $results['total'] = $total;
                    $results['jabatan'] = $akJabatan;
                    $results['profesi'] = $akProfesi;
                    $results['penunjang'] = $akPenunjang;
                } else {
                    // memenuhi
                    $results['total'] = $total;
                    $results['jabatan'] = $akJabatan;
                    $results['profesi'] = $akProfesi;
                    $results['penunjang'] = $akPenunjang;
                }
            } else {
                // memenuhi
                $results['total'] = $total;
                $results['jabatan'] = $akJabatan;
                $results['profesi'] = $akProfesi;
            }
        } else {
            // memenuhi
            $results['total'] = $total;
            $results['jabatan'] = $akJabatan;
        }
        $this->result = array_merge($this->result, $results);
    }

    public function akDasarAtauKelebihan()
    {
        $result = [];
        if ($this->user->userAparatur->expired_mekanisme || $this->user->userAparatur->status_mekanisme != 3) {
            $result['akDasarAtauKelebihan'] = $this->penetapanAngkaKredit->ak_kelebihan;
        } else {
            if ($this->user->userAparatur->status_mekanisme == 3) {
                $result['akDasarAtauKelebihan'] = $this->user->userAparatur->angka_mekanisme;
            } else {
                $result['akDasarAtauKelebihan'] = 0;
            }
        }
        $this->result = array_merge($this->result, $result);
    }

    public function akJabatanOld()
    {
        $this->result = array_merge($this->result, ['akJabatanOld' => $this->akLamaJabatan]);
    }

    public function akPengalaman()
    {
        // ambil dari inputan (optional)
        $this->result = array_merge($this->result, ['akPengalaman' => $this->penetapanAngkaKredit->ak_pengalaman]);
    }

    public function akJabatan(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        // ambil ak jabatan dari rekap
        $ak = $rekapitulasiKegiatan?->total_capaian ?? 0;
        $this->result['akJabatanNew'] = $ak;
        return $ak;
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
        $total = $akKP - $this->total - (isset($this->penetapanAngkaKreditOld?->total_ak_kumulatif) ? $this->penetapanAngkaKreditOld?->total_ak_kumulatif ?? 0 : 0);
        if ($akKP == 0) {
            $this->result = array_merge($this->result, ['statusKenaikanPangkat' => false]);
            $this->result = array_merge($this->result, ['kelebihanKekuranganPangkat' => 0]);
            $this->result = array_merge($this->result, ['angkaKenaikanPangkat' => 0]);
            $this->result = array_merge($this->result, ['statusKelebihanKekuranganPangkat' => false]);
        } else {
            if ($total < 0) {
                $this->result = array_merge($this->result, ['statusKenaikanPangkat' => true]);
            } else {
                $this->result = array_merge($this->result, ['statusKenaikanPangkat' => false]);
            }
            $this->result = array_merge($this->result, ['kelebihanKekuranganPangkat' => $total]);
            $this->result = array_merge($this->result, ['angkaKenaikanPangkat' => $akKP]);
            $this->result = array_merge($this->result, ['statusKelebihanKekuranganPangkat' => $akKP > 0]);
        }
    }

    public function processKenaikanJenjang()
    {
        // jenjang => ak_kj - total - total_sebelumnya - ak_dasar
        $akKJ = $this->ketentuanNilai->akk_kj;
        $akDasar = $this->ketentuanNilai->ak_dasar;
        $total = $akKJ - $this->total - (isset($this->penetapanAngkaKreditOld?->total_ak_kumulatif) ? $this->penetapanAngkaKreditOld->total_ak_kumulatif : 0) - $akDasar;
        if ($akKJ == 0) {
            $this->result = array_merge($this->result, ['statusKenaikanJenjang' => false]);
            $this->result = array_merge($this->result, ['kelebihanKekuranganJenjang' => 0]);
            $this->result = array_merge($this->result, ['angkaKenaikanJenjang' => 0]);
        } else {
            if ($total < 0) {
                $this->result = array_merge($this->result, ['statusKenaikanJenjang' => true]);
            } else {
                $this->result = array_merge($this->result, ['statusKenaikanJenjang' => false]);
            }
            $this->result = array_merge($this->result, ['kelebihanKekuranganJenjang' => $total]);
            $this->result = array_merge($this->result, ['angkaKenaikanJenjang' => $akKJ]);
        }
    }

    public function processPengembangProfesi()
    {
        $ak_bangprof = $this->ketentuanNilai->ak_bangprof;
        if ($ak_bangprof <= 0) {
            $this->result = array_merge($this->result, ['akPengembangProfesi' => 0]);
            $this->result = array_merge($this->result, ['kelebihanKekuranganProfesi' => 0]);
        } else {
            $this->result = array_merge($this->result, ['akPengembangProfesi' => $ak_bangprof]);
            $this->result = array_merge($this->result, ['kelebihanKekuranganProfesi' => $ak_bangprof - $this->result['profesi']]);
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}