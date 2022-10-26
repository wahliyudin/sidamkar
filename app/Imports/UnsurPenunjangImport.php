<?php

namespace App\Imports;

use App\Models\ButirKegiatan;
use App\Models\Role;
use App\Models\SubUnsur;
use App\Models\Unsur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnsurPenunjangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (isset($row['unsur']) && isset($row['sub_unsur']) && isset($row['butir_kegiatan'])) {
            $unsur = $this->createUnsur($row);
            $subUnsur = $this->createSubUnsur($row, $unsur);
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (!isset($row['butir_kegiatan']) && isset($row['sub_butir_kegiatan'])) {
            $butirKegiatan = ButirKegiatan::query()->orderBy('id', 'desc')->first();
            $this->createSubButirKegiatan($row, $butirKegiatan);
        }
        if (isset($row['butir_kegiatan']) && !isset($row['sub_butir_kegiatan']) && isset($row['satuan_hasil'])) {
            $subUnsur = SubUnsur::query()->orderBy('id', 'desc')->first();
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (isset($row['butir_kegiatan']) && !isset($row['sub_butir_kegiatan']) && !isset($row['satuan_hasil'])) {
            $subUnsur = SubUnsur::query()->orderBy('id', 'desc')->first();
            $this->createButirKegiatan($row, $subUnsur);
        }
    }

    public function createUnsur(array $row)
    {
        return Unsur::query()->create([
            'jenis_kegiatan_id' => 2,
            'nama' => $row['unsur']
        ]);
    }

    public function createSubUnsur(array $row, Unsur $unsur)
    {
        return $unsur->subUnsurs()->create([
            'nama' => $row['sub_unsur']
        ]);
    }

    public function createButirKegiatan(array $row, SubUnsur $subUnsur)
    {
        $str = (string) str((string) $row['angka_kredit'])->replace(',', '.');
        return $subUnsur->butirKegiatans()->create([
            'nama' => $row['butir_kegiatan'],
            'satuan_hasil' => $row['satuan_hasil'] ?? null,
            'score' => (float) $str ?? null
        ]);
    }

    public function createSubButirKegiatan(array $row, ButirKegiatan $butirKegiatan)
    {
        $angka_kredit = str($this->resetNewLine($row['angka_kredit']))->lower();
        if ($angka_kredit->contains('ak kenaikan pangkat') || $angka_kredit->contains('%')) {
            array_merge($row, ['percent' => $angka_kredit->replace(['%', 'ak kenaikan pangkat'], '')]);
        }
        return $butirKegiatan->subButirKegiatans()->create([
            'nama' => $row['sub_butir_kegiatan'],
            'satuan_hasil' => $row['satuan_hasil'],
            'score' => (float)$row['angka_kredit'] ?? null,
            'percent' => isset($row['percent']) ? (int)$row['percent'] : null
        ]);
    }

    public function resetNewLine(string $str)
    {
        return trim(preg_replace('/\s\s+/', ' ', $str));
    }
}
