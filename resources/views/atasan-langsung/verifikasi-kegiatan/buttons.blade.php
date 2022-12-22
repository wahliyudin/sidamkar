<div class="d-flex align-items-center">
    <a class="btn btn-green px-3 text-sm"
        href="{{ route('atasan-langsung.verifikasi-kegiatan.jabatan', $mente->fungsional->id) }}">Jabatan</a>
    <a class="btn btn-red px-3 text-sm ms-1"
        href="{{ route('atasan-langsung.verifikasi-kegiatan.profesi', $mente->fungsional->id) }}">Profesi</a>
    <a class="btn btn-blue px-3 text-sm ms-1"
        href="{{ route('atasan-langsung.verifikasi-kegiatan.penunjang', $mente->fungsional->id) }}">Penunjang</a>
</div>
