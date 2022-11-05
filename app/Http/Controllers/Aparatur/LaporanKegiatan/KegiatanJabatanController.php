<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Models\Rencana;
use App\Models\RencanaButirKegiatan;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        // $date = now()->addDay()->format('Y-m-d');
        // $akhir = now()->addDay()->format('Y-m-d');
        // $rencanas = User::query()
        //     ->with([
        //         'rencanas' => function ($query) use ($date, $akhir) {
        //             $query->whereHas('rencanaUnsurs.unsur', function ($query) use ($date, $akhir) {
        //                 $query->whereDate('created_at', $date);
        //             });
        //         },
        //         'rencanas.rencanaUnsurs.unsur',
        //         'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur.butirKegiatans',
        //         'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan'
        //     ])
        //     ->find(auth()->user()->id)->rencanas;
        // return $rencanas;
        $rencanas = User::query()
            ->with([
                'rencanas',
                'rencanas.rencanaUnsurs.unsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.dokumenKegiatanPokoks',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.historyButirKegiatans',
            ])
            ->find(auth()->user()->id)->rencanas;
        return view('aparatur.laporan-kegiatan.index', compact('rencanas'));
    }

    public function loadData(Request $request)
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
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan'
                ])
                ->find(auth()->user()->id)?->rencanas->map(function (Rencana $rencana) use ($date) {
                    foreach ($rencana->rencanaUnsurs as $rencanaUnsur) {
                        foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur) {
                            foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan) {
                                if ($rencanaButirKegiatan->dokumenKegiatanPokoks()->whereDate('current_date', $date)->first() !== null) {
                                    if ($rencanaButirKegiatan->status == 1) {
                                        $rencanaButirKegiatan->button = '<button class="btn btn-yellow ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $rencanaButirKegiatan->id . '"
                                            type="button">Prosess</button>
                                        ' . view('aparatur.laporan-kegiatan.riwayat', compact('rencanaButirKegiatan'));
                                    } elseif ($rencanaButirKegiatan->status == 2) {
                                        $rencanaButirKegiatan->button = '<button
                                            class="btn btn-red ms-3 px-3 btn-sm btn-revisi"
                                            data-rencana="' . $rencanaButirKegiatan->id . '" type="button">Revisi</button>'
                                                . view('aparatur.laporan-kegiatan.revisi', compact('rencanaButirKegiatan'));
                                    } elseif ($rencanaButirKegiatan->status == 3) {
                                        $rencanaButirKegiatan->button = '<button class="btn btn-black ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $rencanaButirKegiatan->id . '"
                                            type="button">Ditolak</button>'
                                                . view('aparatur.laporan-kegiatan.riwayat', compact('rencanaButirKegiatan'));
                                    } elseif ($rencanaButirKegiatan->status == 4) {
                                        $rencanaButirKegiatan->button = ' <button class="btn btn-green-dark ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $rencanaButirKegiatan->id . '"
                                            type="button">Selesai</button>'
                                                . view('aparatur.laporan-kegiatan.riwayat', compact('rencanaButirKegiatan'));
                                    } else {
                                        $rencanaButirKegiatan->button = '<button
                                            data-rencana="' . $rencanaButirKegiatan->id . '"
                                            class="btn btn-gray ms-3 px-3 laporkan" data-bs-toggle="modal"
                                            data-bs-target="#laporkan" type="button">Laporkan</button>';
                                    }
                                } else {
                                    $rencanaButirKegiatan->button = '<button
                                        data-rencana="' . $rencanaButirKegiatan->id . '"
                                        class="btn btn-gray ms-3 px-3 laporkan" data-bs-toggle="modal"
                                        data-bs-target="#laporkan" type="button">Laporkan</button>';
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

    public function storeLaporan(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'rencana_butir_kegiatan' => 'required',
            'current_date' => 'required',
            'doc_kegiatan_tmp' => 'required|array'
        ], [
            'keterangan.required' => 'Detail kegiatan harus diisi',
            'doc_kegiatan_tmp.required' => 'Dokumen Kegiatan harus diisi'
        ]);
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->findOrFail($request->rencana_butir_kegiatan);
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmp_file = TemporaryFile::query()->where('folder', $doc_kegiatan_tmp)->first();
            if ($tmp_file) {
                Storage::copy("tmp/$tmp_file->folder/$tmp_file->file", "kegiatan/$tmp_file->file");
                $rencanaButirKegiatan->dokumenKegiatanPokoks()->create([
                    'title' => $request->keterangan,
                    'file' => url("storage/kegiatan/$tmp_file->file"),
                    'current_date' => $request->current_date
                ]);
                $tmp_file->delete();
                Storage::deleteDirectory("tmp/$tmp_file->folder");
            }
        }
        $rencanaButirKegiatan->update([
            'status' => 1
        ]);
        $rencanaButirKegiatan->historyButirKegiatans()->create([
            'keterangan' => 'Menginput Laporan kegiatan'
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required',
            'doc_kegiatan_tmp' => 'required|array'
        ], [
            'keterangan.required' => 'Detail kegiatan harus diisi',
            'doc_kegiatan_tmp.required' => 'Dokumen Kegiatan harus diisi'
        ]);
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->with('dokumenKegiatanPokoks')->find($id);
        foreach ($rencanaButirKegiatan->dokumenKegiatanPokoks as $dok) {
            deleteImage($dok->file);
            $dok->delete();
        }
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmp_file = TemporaryFile::query()->where('folder', $doc_kegiatan_tmp)->first();
            if ($tmp_file) {
                Storage::copy("tmp/$tmp_file->folder/$tmp_file->file", "kegiatan/$tmp_file->file");
                $rencanaButirKegiatan->dokumenKegiatanPokoks()->create([
                    'title' => $request->keterangan,
                    'file' => url("storage/kegiatan/$tmp_file->file")
                ]);
                $tmp_file->delete();
                Storage::deleteDirectory("tmp/$tmp_file->folder");
            }
        }
        $rencanaButirKegiatan->update([
            'status' => 1
        ]);
        $rencanaButirKegiatan->historyButirKegiatans()->create([
            'keterangan' => 'Kirim revisi Laporan kegiatan'
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil'
        ]);
    }

    public function edit($id)
    {
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->with('dokumenKegiatanPokoks')->find($id);

        return response()->json([
            'status' => 200,
            'data' => $rencanaButirKegiatan
        ]);
    }

    public function tmpFile(Request $request)
    {
        foreach ($request->doc_kegiatan_tmp as $file) {
            $file_name = $file->getClientOriginalName();
            $folder = uniqid('kegiatan', true);
            $file->storeAs("tmp/$folder", $file_name);
            TemporaryFile::query()->create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return;
    }

    public function revert(Request $request)
    {
        $tmp_file = TemporaryFile::query()->where('folder', $request->getContent())->first();
        if ($tmp_file) {
            $tmp_file->delete();
            Storage::deleteDirectory("tmp/$tmp_file->folder");
        }
    }
}
