<div class="modal fade" id="revisi{{ $rencanaButirKegiatan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="revisiTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body px-4 py-0">
                <form action="" class="form-kegiatan{{ $rencanaButirKegiatan->id }}" method="post">
                    <div class="row">
                        <div class="col-md-6 py-4" style="border-right: 2px solid rgba(0, 0, 0, 0.125);">
                            <div class="d-flex flex-column">
                                <h4>Laporan Kegiatan</h4>
                                <hr>
                                <input type="hidden" name="current_date">
                                <div class="d-flex flex-column">
                                    <h6>File Dokumen</h6>
                                    <div class="form-group col-md-12">
                                        <label>File Dokumen</label>
                                        <input type="file" name="doc_kegiatan_tmp[]" multiple
                                            data-max-file-size="2MB" data-max-files="3" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Detail Kegiatan</label>
                                        <textarea class="form-control" name="keterangan" rows="3">{{ $rencanaButirKegiatan->laporanKegiatanJabatan->detail_kegiatan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 py-4">
                            <h4>Riwayat Laporan Kegiatan</h4>
                            <hr>
                            <div class="timeline-vertical" data-simplebar
                                style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                                @foreach ($rencanaButirKegiatan->laporanKegiatanJabatan->historyButirKegiatans as $historyButirKegiatan)
                                    <div class="timeline-item">
                                        @switch($historyButirKegiatan->status)
                                            @case(1)
                                                <div class="timeline-icon icon-item icon-item-lg text-yellow border-300">
                                                    <i class="fa-solid fa-spinner"></i>
                                                </div>
                                            @break

                                            @case(2)
                                                <div class="timeline-icon icon-item icon-item-lg text-red border-300">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </div>
                                            @break

                                            @case(3)
                                                <div class="timeline-icon icon-item icon-item-lg text-black border-300">
                                                    <i class="fa-solid fa-x"></i>
                                                </div>
                                            @break

                                            @case(4)
                                                <div class="timeline-icon icon-item icon-item-lg text-green border-300">
                                                    <i class="fa-solid fa-check"></i>
                                                </div>
                                            @break
                                        @endswitch
                                        <div class="row">
                                            <div class="col-lg-12 timeline-item-time">
                                                <div>
                                                    <p class="fs--1 mb-0 fw-semi-bold text-600">
                                                        {{ $historyButirKegiatan->keterangan }}
                                                    </p>
                                                    <p class="fs--2 text-600">
                                                        {{ $historyButirKegiatan->created_at->format('H:i:s') }} WIB,
                                                        {{ $historyButirKegiatan->created_at->format('d F Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="timeline-item-content">
                                                    <div class="timeline-item-card">
                                                        <h5 class="mb-2">{{ $historyButirKegiatan->keterangan }}</h5>
                                                        <p class="fs--1 mb-0">Most advanced dual‑camera system ever.
                                                            Durability
                                                            that’s front and center. And edge to edge. A lightning-fast
                                                            chip
                                                            that leaves the competition behind.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="timeline-item">
                                    <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                            class="fs-1 fas fa-fire"></span></div>
                                    <div class="row">
                                        <div class="col-lg-12 timeline-item-time">
                                            <div>
                                                <p class="fs--1 mb-0 fw-semi-bold">2010-2014</p>
                                                <p class="fs--2 text-600">03 April</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="timeline-item-content">
                                                <div class="timeline-item-card">
                                                    <h5 class="mb-2">iPad launched</h5>
                                                    <p class="fs--1 mb-0">Following on from the success of their iPhone
                                                        launches and the popularity of lighter, more portable laptops,
                                                        the
                                                        iPad was born in 2010, combining the best features of both
                                                        products.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="timeline-item">
                                <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                        class="fs-1 fas fa-book-open"></span></div>
                                <div class="row">
                                    <div class="col-lg-12 timeline-item-time">
                                        <div>
                                            <p class="fs--1 mb-0 fw-semi-bold">2008</p>
                                            <p class="fs--2 text-600">15 January</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="timeline-item-content">
                                            <div class="timeline-item-card">
                                                <h5 class="mb-2">MacBook Air released</h5>
                                                <p class="fs--1 mb-0">Along with releasing the next generation of the
                                                    iPhone, the iPhone 3G, Apple also released the MacBook Air which
                                                    would set the precedent across the industry for thinner, lighter
                                                    laptops. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                            class="fs-1 fas fa-rocket"></span></div>
                                    <div class="row">
                                        <div class="col-lg-12 timeline-item-time">
                                            <div>
                                                <p class="fs--1 mb-0 fw-semi-bold">2007</p>
                                                <p class="fs--2 text-600">01 January</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="timeline-item-content">
                                                <div class="timeline-item-card">
                                                    <h5 class="mb-2">First generation iphone</h5>
                                                    <p class="fs--1 mb-0">The first-generation iPhone was released with a
                                                        mere 4GB storage and would launch the company into a new portable
                                                        internet age of smartphones.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                            class="fs-1 fas fa-tint"></span></div>
                                    <div class="row">
                                        <div class="col-lg-12 timeline-item-time">
                                            <div>
                                                <p class="fs--1 mb-0 fw-semi-bold">1984</p>
                                                <p class="fs--2 text-600">24 April</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="timeline-item-content">
                                                <div class="timeline-item-card">
                                                    <h5 class="mb-2">Apple IIc &amp; The Mac</h5>
                                                    <p class="fs--1 mb-0">1984 saw the rise of the Apple IIc, the first
                                                        portable computer which was intended to be carried around but had no
                                                        battery, this meant that a power socket would need to be nearby for
                                                        you to use it.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span
                                            class="fs-1 fas fa-flag"></span></div>
                                    <div class="row">
                                        <div class="col-lg-12 timeline-item-time">
                                            <div>
                                                <p class="fs--1 mb-0 fw-semi-bold">1976</p>
                                                <p class="fs--2 text-600">01 July</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="timeline-item-content">
                                                <div class="timeline-item-card">
                                                    <h5 class="mb-2">Apple I was launched</h5>
                                                    <p class="fs--1 mb-0">July 1st, 1976 was when the Apple I was launched,
                                                        designed and built by Steve Wozniak, the co-founder of Apple.
                                                        However, it was Steve Jobs who had the idea to sell the computer and
                                                        it was there that the Apple empire was born.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-4">
                        <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                        <button type="button" data-rencana="{{ $rencanaButirKegiatan->id }}"
                            class="btn btn-blue px-5 revisi-kegiatan">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Kirim</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
