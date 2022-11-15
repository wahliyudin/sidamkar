@extends('layouts.master')

@section('content')
<style>
    .ck-editor__editable {
    min-height: 150px !important;
    max-height: 160px !important;
}
</style>
<div class="section">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end flex-wrap wrapper-btn">
                    <button class="btn btn-blue-reverse ms-3 btn-tambah" data-bs-toggle="modal"
                        data-bs-target="#tambahInformasi"><i class="fa-solid fa-file-circle-plus me-2"></i>Tambah
                        Data</button>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="card-body accordion-container">
                    <div class="accordion" id="accordion-parent">
                        @foreach ($informasis as $informasi)
                            <div class="accordion-item">
                                <div class="d-flex flex-column accordion-header py-3 px-2"
                                    id="unsur{{ $informasi->id }}">
                                    <div class="d-flex justify-content-between align-items-center ps-2 mb-1">
                                        <span
                                            class="bg-green text-sm text-white font-bold py-1 px-2 rounded-md label-role">
                                            {{ $informasi->jenjang}}
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <i class="fa-regular fa-pen-to-square me-2 cursor-pointer text-green btn-edit-informasi"
                                                data-id="{{ $informasi->id }}" id="edit-informasi-id"></i>
                                            <i class="fa-solid fa-trash-can me-2 cursor-pointer text-red btn-hapus-kegiatan"
                                                data-id="{{ $informasi->id }}"></i>
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#contentUnsur{{ $informasi->id }}" aria-expanded="false"
                                                aria-controls="contentUnsur{{ $informasi->id }}">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="ps-2 pt-2">
                                        <h6 class="accordian-title" style="color: #000000;">{{ $informasi->judul }}</h6>
                                    </div>
                                </div>
                                <div id="contentUnsur{{ $informasi->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="informasi{{ $informasi->id }}" style="">
                                    <div class="accordion-body pt-0">
                                        <div class="accordion" id="accordion-child">
                                                <div class="accordion-item">
                                                    <div class="d-flex justify-content-between accordion-header py-1 px-2"
                                                        id="deskripsi{{ $informasi->id }}">
                                                        <div class="d-flex align-items-center" style="color: #000000;">
                                                            {!! $informasi->deskripsi !!}
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahInformasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
      <div class="modal-content relative">
        <div class="bg-spin" style="display: none;">
            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                style="height: 3rem; object-fit: cover;" alt="" srcset="">
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            
            <form class="row" method="post" enctype="multipart/form-data">
                <div class="col-md-12 mb-2">
                  <label for="judul" class="form-label">Judul Informasi</label>
                  <input type="text" class="form-control" id="judul" name="judul" >
                </div>
                <div class="col-md-12 mb-2">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="editor"></textarea>
                </div>
                  <div class="col-md-12 mb-2">
                    <label>Tujuan</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="tujuan[]" id="tujuan1" value="aparatur">
                        Aparatur
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tujuan[]" id="tujuan2" value="8" >
                        Kab/kota
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tujuan[]" id="tujuan3" value="9" >
                        Provinsi
                    </div>
                    
                    <div class="col-md-12 mb-2">
                        <label for="formFile" class="form-label">File(Jika Ada)</label>
                        <input class="form-control" name="file" type="file" id="formFile">
                    </div>
                </div>
                </form>
            </div>
        </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success simpan-informasi simpan">
                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                    style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                    <span>Simpan</span>
                </button>
            </div>
    </div>
  </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/kemendagri.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    {{-- <script src="{{ asset('assets/js/pages/ckeditor.js') }}"></script> --}}
    <script src="{{ asset('assets/js/pages/cms/informasi/index.js') }}"></script>
@endsection
