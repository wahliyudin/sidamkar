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
                            data-bs-target="#exampleModal">Tambah Informasi</button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form class="row">
                        <div class="col-md-12 mb-2">
                            <label for="judul" class="form-label">Judul Informasi</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Tujuan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tujuan" id="tujuan1"
                                    value="aparatur" checked>
                                Aparatur
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tujuan" id="tujuan2"
                                    value="kab/kota">
                                Kab/kota
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tujuan" id="tujuan3"
                                    value="provinsi">
                                Provinsi
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tujuan" id="tujuan4" value="semua">
                                Semua
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="formFile" class="form-label">File(Jika Ada)</label>
                                <input class="form-control" name="file" type="file" id="formFile">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        @media only screen and (min-width:801px) {
            .kanan {
                text-align: end;
            }
        }
    </style>
@endsection
