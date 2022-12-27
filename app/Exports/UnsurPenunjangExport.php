<?php

namespace App\Exports;

use App\Models\JenisKegiatan;
use App\Models\Unsur;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class UnsurPenunjangExport implements FromView, WithTitle
{
    public function view(): View
    {
        return view('exports.unsur-penunjang-profesi', [
            'unsurs' => Unsur::query()->where('jenis_kegiatan_id', JenisKegiatan::JENIS_KEGIATAN_PENUNJANG)->with('subUnsurs.butirKegiatans.subButirKegiatans')->get()
        ]);
    }

    public function title(): string
    {
        return 'Data Kegiatan';
    }
}