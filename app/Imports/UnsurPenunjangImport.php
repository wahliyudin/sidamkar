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
        if (isset($row['unsur']) && isset($row['sub_unsur']) && isset($row['butir_kegiatan']) && !isset($row['satuan_hasil'])) {
            $unsur = $this->createUnsur($row);
            $subUnsur = $this->createSubUnsur($row, $unsur);
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (isset($row['unsur']) && isset($row['sub_unsur']) && isset($row['butir_kegiatan']) && isset($row['satuan_hasil'])) {
            $unsur = $this->createUnsur($row);
            $subUnsur = $this->createSubUnsur($row, $unsur);
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (!isset($row['unsur']) && isset($row['sub_unsur']) && isset($row['butir_kegiatan']) && !isset($row['satuan_hasil'])) {
            $unsur = Unsur::query()->orderBy('id', 'desc')->first();
            $subUnsur = $this->createSubUnsur($row, $unsur);
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (!isset($row['unsur']) && isset($row['sub_unsur']) && isset($row['butir_kegiatan']) && isset($row['satuan_hasil'])) {
            $unsur = Unsur::query()->orderBy('id', 'desc')->first();
            $subUnsur = $this->createSubUnsur($row, $unsur);
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (!isset($row['sub_unsur']) && isset($row['butir_kegiatan']) && !isset($row['sub_butir_kegiatan'])) {
            $subUnsur = SubUnsur::query()->orderBy('id', 'desc')->first();
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (!isset($row['sub_unsur']) && !isset($row['butir_kegiatan']) && isset($row['sub_butir_kegiatan'])) {
            $butirKegiatan = ButirKegiatan::query()->orderBy('id', 'desc')->first();
            $this->createSubButirKegiatan($row, $butirKegiatan);
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
            $row = array_merge($row, [
                'angka_kredit' => null,
                'percent' => (int)(string)$angka_kredit->replace(['%', 'ak kenaikan pangkat'], '')
            ]);
        }
        return $butirKegiatan->subButirKegiatans()->create([
            'nama' => $row['sub_butir_kegiatan'],
            'satuan_hasil' => $row['satuan_hasil'],
            'score' => isset($row['angka_kredit']) ? (float)$row['angka_kredit'] : null,
            'percent' => isset($row['percent']) ? (int)$row['percent'] : null
        ]);
    }

    public function resetNewLine(string $str)
    {
        return trim(preg_replace('/\s\s+/', ' ', $str));
    }
}
