<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Models\ButirKegiatan;
use App\Models\HistoryRekapitulasiKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\RencanaButirKegiatan;
use App\Models\TemporaryFile;
use App\Models\Unsur;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        $periode = Periode::query()->where('is_active', true)->first();
        $user = User::query()->with('rencanas', 'rekapitulasiKegiatan')->find(auth()->user()->id);
        $judul = 'Laporan Kegiatan Jabatan';
        return view('aparatur.laporan-kegiatan.jabatan.index', compact('periode', 'user', 'judul'));
    }

    public function loadData(Request $request)
    {
        if ($request->ajax()) {
            $periode = Periode::query()->where('is_active', true)->first();
            $role = auth()->user()->load('roles')->roles()->first();
            $search = str($request->search)->lower()->trim();
            $unsurs = Unsur::query()
                ->where('jenis_kegiatan_id', 1)
                ->where('periode_id', $periode->id)
                ->with(['role' => function ($query) use ($role) {
                    $query->whereIn('id', [$role->id + 1, $role->id - 1, $role->id]);
                }, 'subUnsurs.butirKegiatans'])
                ->whereHas('role', function ($query) use ($search, $role) {
                    $query->where('nama', 'like',
                    "%$search%");
                })
                ->when($search, function ($query) use ($search) {
                    $query->where('nama', 'like', "%$search%")
                        ->orWhereHas('subUnsurs', function ($query) use ($search) {
                            $query->where('nama', 'like', "%$search%")
                                ->orWhereHas('butirKegiatans', function ($query) use ($search) {
                                    $query->where('nama', 'like', "%$search%");
                                });
                        });
                })
                ->get();
            return response()->json([
                'unsurs' => $unsurs
            ]);
        }
    }

    public function show(ButirKegiatan $butir_kegiatan)
    {
        return view('aparatur.laporan-kegiatan.jabatan.show', compact('butir_kegiatan'));
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
        $user = auth()->user()->load(['roles', 'userAparatur']);
        $role = $user->roles()->first();
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->with('butirKegiatan.subUnsur.unsur.role')->findOrFail($request->rencana_butir_kegiatan);
        $laporanKegiatanJabatan = $rencanaButirKegiatan->laporanKegiatanJabatans()->create([
            'detail_kegiatan' => $request->keterangan,
            'current_date' => $request->current_date,
            'score' => $rencanaButirKegiatan->butirKegiatan->score
        ]);
        $userNama = $user->userAparatur->nama;
        $jabatan = $role->display_name;
        $historyButirKegiatan = $laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => "Kegiatan dilaporkan oleh $userNama - $jabatan",
            'detail_kegiatan' => $request->keterangan,
            'status' => 5,
            'icon' => 6
        ]);
        $laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => 'Sedang divalidasi oleh Atasan Langsung',
            'status' => 1,
            'icon' => 1
        ]);
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmp_file = TemporaryFile::query()->where('folder', $doc_kegiatan_tmp)->first();
            if ($tmp_file) {
                Storage::copy("tmp/$tmp_file->folder/$tmp_file->file", "kegiatan/$tmp_file->file");
                $laporanKegiatanJabatan->dokumenKegiatanPokoks()->create([
                    'file' => url("storage/kegiatan/$tmp_file->file")
                ]);
                $historyButirKegiatan->dokumenHistoryButirKegiatans()->create([
                    'file' => url("storage/kegiatan/$tmp_file->file")
                ]);
                $tmp_file->delete();
                Storage::deleteDirectory("tmp/$tmp_file->folder");
            }
        }
        $laporanKegiatanJabatan->update([
            'status' => 1
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
            'current_date' => 'required',
            'doc_kegiatan_tmp' => 'required|array'
        ], [
            'keterangan.required' => 'Detail kegiatan harus diisi',
            'doc_kegiatan_tmp.required' => 'Dokumen Kegiatan harus diisi'
        ]);
        $laporanKegiatanJabatan = LaporanKegiatanJabatan::query()->with(['rencanaButirKegiatan.butirKegiatan', 'dokumenKegiatanPokoks'])->where('rencana_butir_kegiatan_id', $id)->whereDate('current_date', $request->current_date)->first();
        foreach ($laporanKegiatanJabatan->dokumenKegiatanPokoks as $dok) {
            deleteImage($dok->file);
            $dok->delete();
        }
        $laporanKegiatanJabatan->update([
            'detail_kegiatan' => $request->keterangan,
            'score' => $laporanKegiatanJabatan->rencanaButirKegiatan->butirKegiatan->score
        ]);
        $historyButirKegiatan = $laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => 'Kirim revisi Laporan kegiatan',
            'detail_kegiatan' => $request->keterangan,
            'status' => 5,
            'icon' => 5
        ]);
        $laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => 'Sedang divalidasi oleh Atasan Langsung',
            'status' => 1,
            'icon' => 1
        ]);
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmp_file = TemporaryFile::query()->where('folder', $doc_kegiatan_tmp)->first();
            if ($tmp_file) {
                Storage::copy("tmp/$tmp_file->folder/$tmp_file->file", "kegiatan/$tmp_file->file");
                $laporanKegiatanJabatan->dokumenKegiatanPokoks()->create([
                    'file' => url("storage/kegiatan/$tmp_file->file")
                ]);
                $historyButirKegiatan->dokumenHistoryButirKegiatans()->create([
                    'file' => url("storage/kegiatan/$tmp_file->file")
                ]);
                $tmp_file->delete();
                Storage::deleteDirectory("tmp/$tmp_file->folder");
            }
        }
        $laporanKegiatanJabatan->update([
            'status' => 1,
            'catatan' => null
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil'
        ]);
    }

    public function edit($id, $current_date)
    {
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->withWhereHas('laporanKegiatanJabatan', function ($query) use ($current_date) {
            $query->with('dokumenKegiatanPokoks')->where('current_date', $current_date);
        })->find($id);

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

    public function rekapitulasi()
    {
        $periode = Periode::query()->where('is_active', true)->first();
        $user = User::query()->with([
            'mente.atasanLangsung.roles',
            'mente.atasanLangsung.userPejabatStruktural.pangkatGolonganTmt', 'roles',
            'userAparatur.pangkatGolonganTmt'
        ])->find(auth()->user()->id);
        if (!isset($user->userAparatur->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf anda belum melengkapi data diri anda"]);
        }
        if (!isset($user->mente->atasanLangsung)) {
            throw ValidationException::withMessages(["Maaf anda belum mempunyai atasan langsung"]);
        }
        if (!isset($user->mente->atasanLangsung->userPejabatStruktural->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf atasan langsung anda belum melengkapi data dirinya"]);
        }
        $rencanas = User::query()
            ->with([
                'rencanas',
                'rencanas.rencanaUnsurs.unsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans' => function ($query) use ($periode) {
                    $query->withSum(['laporanKegiatanJabatans' => function ($query) use ($periode) {
                        $query->where('status', 4)->whereBetween('current_date', [$periode->awal, $periode->akhir]);
                    }], 'score')->withCount(['laporanKegiatanJabatans' => function ($query) use ($periode) {
                        $query->where('status', 4)->whereBetween('current_date', [$periode->awal, $periode->akhir]);
                    }]);
                },
            ])
            ->find(auth()->user()->id)->rencanas;
        $pdf = PDF::loadView('generate-pdf.surat-pernyataan', ['rencanas' => $rencanas, 'user' => $user]);
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf->output());
        $url = asset("storage/rekapitulasi/$file_name.pdf");
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', auth()->user()->id)
            ->where('periode_id', $periode->id)->first();
        if ($rekapitulasiKegiatan) {
            deleteImage($rekapitulasiKegiatan->file);

            $rekapitulasiKegiatan->update([
                'file' => $url,
                'file_name' => $file_name
            ]);
        } else {
            $rekapitulasiKegiatan = RekapitulasiKegiatan::query()->create([
                'fungsional_id' => auth()->user()->id,
                'file' => $url,
                'file_name' => $file_name,
                'periode_id' => $periode->id
            ]);
            $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
                'struktural_id' => $user->mente->atasanLangsung->id,
                'content' => 'Rekapitulasi diterima Atasan Langsung'
            ]);
        }
        return response()->json([
            'message' => 'Berhasil',
            'data' => $url
        ]);
    }

    public function sendRekap()
    {
        $periode = Periode::query()->where('is_active', true)->first();
        $rekap = RekapitulasiKegiatan::query()
            ->where('fungsional_id', auth()->user()->id)
            ->where('periode_id', $periode->id)
            ->first();
        if (!$rekap) {
            throw ValidationException::withMessages(['Data rekapitulasi tidak ditemukan']);
        }
        if ($rekap->is_send == true) {
            throw ValidationException::withMessages(['Data rekapitulasi sudah dikirim']);
        }
        $rekap->update([
            'is_send' => true
        ]);
        return response()->json([
            'message' => 'Berhasil dikirim'
        ]);
    }
}
