@extends('layouts.master')
@section('content')
    {{-- <input type="file" class="my-pond" name="filepond" />
    <form action="{{ route('coba.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" class="dropify" name="drop" data-height="300" />
        <input type="file" name="coba" id="">
        <button class="btn btn-primary">Submit</button>
    </form> --}}
    {{-- <iframe src="{{ asset('storage/produk.pdf') }}" width="100%" height="500px"></iframe> --}}
    <form action="{{ route('kemendagri.cms.kegiatan-profesi.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file_import" id="">
        <button type="submit" class="btn btn-green">Sweet</button>
    </form>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
@endsection
@section('js')
    <!-- include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        var drEvent = $('.dropify').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.filename + "\" ?");
        });
        drEvent.on('dropify.error.fileSize', function(event, element) {
            alert('Filesize error message!');
        });
        drEvent.on('dropify.error.minWidth', function(event, element) {
            alert('Min width error message!');
        });
        drEvent.on('dropify.error.maxWidth', function(event, element) {
            alert('Max width error message!');
        });
        drEvent.on('dropify.error.minHeight', function(event, element) {
            alert('Min height error message!');
        });
        drEvent.on('dropify.error.maxHeight', function(event, element) {
            alert('Max height error message!');
        });
        drEvent.on('dropify.error.imageFormat', function(event, element) {
            alert('Image format error message!');
        });
    </script>

    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script>
        $(function() {

            // First register any plugins
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            // Turn input element into a pond
            $('.my-pond').filepond();

            // Set allowMultiple property to true
            $('.my-pond').filepond('allowMultiple', true);

            // Listen for addfile event
            $('.my-pond').on('FilePond:addfile', function(e) {
                console.log('file added event', e);
            });

            // Manually add a file using the addfile method
            // $('.my-pond').first().filepond('addFile', 'index.html').then(function(file) {
            //     console.log('file added', file);
            // });

        });
        // sessionStorage.setItem("nama", "wahli");
        console.log(sessionStorage.getItem("nama"));
    </script>
@endsection
