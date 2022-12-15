@foreach ($historyRekapitulasiKegiatans as $historyRekapitulasiKegiatan)
    <div class="timeline-item">
        <div class="timeline-icon icon-item icon-item-lg border-300">
            <i class="text-green fa-solid fa-check"></i>
        </div>
        <div class="row">
            <div class="col-lg-12 timeline-item-time">
                <div>
                    <p class="fs--1 mb-0 fw-semi-bold text-600">
                        {{ $historyRekapitulasiKegiatan->content }}
                    </p>
                    <p class="fs--2 text-600">
                        {{ $historyRekapitulasiKegiatan->created_at->format('H:i') }} WIB,
                        {{ $historyRekapitulasiKegiatan->created_at->format('d F Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
