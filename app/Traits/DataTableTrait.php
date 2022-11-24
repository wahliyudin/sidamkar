<?php

namespace App\Traits;

trait DataTableTrait
{
    public function statusAkun($status)
    {
        switch ($status) {
            case 0:
                return '<span class="badge bg-yellow text-white text-sm py-2 px-3 rounded-md">Menunggu</span>';
                break;
            case 1:
                return '<span class="badge bg-green text-white text-sm py-2 px-3 rounded-md">Verified</span>';
                break;
            case 2:
                return '<span class="badge bg-black text-white text-sm py-2 px-3 rounded-md">Ditolak</span>';
                break;
        }
    }
}
