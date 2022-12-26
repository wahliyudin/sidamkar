<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KegiatanPenunjangExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new UnsurPenunjangExport(),
            new JabatanExport()
        ];
    }
}