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
        if ($butirKegiatan['is_percent'] == false) {
            $data['score'] = $butirKegiatan['angka_kredit'];
        } else {
            $data['percent'] = $butirKegiatan['angka_kredit'];
        }
        $subUnsur->butirKegiatans()->create($data);
    }

    public function storeSubButirKegiatans(ButirKegiatan $butirKegiatan, array $subButirKegiatans)
    {
        for ($i = 0; $i < count($subButirKegiatans); $i++) {
            $data = [
                'nama' => $subButirKegiatans[$i]['name'],
                'satuan_hasil' => $subButirKegiatans[$i]['satuan_hasil'],
                'role_id' => isset($subButirKegiatans[$i]['role_id']) ? $subButirKegiatans[$i]['role_id'] : null
            ];
            if ($subButirKegiatans[$i]['is_percent'] == false) {
                $data['score'] = $subButirKegiatans[$i]['angka_kredit'];
            } else {
                $data['percent'] = $subButirKegiatans[$i]['angka_kredit'];
            }
            $butirKegiatan->subButirKegiatans()->create($data);
        }
    }
}
