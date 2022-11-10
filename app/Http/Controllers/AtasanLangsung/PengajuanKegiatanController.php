<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\DataTables\AtasanLangsung\PengajuanKegiatanDataTable;
use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\Rencana;
use App\Models\RencanaButirKegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanKegiatanController extends Controller
{
    public function index(PengajuanKegiatanDataTable $dataTable)
    {
        return $dataTable->render('atasan-langsung.pengajuan-kegiatan.index');
    }

    public function show($id)
    {
        $periode = Periode::query()->where('is_active', true)->first();
        $user = User::query()->findOrFail($id);
        return view('atasan-langsung.pengajuan-kegiatan.show', compact('user', 'periode'));
    }

    public function loadData(Request $request, $id)
    {
        if ($request->ajax()) {
            $search = str($request->search)->lower()->trim();
            $date = $request->search_date ?? now()->format('Y-m-d');
            $rencanas = User::query()
                ->with([
                    'rencanas' => function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%")
                            ->orWhereHas('rencanaUnsurs.unsur', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            })->orWhereHas('rencanaUnsurs.rencanaSubUnsurs.subUnsur', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            })->orWhereHas('rencanaUnsurs.rencanaSubUnsurs.subUnsur.butirKegiatans', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            });
                    },
                    'rencanas.rencanaUnsurs.unsur',
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur.butirKegiatans',
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan',
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.laporanKegiatanJabatan' => function ($query) use ($date) {
                        $query->where('current_date', $date);
                    },
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.laporanKegiatanJabatan.dokumenKegiatanPokoks',
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.laporanKegiatanJabatan.historyButirKegiatans',
                ])
                ->find($id)?->rencanas->map(function (Rencana $rencana) use ($date) {
                    foreach ($rencana->rencanaUnsurs as $rencanaUnsur) {
                        foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur) {
                            foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan) {
                                if (isset($rencanaButirKegiatan->laporanKegiatanJabatan)) {
                                    if ($rencanaButirKegiatan->laporanKegiatanJabatan->status == 2) {
                                        $rencanaButirKegiatan->button = '<button class="btn btn-red ms-3 m-1 px-3 btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#lihat' . $rencanaButirKegiatan->id . '"
                                            type="button">Revisi</button>';
                                    } elseif ($rencanaButirKegiatan->laporanKegiatanJabatan->status == 3) {
                                        $rencanaButirKegiatan->button = '<button class="btn btn-black m-1 ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#lihat' . $rencanaButirKegiatan->id . '"
                                            type="button">Ditolak</button>';
                                    } elseif ($rencanaButirKegiatan->laporanKegiatanJabatan->status == 4) {
                                        $rencanaButirKegiatan->button = '<button class="btn btn-green-dark m-1 ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#lihat' . $rencanaButirKegiatan->id . '"
                                            type="button">Selesai</button>';
                                    } else {
                                        $rencanaButirKegiatan->button = '<button
                                            data-rencana="' . $rencanaButirKegiatan->id . '"
                                            class="btn btn-blue ms-3 m-1 px-4 btn-sm laporkan" data-bs-toggle="modal"
                                            data-bs-target="#lihat' . $rencanaButirKegiatan->id . '"
                                            type="button">Lihat</button>' .
                                            view(
                                                'atasan-langsung.pengajuan-kegiatan.kegiatan.lihat',
                                                compact('rencanaButirKegiatan')
                                            );
                                    }
                                } else {
                                    $rencanaButirKegiatan->laporanKegiatanJabatan = [];
                                    $rencanaButirKegiatan->button = '<button
                                        data-rencana="' . $rencanaButirKegiatan->id . '"
                                        class="btn btn-gray ms-3 px-4 m-1 btn-sm laporkan" data-bs-toggle="modal"
                                        data-bs-target="#lihat' . $rencanaButirKegiatan->id . '"
                                        type="button">Belum</button>' .
                                        view(
                                            'atasan-langsung.pengajuan-kegiatan.kegiatan.lihat',
                                            compact('rencanaButirKegiatan')
                                        );
                                }
                            }
                        }
                    }
                    return $rencana;
                });
            return response()->json([
                'data' => $rencanas
            ]);
        }
    }

    public function tolak(Request $request, $id, $current_date)
    {
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->withWhereHas('laporanKegiatanJabatan', function ($query) use ($current_date) {
            $query->with('dokumenKegiatanPokoks')->where('current_date', $current_date);
        })->find($id);
        $rencanaButirKegiatan->laporanKegiatanJabatan->update([
            'status' => 3,
            'catatan' => $request->catatan
        ]);
        $rencanaButirKegiatan->laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => 'Laporan ditolak',
            'status' => 3,
            'catatan' => $request->catatan,
            'icon' => 3
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ditolak'
        ]);
    }

    public function revisi(Request $request, $id, $current_date)
    {
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->withWhereHas('laporanKegiatanJabatan', function ($query) use ($current_date) {
            $query->with('dokumenKegiatanPokoks')->where('current_date', $current_date);
        })->find($id);
        $rencanaButirKegiatan->laporanKegiatanJabatan->update([
            'status' => 2,
            'catatan' => $request->catatan
        ]);
        $rencanaButirKegiatan->laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => 'Laporan direvisi',
            'status' => 2,
            'catatan' => $request->catatan,
            'icon' => 2
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil direvisi'
        ]);
    }

    public function verifikasi($id, $current_date)
    {
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->withWhereHas('laporanKegiatanJabatan', function ($query) use ($current_date) {
            $query->with('dokumenKegiatanPokoks')->where('current_date', $current_date);
        })->find($id);
        $rencanaButirKegiatan->laporanKegiatanJabatan->update([
            'status' => 4,
            'catatan' => null
        ]);
        $rencanaButirKegiatan->laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => 'Laporan diverifikasi',
            'status' => 4,
            'icon' => 4
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diverifikasi'
        ]);
    }
}
