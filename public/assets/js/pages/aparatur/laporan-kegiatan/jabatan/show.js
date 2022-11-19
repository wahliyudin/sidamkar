$(document).ready(function () {
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);

    var laporkan = FilePond.create(document.querySelector('input[name="doc_kegiatan_tmp[]"]'));
    laporkan.setOptions({
        server: {
            process: '/coba/tmp-file',
            revert: '/coba/revert',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
    });
});
