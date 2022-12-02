<div class="d-flex align-items-center">
    @if ($user->status_akun == 2)
        <button class="btn btn-red text-sm px-3" style="width: 102px;"
            onclick="hapus('{{ $user->id }}')">Hapus</button>
    @elseif ($user->status_akun == 1)
        <button class="btn btn-blue text-sm px-3" style="width: 102px;">Edit</button>
        <button class="btn btn-red text-sm px-3 ms-2" style="width: 102px;"
            onclick="hapus('{{ $user->id }}')">Hapus</button>
    @else
        <button class="btn btn-black text-sm px-3" style="width: 102px;"
            onclick="tolak('{{ $user->id }}')">Tolak</button>
        <button class="btn btn-green text-sm px-3 ms-2" style="width: 102px;"
            onclick="verifikasi('{{ $user->id }}')">Verfikasi</button>
    @endif
</div>
