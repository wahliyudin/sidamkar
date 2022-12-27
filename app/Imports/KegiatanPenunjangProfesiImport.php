<?php

namespace App\Imports;

use App\Models\ButirKegiatan;
use App\Models\JenisKegiatan;
use App\Models\SubButirKegiatan;
use App\Models\SubUnsur;
use App\Models\Unsur;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KegiatanPenunjangProfesiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (isset($row['unsur_id']) && isset($row['unsur'])) {
            $this->updateUnsur($row['unsur_id'], $row['unsur']);
        } elseif (!isset($row['unsur_id']) && isset($row['unsur'])) {
            $this->storeUnsur($row['unsur']);
        }
        if (isset($row['sub_unsur_id']) && isset($row['sub_unsur'])) {
            $this->updateSubUnsur($row['sub_unsur_id'], $row['sub_unsur']);
        } elseif (!isset($row['sub_unsur_id']) && isset($row['sub_unsur'])) {
            $this->storeSubUnsur($row['sub_unsur']);
        }
        if (isset($row['butir_kegiatan_id']) && isset($row['butir_kegiatan']) && isset($row['satuan_hasil'])) {
            $this->updateButirKegiatan($row['butir_kegiatan_id'], $row['jabatan_id'], $row['butir_kegiatan'], $row['satuan_hasil'], $row['angka_kredit'] ?? null, $row['angka_kredit_persen'] ?? null);
        } elseif (!isset($row['butir_kegiatan_id']) && isset($row['butir_kegiatan']) && isset($row['satuan_hasil'])) {
            $this->storeButirKegiatan($row['jabatan_id'], $row['butir_kegiatan'], $row['satuan_hasil'], $row['angka_kredit'] ?? null, $row['angka_kredit_persen'] ?? null);
        } elseif (!isset($row['butir_kegiatan_id']) && isset($row['butir_kegiatan']) && !isset($row['satuan_hasil'])) {
            $this->storeButirKegiatan($row['jabatan_id'] ?? null, $row['butir_kegiatan'], $row['satuan_hasil'] ?? null, null, null);
        }
        if (isset($row['sub_butir_kegiatan_id']) && isset($row['sub_butir_kegiatan'])) {
            $this->updateSubButirKegiatan($row['sub_butir_kegiatan_id'], $row['jabatan_id_sub_butir_kegiatan'] ?? null, $row['sub_butir_kegiatan'], $row['satuan_hasil_sub_butir_kegiatan'], $row['angka_kredit_sub_butir_kegiatan'] ?? null, $row['angka_kredit_persen_sub_butir_kegiatan'] ?? null);
        } elseif (!isset($row['sub_butir_kegiatan_id']) && isset($row['sub_butir_kegiatan'])) {
            $this->storeSubButirKegiatan($row['jabatan_id_sub_butir_kegiatan'] ?? null, $row['sub_butir_kegiatan'], $row['satuan_hasil_sub_butir_kegiatan'], $row['angka_kredit_sub_butir_kegiatan'] ?? null, $row['angka_kredit_persen_sub_butir_kegiatan'] ?? null);
        }
    }

    public function updateUnsur($id, $nama)
    {
        Unsur::query()->where('id', $id)->first()?->update([
            'nama' => $nama
        ]);
    }

    public function storeUnsur($nama)
    {
        Unsur::query()->create([
            'jenis_kegiatan_id' => JenisKegiatan::JENIS_KEGIATAN_JABATAN,
            'nama' => $nama
        ]);
    }

    public function updateSubUnsur($id, $nama)
    {
        SubUnsur::query()->where('id', $id)->first()?->update([
            'nama' => $nama
        ]);
    }

    public function storeSubUnsur($nama)
    {
        Unsur::query()->get()->last()->subUnsurs()->create([
            'nama' => $nama
        ]);
    }

    public function updateButirKegiatan($id, $jabatan, $nama, $satuan_hasil, $score, $percent)
    {
        ButirKegiatan::query()->where('id', $id)->first()?->update([
            'role_id' => $jabatan,
            'nama' => $nama,
            'satuan_hasil' => $satuan_hasil,
            'score' => $score,
            'percent' => $percent
        ]);
    }

    public function storeButirKegiatan($jabatan, $nama, $satuan_hasil, $score, $percent)
    {
        SubUnsur::query()->get()->last()?->butirKegiatans()->create([
            'role_id' => $jabatan,
            'nama' => $nama,
            'satuan_hasil' => $satuan_hasil,
            'score' => $score,
            'percent' => $percent
        ]);
    }

    public function updateSubButirKegiatan($id, $jabatan, $nama, $satuan_hasil, $score, $percent)
    {
        SubButirKegiatan::query()->where('id', $id)->first()?->update([
            'role_id' => $jabatan,
            'nama' => $nama,
            'satuan_hasil' => $satuan_hasil,
            'score' => $score,
            'percent' => $percent
        ]);
    }

    public function storeSubButirKegiatan($jabatan, $nama, $satuan_hasil, $score, $percent)
    {
        ButirKegiatan::query()->get()->last()?->subButirKegiatans()->create([
            'role_id' => $jabatan,
            'nama' => $nama,
            'satuan_hasil' => $satuan_hasil,
            'score' => $score,
            'percent' => $percent
        ]);
    }
}