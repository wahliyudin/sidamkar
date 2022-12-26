<?php

namespace App\Exports;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class JabatanExport implements FromCollection, WithHeadings, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Role::query()->whereIn('id', [1, 2, 3, 4, 5, 6, 7])->get(['id', 'display_name']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama'
        ];
    }

    public function title(): string
    {
        return 'Data Jabatan';
    }
}