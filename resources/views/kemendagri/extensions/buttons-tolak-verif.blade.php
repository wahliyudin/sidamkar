<div class="d-flex align-items-center">
    @if ($user->status_akun == 2)
        <button class="btn btn-red text-sm px-3" onclick="hapus({{ $user->id }})">Hapus</button>
    @elseif ($user->status_akun == 1)
    <button class="btn btn-blue text-sm px-3" >Edit</button>
    <button class="btn btn-red text-sm px-3 ms-2" onclick="hapus({{ $user->id }})">Hapus</button>
    @else
        <button class="btn btn-red text-sm px-3" onclick="tolak({{ $user->id }})">Tolak</button>
        <button class="btn btn-green text-sm px-3 ms-2" onclick="verifikasi({{ $user->id }})">Verfikasi</button>
    @endif
</div>
