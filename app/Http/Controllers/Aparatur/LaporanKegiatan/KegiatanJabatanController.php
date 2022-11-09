<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
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
        return view('aparatur.laporan-kegiatan.index', compact('periode', 'user', 'judul'));
    }

    public function loadData(Request $request)
    {
        if ($request->ajax()) {
            $is_rekap = auth()->user()->load('rekapitulasiKegiatan')->rekapitulasiKegiatan?->is_send;
            $search = str($request->search)->lower()->trim();
            $date = $request->search_date ?? now()->format('Y-m-d');
            $isDisabled = $is_rekap ? 'disabled' : '';
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
                ->find(auth()->user()->id)?->rencanas->map(function (Rencana $rencana) use ($isDisabled) {
                    foreach ($rencana->rencanaUnsurs as $rencanaUnsur) {
                        foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur) {
                            foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan) {
                                if (isset($rencanaButirKegiatan->laporanKegiatanJabatan)) {
                                    if ($rencanaButirKegiatan->laporanKegiatanJabatan->status == 1) {
                                        $rencanaButirKegiatan->button = '<button '.$isDisabled.' class="btn btn-yellow ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $rencanaButirKegiatan->id . '"
                                            type="button">Prosess</button>
                                        ' . view('aparatur.laporan-kegiatan.riwayat', compact('rencanaButirKegiatan'));
                                    } elseif ($rencanaButirKegiatan->laporanKegiatanJabatan->status == 2) {
                                        $rencanaButirKegiatan->button = '<button
                                            '.$isDisabled.'
                                            class="btn btn-red ms-3 px-3 btn-sm btn-revisi"
                                            data-rencana="' . $rencanaButirKegiatan->id . '" type="button">Revisi</button>'
                                            . view('aparatur.laporan-kegiatan.revisi', compact('rencanaButirKegiatan'));
                                    } elseif ($rencanaButirKegiatan->laporanKegiatanJabatan->status == 3) {
                                        $rencanaButirKegiatan->button = '<button '.$isDisabled.' class="btn btn-black ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $rencanaButirKegiatan->id . '"
                                            type="button">Ditolak</button>'
                                            . view('aparatur.laporan-kegiatan.riwayat', compact('rencanaButirKegiatan'));
                                    } elseif ($rencanaButirKegiatan->laporanKegiatanJabatan->status == 4) {
                                        $rencanaButirKegiatan->button = ' <button '.$isDisabled.' class="btn btn-green-dark ms-3 px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#riwayatKegiatan' . $rencanaButirKegiatan->id . '"
                                            type="button">Selesai</button>'
                                            . view('aparatur.laporan-kegiatan.riwayat', compact('rencanaButirKegiatan'));
                                    } else {
                                        $rencanaButirKegiatan->button = '<button
                                            '.$isDisabled.'
                                            data-rencana="' . $rencanaButirKegiatan->id . '"
                                            class="btn btn-gray ms-3 px-3 laporkan" data-bs-toggle="modal"
                                            data-bs-target="#laporkan" type="button">Laporkan</button>';
                                    }
                                } else {
                                    $rencanaButirKegiatan->button = '<button
                                        '.$isDisabled.'
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
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->with('butirKegiatan')->findOrFail($request->rencana_butir_kegiatan);
        $laporanKegiatanJabatan = $rencanaButirKegiatan->laporanKegiatanJabatans()->create([
            'detail_kegiatan' => $request->keterangan,
            'current_date' => $request->current_date,
            'score' => $rencanaButirKegiatan->butirKegiatan->score
        ]);
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmp_file = TemporaryFile::query()->where('folder', $doc_kegiatan_tmp)->first();
            if ($tmp_file) {
                Storage::copy("tmp/$tmp_file->folder/$tmp_file->file", "kegiatan/$tmp_file->file");
                $laporanKegiatanJabatan->dokumenKegiatanPokoks()->create([
                    'file' => url("storage/kegiatan/$tmp_file->file")
                ]);
                $tmp_file->delete();
                Storage::deleteDirectory("tmp/$tmp_file->folder");
            }
        }
        $laporanKegiatanJabatan->update([
            'status' => 1
        ]);
        $laporanKegiatanJabatan->historyButirKegiatans()->create([
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
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmp_file = TemporaryFile::query()->where('folder', $doc_kegiatan_tmp)->first();
            if ($tmp_file) {
                Storage::copy("tmp/$tmp_file->folder/$tmp_file->file", "kegiatan/$tmp_file->file");
                $laporanKegiatanJabatan->dokumenKegiatanPokoks()->create([
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
        $laporanKegiatanJabatan->historyButirKegiatans()->create([
            'keterangan' => 'Kirim revisi Laporan kegiatan'
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
