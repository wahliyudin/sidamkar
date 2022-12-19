<?php

namespace App\Repositories;

use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;

class RekapitulasiKegiatanRepository
{
    private RekapitulasiKegiatan $rekapitulasiKegiatan;

    public function __construct(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        $this->rekapitulasiKegiatan = $rekapitulasiKegiatan;
    }

    public function getRekapByFungsionalAndPeriode(User $user, Periode $periode)
    {
        return $this->rekapitulasiKegiatan->query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode->id)->first();
    }

    public function sendToAtasanLangsung(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->update(['is_send' => RekapitulasiKegiatan::IS_SEND_KE_ATASAN_LANGSUNG]);
    }

    public function sendToPenilai(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->update(['is_send' => RekapitulasiKegiatan::IS_SEND_KE_PENILAI]);
    }

    public function sendToPenetap(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->update(['is_send' => RekapitulasiKegiatan::IS_SEND_KE_PENETAP]);
    }

    public function ttdAtasanLangsung(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->update(['is_ttd_atasan_langsung' => true]);
    }

    public function ttdPenilai(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->update(['is_ttd_penilai' => true]);
    }

    public function ttdPenetap(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        return $rekapitulasiKegiatan->update(['is_ttd_penetap' => true]);
    }

    public function store(
        $user_id,
        $periode_id,
        $link_pernyataan,
        $name_pernyataan,
        $link_rekap_capaian,
        $name_rekap_capaian,
        $total_capaian,
        $link_pengembang,
        $name_pengembang,
        $jml_ak_profesi,
        $jml_ak_penunjang,
        $link_penilaian_capaian,
        $name_penilaian_capaian,
        $capaian_ak,
        $link_penetapan,
        $name_penetapan
    ): RekapitulasiKegiatan {
        return $this->rekapitulasiKegiatan->query()->create([
            'fungsional_id' => $user_id,
            'periode_id' => $periode_id,
            'link_pernyataan' => $link_pernyataan,
            'name_pernyataan' => $name_pernyataan,
            'link_rekap_capaian' => $link_rekap_capaian,
            'name_rekap_capaian' => $name_rekap_capaian,
            'total_capaian' => $total_capaian,
            'link_pengembang' => $link_pengembang,
            'name_pengembang' => $name_pengembang,
            'jml_ak_profesi' => $jml_ak_profesi,
            'jml_ak_penunjang' => $jml_ak_penunjang,
            'link_penilaian_capaian' => $link_penilaian_capaian,
            'name_penilaian_capaian' => $name_penilaian_capaian,
            'capaian_ak' => $capaian_ak,
            'link_penetapan' => $link_penetapan,
            'name_penetapan' => $name_penetapan
        ]);
    }

    public function update(
        RekapitulasiKegiatan $rekapitulasiKegiatan,
        $link_pernyataan,
        $name_pernyataan,
        $link_rekap_capaian,
        $name_rekap_capaian,
        $total_capaian,
        $link_pengembang,
        $name_pengembang,
        $jml_ak_profesi,
        $jml_ak_penunjang,
        $link_penilaian_capaian,
        $name_penilaian_capaian,
        $capaian_ak,
        $link_penetapan,
        $name_penetapan
    ) {
        $data = [];
        if (!is_null($link_pernyataan) && !is_null($name_pernyataan)) {
            deleteImage($rekapitulasiKegiatan->link_pernyataan);
            $data['link_pernyataan'] = $link_pernyataan;
            $data['name_pernyataan'] = $name_pernyataan;
        }
        if (!is_null($link_rekap_capaian) && !is_null($name_rekap_capaian)) {
            deleteImage($rekapitulasiKegiatan->link_rekap_capaian);
            $data['link_rekap_capaian'] = $link_rekap_capaian;
            $data['name_rekap_capaian'] = $name_rekap_capaian;
            $data['total_capaian'] = $total_capaian;
        }
        if (!is_null($link_pengembang) && !is_null($name_pengembang)) {
            deleteImage($rekapitulasiKegiatan->link_pengembang);
            $data['link_pengembang'] = $link_pengembang;
            $data['name_pengembang'] = $name_pengembang;
            $data['jml_ak_profesi'] = $jml_ak_profesi;
            $data['jml_ak_penunjang'] = $jml_ak_penunjang;
        }
        if (!is_null($link_penilaian_capaian) && !is_null($name_penilaian_capaian)) {
            deleteImage($rekapitulasiKegiatan->link_penilaian_capaian);
            $data['link_penilaian_capaian'] = $link_penilaian_capaian;
            $data['name_penilaian_capaian'] = $name_penilaian_capaian;
            $data['capaian_ak'] = $capaian_ak;
        }
        if (!is_null($link_penetapan) && !is_null($name_penetapan)) {
            deleteImage($rekapitulasiKegiatan->link_penetapan);
            $data['link_penetapan'] = $link_penetapan;
            $data['name_penetapan'] = $name_penetapan;
        }
        return $rekapitulasiKegiatan->update($data);
    }
}