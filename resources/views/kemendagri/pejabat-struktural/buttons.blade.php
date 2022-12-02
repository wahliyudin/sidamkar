<div class="d-flex align-items-center">
    <button {{ $isAktif ? '' : 'disabled' }} class="btn  {{ $isAktif ? 'btn-red' : 'btn-gray' }} text-sm px-3"
        onclick="nonActive('{{ $user->id }}')">Nonaktif</button>
    <button {{ $isAktif ? 'disabled' : '' }} class="btn {{ $isAktif ? 'btn-gray' : 'btn-green' }} text-sm px-3 ms-2"
        onclick="active('{{ $user->id }}')">Aktifkan</button>
    <a href="{{ route('kemendagri.pejabat-struktural.show', $user->id) }}" class="btn btn-blue text-sm ms-2">Detail</a>
</div>
