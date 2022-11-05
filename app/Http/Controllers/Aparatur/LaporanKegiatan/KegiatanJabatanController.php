<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Models\RencanaButirKegiatan;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
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

    public function storeLaporan(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'doc_kegiatan_tmp' => 'required|array'
        ], [
            'keterangan.required' => 'Detail kegiatan harus diisi',
            'doc_kegiatan_tmp.required' => 'Dokumen Kegiatan harus diisi'
        ]);
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->find($request->rencana_butir_kegiatan);
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
