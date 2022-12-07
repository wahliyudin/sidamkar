<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\Unsur;
use Illuminate\Http\Request;

class KegiatanProfesiController extends Controller
{
    public function index()
    {
        $periode = Periode::query()->where('is_active', true)->first();
        $current_date = now()->format('Y-m-d');
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', 2)
            ->with([
                'subUnsurs.butirKegiatans' => function ($query) use ($current_date) {
                    $query->withWhereHas('laporanKegiatanProfesi', function ($query) use ($current_date) {
                        $query->where('user_id', auth()->user()->id)
                            ->whereDate('current_date', $current_date)
                            ->with([
                                'dokumenKegiatanProfesis',
                                'historyKegiatanProfesis'
                            ]);
                    })->withWhereHas('subButirKegiatans', function ($query) use ($current_date) {
                        $query->withWhereHas('laporanKegiatanProfesi', function ($query) use ($current_date) {
                            $query->where('user_id', auth()->user()->id)
                                ->whereDate('current_date', $current_date)
                                ->with([
                                    'dokumenKegiatanProfesis',
                                    'historyKegiatanProfesis'
                                ]);
                        });
                    });
                }
            ])->get();
        // return $unsurs;
        return view('aparatur.laporan-kegiatan.profesi.index', compact('periode'));
    }

    public function loadData(Request $request)
    {
        if ($request->ajax()) {
            $search = str($request->search)->lower()->trim();
            $current_date = $request->current_date ?? now()->format('Y-m-d');
            $unsurs = Unsur::query()
                ->where('jenis_kegiatan_id', 2)
                ->with([
                    'subUnsurs' => function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%")
                            ->orWhereHas('butirKegiatans', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            })
                            ->orWhereHas('subButirKegiatans', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            });
                    },
                    'subUnsurs.butirKegiatans.laporanKegiatanProfesi' => function ($query) use ($current_date) {
                        $query->where('user_id', auth()->user()->id)
                            ->whereDate('current_date', $current_date)
                            ->with([
                                'dokumenKegiatanProfesis',
                                'historyKegiatanProfesis'
                            ]);
                    },
                    'subUnsurs.subButirKegiatans.laporanKegiatanProfesi' => function ($query) use ($current_date) {
                        $query->where('user_id', auth()->user()->id)
                            ->whereDate('current_date', $current_date)
                            ->with([
                                'dokumenKegiatanProfesis',
                                'historyKegiatanProfesis'
                            ]);
                    }
                ])->get()->map(function (Unsur $unsur) {
                    foreach ($unsur->subUnsurs as $subUnsur) {
                        foreach ($subUnsur->butirKegiatans as $butirKegiatan) {
                            if (isset($butirKegiatan->subButirKegiatans)) {
                                foreach ($butirKegiatan->subButirKegiatans as $subButirKegiatan) {
                                    if (isset($subButirKegiatan->laporanKegiatanProfesi)) {
                                        if ($subButirKegiatan->laporanKegiatanProfesi->status == 1) {
                                            $subButirKegiatan->button = '<button class="btn btn-yellow ms-3 px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#riwayatKegiatan' . $subButirKegiatan->id . '"
                                                type="button">Prosess</button>
                                                ' . view('aparatur.laporan-kegiatan.profesi.riwayat.butir-kegiatan', compact('subButirKegiatan'));
                                        } elseif ($subButirKegiatan->laporanKegiatanProfesi->status == 2) {
                                            $subButirKegiatan->button = '<button class="btn btn-red ms-3 px-3 btn-sm btn-revisi"
                                                data-rencana="' . $subButirKegiatan->id . '" type="button">Revisi</button>'
                                                . view('aparatur.laporan-kegiatan.revisi', compact('subButirKegiatan'));
                                        } elseif ($subButirKegiatan->laporanKegiatanProfesi->status == 3) {
                                            $subButirKegiatan->button = '<button class="btn btn-black ms-3 px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#riwayatKegiatan' . $subButirKegiatan->id . '"
                                                type="button">Ditolak</button>'
                                                . view('aparatur.laporan-kegiatan.profesi.riwayat.butir-kegiatan', compact('subButirKegiatan'));
                                        } elseif ($subButirKegiatan->laporanKegiatanProfesi->status == 4) {
                                            $subButirKegiatan->button = ' <button class="btn btn-green-dark ms-3 px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#riwayatKegiatan' . $subButirKegiatan->id . '"
                                                type="button">Selesai</button>'
                                                . view('aparatur.laporan-kegiatan.profesi.riwayat.butir-kegiatan', compact('subButirKegiatan'));
                                        } else {
                                            $subButirKegiatan->button = '<button data-rencana="' . $subButirKegiatan->id . '"
                                                class="btn btn-gray ms-3 px-3 laporkan" data-bs-toggle="modal"
                                                data-bs-target="#laporkan" type="button">Laporkan</button>';
                                        }
                                    } else {
                                        $subButirKegiatan->button = '<button
                                            data-rencana="' . $subButirKegiatan->id . '"
                                            class="btn btn-gray ms-3 px-3 laporkan" data-bs-toggle="modal"
                                            data-bs-target="#laporkan" type="button">Laporkan</button>';
                                    }
                                }
                            } else {
                                if (isset($butirKegiatan->laporanKegiatanProfesi)) {
                                    if ($butirKegiatan->laporanKegiatanProfesi->status == 1) {
                                        $butirKegiatan->button = '<button class="btn btn-yellow ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $butirKegiatan->id . '"
                                            type="button">Prosess</button>
                                            ' . view('aparatur.laporan-kegiatan.profesi.riwayat.sub-butir-kegiatan', compact('butirKegiatan'));
                                    } elseif ($butirKegiatan->laporanKegiatanProfesi->status == 2) {
                                        $butirKegiatan->button = '<button class="btn btn-red ms-3 px-3 btn-sm btn-revisi"
                                            data-rencana="' . $butirKegiatan->id . '" type="button">Revisi</button>'
                                            . view('aparatur.laporan-kegiatan.revisi', compact('butirKegiatan'));
                                    } elseif ($butirKegiatan->laporanKegiatanProfesi->status == 3) {
                                        $butirKegiatan->button = '<button class="btn btn-black ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $butirKegiatan->id . '"
                                            type="button">Ditolak</button>'
                                            . view('aparatur.laporan-kegiatan.profesi.riwayat.sub-butir-kegiatan', compact('butirKegiatan'));
                                    } elseif ($butirKegiatan->laporanKegiatanProfesi->status == 4) {
                                        $butirKegiatan->button = ' <button class="btn btn-green-dark ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $butirKegiatan->id . '"
                                            type="button">Selesai</button>'
                                            . view('aparatur.laporan-kegiatan.profesi.riwayat.sub-butir-kegiatan', compact('butirKegiatan'));
                                    } else {
                                        $butirKegiatan->button = '<button data-rencana="' . $butirKegiatan->id . '"
                                            class="btn btn-gray ms-3 px-3 laporkan" data-bs-toggle="modal"
                                            data-bs-target="#laporkan" type="button">Laporkan</button>';
                                    }
                                } else {
                                    $butirKegiatan->button = '<button
                                        data-rencana="' . $butirKegiatan->id . '"
                                        class="btn btn-gray ms-3 px-3 laporkan" data-bs-toggle="modal"
                                        data-bs-target="#laporkan" type="button">Laporkan</button>';
                                }
                            }
                        }
                    }
                    return $unsur;
                });
            return response()->json([
                'data' => $unsurs
            ]);
        }
    }
}
