<?php

namespace App\Imports;

use App\Models\ButirKegiatan;
use App\Models\JenisKegiatan;
use App\Models\SubUnsur;
use App\Models\Unsur;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KegiatanJabatanImport implements ToModel, WithHeadingRow
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
        if (isset($row['butir_kegiatan_id']) && isset($row['butir_kegiatan'])) {
            if (!isset($row['jabatan_id'])) {
                throw ValidationException::withMessages(['Jabatan ID Wajib Diisi']);
            }
            if (!isset($row['satuan_hasil'])) {
                throw ValidationException::withMessages(['Satuan Hasil Wajib Diisi']);
            }
            if (!isset($row['angka_kredit']) && !isset($row['angka_kredit_persen'])) {
                throw ValidationException::withMessages(['Isi Salah Satu Dari Angka Kredit Atau Angka Kredit Persen (%)']);
            }
            $this->updateButirKegiatan($row['butir_kegiatan_id'], $row['jabatan_id'], $row['butir_kegiatan'], $row['satuan_hasil'], $row['angka_kredit'] ?? null, $row['angka_kredit_persen'] ?? null);
        } elseif (!isset($row['butir_kegiatan_id']) && isset($row['butir_kegiatan'])) {
            if (!isset($row['jabatan_id'])) {
                throw ValidationException::withMessages(['Jabatan ID Wajib Diisi']);
            }
            if (!isset($row['satuan_hasil'])) {
                throw ValidationException::withMessages(['Satuan Hasil Wajib Diisi']);
            }
            if (!isset($row['angka_kredit']) && !isset($row['angka_kredit_persen'])) {
                throw ValidationException::withMessages(['Isi Salah Satu Dari Angka Kredit Atau Angka Kredit Persen (%)']);
            }
            $this->storeButirKegiatan($row['jabatan_id'], $row['butir_kegiatan'], $row['satuan_hasil'], $row['angka_kredit'] ?? null, $row['angka_kredit_persen'] ?? null);
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
}