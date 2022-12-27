<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KegiatanProfesiExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new UnsurProfesiExport(),
            new JabatanExport()
        ];
    }
}