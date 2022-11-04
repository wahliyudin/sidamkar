@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="card my-3 p-3 shadow-sm">
            <div class=" card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h5>List Informasi</h5>
                    </div>
                    <div class="col-md-4 kanan">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahInformasi">Tambah Informasi</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex text-muted pt-3">
                    <p class="pb-3 mb-0  lh-sm border-bottom">
                        <strong class="d-block mb-1 ">[Role : Aparatur]</strong>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda fuga ipsum magnam natus corrupti
                        molestias porro repudiandae quisquam suscipit iusto nihil commodi, ad obcaecati id repellendus
                        voluptates facere? Quas, repellendus.
                    </p>
                </div>
                <div class="d-flex text-muted pt-3">
                    <p class="pb-3 mb-0  lh-sm border-bottom">
                        <strong class="d-block mb-1 ">[Role : Aparatur & Kab Kota]</strong>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda fuga ipsum magnam natus corrupti
                        molestias porro repudiandae quisquam suscipit iusto nihil commodi, ad obcaecati id repellendus
                        voluptates facere? Quas, repellendus.
                    </p>
                </div>
                <div class="d-flex text-muted pt-3">
                    <p class="pb-3 mb-0  lh-sm border-bottom">
                        <strong class="d-block mb-1 ">[Role : Semua User]</strong>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda fuga ipsum magnam natus corrupti
                        molestias porro repudiandae quisquam suscipit iusto nihil commodi, ad obcaecati id repellendus
                        voluptates facere? Quas, repellendus.
                    </p>
                </div>
                <small class="d-block text-end mt-3">
                    <a href="#" class="keychainify-checked">Selengkapnya</a>
                </small>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="tambahInformasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
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
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
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
                <button type="submit" class="btn btn-success simpan-informasi simpan">Simpan</button>
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
    <script src="{{ asset('assets/js/pages/cms/informasi/index.js') }}"></script>
@endsection
