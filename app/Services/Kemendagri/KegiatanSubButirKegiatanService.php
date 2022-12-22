<?php

namespace App\Services\Kemendagri;

use App\Models\ButirKegiatan;
use App\Models\SubUnsur;

class KegiatanSubButirKegiatanService
{
    public function storeButirKegiatan(SubUnsur $subUnsur, array $butirKegiatan)
    {
        $data = [
            'nama' => $butirKegiatan['name'],
            'satuan_hasil' => $butirKegiatan['satuan_hasil'],
            'role_id' => isset($butirKegiatan['role_id']) ? $butirKegiatan['role_id'] : null
        ];
        if (filter_var($butirKegiatan['is_percent'], FILTER_VALIDATE_BOOLEAN)) {
            $data['percent'] = $butirKegiatan['angka_kredit'];
        } else {
            $data['score'] = $butirKegiatan['angka_kredit'];
        }
        return $subUnsur->butirKegiatans()->create($data);
    }

    public function updateButirKegiatan(SubUnsur $subUnsur, array $butirKegiatanArr)
    {
        $butirKegiatan = $subUnsur->butirKegiatans()->find($butirKegiatanArr['id']);
        $data = [
            'nama' => $butirKegiatanArr['name'],
            'satuan_hasil' => $butirKegiatanArr['satuan_hasil'],
            'role_id' => isset($butirKegiatanArr['role_id']) ? $butirKegiatanArr['role_id'] : null
        ];
        if (filter_var($butirKegiatanArr['is_percent'], FILTER_VALIDATE_BOOLEAN)) {
            $data['percent'] = $butirKegiatanArr['angka_kredit'];
            $data['score'] = null;
        } else {
            $data['score'] = $butirKegiatanArr['angka_kredit'];
            $data['percent'] = null;
        }
        $butirKegiatan->update($data);
        return $butirKegiatan;
    }

    public function storeSubButirKegiatans(ButirKegiatan $butirKegiatan, array $subButirKegiatans)
    {
        for ($i = 0; $i < count($subButirKegiatans); $i++) {
            $data = [
                'nama' => $subButirKegiatans[$i]['name'],
                'satuan_hasil' => $subButirKegiatans[$i]['satuan_hasil'],
                'role_id' => isset($subButirKegiatans[$i]['role_id']) ? $subButirKegiatans[$i]['role_id'] : null
            ];
            if (filter_var($subButirKegiatans[$i]['is_percent'], FILTER_VALIDATE_BOOLEAN)) {
                $data['percent'] = $subButirKegiatans[$i]['angka_kredit'];
            } else {
                $data['score'] = $subButirKegiatans[$i]['angka_kredit'];
            }
            $butirKegiatan->subButirKegiatans()->create($data);
        }
    }

    public function storeSubButirKegiatan(ButirKegiatan $butirKegiatan, array $subButirKegiatan)
    {
        $data = [
            'nama' => $subButirKegiatan['name'],
            'satuan_hasil' => $subButirKegiatan['satuan_hasil'],
            'role_id' => isset($subButirKegiatan['role_id']) ? $subButirKegiatan['role_id'] : null
        ];
        if (filter_var($subButirKegiatan['is_percent'], FILTER_VALIDATE_BOOLEAN)) {
            $data['percent'] = $subButirKegiatan['angka_kredit'];
        } else {
            $data['score'] = $subButirKegiatan['angka_kredit'];
        }
        return $butirKegiatan->subButirKegiatans()->create($data);
    }

    public function updateSubButirKegiatan(ButirKegiatan $butirKegiatan, array $subButirKegiatanArr)
    {
        $subButirKegiatan = $butirKegiatan->subButirKegiatans()->find($subButirKegiatanArr['id']);
        $data = [
            'nama' => $subButirKegiatanArr['name'],
            'satuan_hasil' => $subButirKegiatanArr['satuan_hasil'],
            'role_id' => isset($subButirKegiatanArr['role_id']) ? $subButirKegiatanArr['role_id'] : null
        ];
        if (filter_var($subButirKegiatanArr['is_percent'], FILTER_VALIDATE_BOOLEAN)) {
            $data['percent'] = $subButirKegiatanArr['angka_kredit'];
            $data['score'] = null;
        } else {
            $data['score'] = $subButirKegiatanArr['angka_kredit'];
            $data['percent'] = null;
        }
        $subButirKegiatan->update($data);
        return $subButirKegiatan;
    }
}
