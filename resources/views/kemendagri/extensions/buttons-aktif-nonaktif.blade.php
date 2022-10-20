<div class="d-flex align-items-center">
    <button {{ $isAktif ? '' : 'disabled' }} class="btn  {{ $isAktif ? 'btn-red' : 'btn-gray' }} text-sm px-3"
        onclick="active({{ $user->id }})">Nonaktif</button>
    <button {{ $isAktif ? 'disabled' : '' }} class="btn {{ $isAktif ? 'btn-gray' : 'btn-green' }} text-sm px-3 ms-2"
        onclick="nonActive({{ $user->id }})">Aktifkan</button>
</div>
