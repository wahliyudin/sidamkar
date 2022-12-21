<div class="d-flex align-items-center">
    @if ($row->status_akun == 2)
        <button class="btn btn-red-reverse me-2" onclick="hapus('{{ $row->id }}')">
            <i class="fas fa-trash"></i>
        </button>
    @elseif ($row->status_akun == 1)
        <button class="btn btn-blue-reverse me-2">
            <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-red-reverse me-2" onclick="hapus('{{ $row->id }}')">
            <i class="fas fa-trash"></i>
        </button>
    @else
        <button class="btn btn-dark-reverse me-2" onclick="tolak('{{ $row->id }}')">
            <i class="fas fa-xmark"></i>
        </button>
        <button class="btn btn-green-reverse me-2" onclick="verifikasi('{{ $row->id }}')">
            <i class="fas fa-check"></i>
        </button>
    @endif
</div>
