<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KegiatanJabatanExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new UnsurJabatanExport(),
            new JabatanExport()
        ];
    }
}