<?php

namespace App\Exports;

use App\Models\JenisKegiatan;
use App\Models\Unsur;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class UnsurJabatanExport implements FromView, WithTitle
{
    public function view(): View
    {
        return view('exports.unsur-jabatan', [
            'unsurs' => Unsur::query()->where('jenis_kegiatan_id', JenisKegiatan::JENIS_KEGIATAN_JABATAN)->with('subUnsurs.butirKegiatans')->get()
        ]);
    }

    public function title(): string
    {
        return 'Data Kegiatan';
    }
}