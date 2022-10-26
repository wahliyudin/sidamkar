<?php

namespace App\Imports;

use App\Models\Role;
use App\Models\SubUnsur;
use App\Models\Unsur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnsursImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $row = array_merge($row, [
            'butir_kegiatan' => trim(preg_replace('/\s\s+/', ' ', $row['butir_kegiatan'])),
            'satuan_hasil' => trim(preg_replace('/\s\s+/', ' ', $row['satuan_hasil'])),
        ]);
        if (isset($row['unsur'])) {
            $unsur = $this->createUnsur($row);
            $subUnsur = $this->createSubUnsur($row, $unsur);
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (!isset($row['unsur']) && isset($row['sub_unsur'])) {
            $unsur = Unsur::query()->orderBy('id', 'desc')->first();
            $subUnsur = $this->createSubUnsur($row, $unsur);
            $this->createButirKegiatan($row, $subUnsur);
        }
        if (!isset($row['unsur']) && !isset($row['sub_unsur'])) {
            $subUnsur = SubUnsur::query()->orderBy('id', 'desc')->first();
            $this->createButirKegiatan($row, $subUnsur);
        }
    }

    public function createUnsur(array $row)
    {
        $role = Role::query()->where('name', 'damkar_'.str($row['pelaksana'])->lower())->first();
        return Unsur::query()->create([
            'role_id' => $role->id,
            'jenis_kegiatan_id' => 1,
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
            'satuan_hasil' => $row['satuan_hasil'],
            'score' => (float) $str
        ]);
    }
}
