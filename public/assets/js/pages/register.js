$(document).ready(function () {
    $('.nav-link').each(function (index, element) {
        if (localStorage.getItem('tab_active') != undefined) {
            if (localStorage.getItem('tab_active') == $(element).data('id')) {
                $(element).addClass('active');
                $($('.tab-content').find('#' + $(element).data('id'))).addClass('show active');
            } else {
                $(element).removeClass('active');
                $($('.tab-content').find('#' + $(element).data('id'))).removeClass('show active');
            }
        }
        $(element).click(function (e) {
            e.preventDefault();
            window.localStorage.setItem('tab_active', $(this).data('id'))
        });
    });

    $('select[name="tingkat_aparatur"]').change(function (e) {
        e.preventDefault();
        if ($(this).val() == 'provinsi') {
            $('.kab-kota-aparatur').hide();
        } else {
            $('.kab-kota-aparatur').show();
        }
    });

    $('select[name="jenis_jabatan"]').each(function (index, element) {
        $(element).change(function (e) {
            e.preventDefault();
            if ($(this).val() == 'provinsi') {
                $('.is_kab_kota').hide();
            } else {
                $('.is_kab_kota').show();
            }
        });
    });

    $('select[name="jenis_jabatan_umum"]').change(function (e) {
        e.preventDefault();
        if ($(this).val() == 'lainnya') {
            $('.jenis-jabatan-text').show();
        } else {
            $('.jenis-jabatan-text').hide();
        }
    });
});
$(function () {
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.create(document.querySelector('input[name="file_ttd"]'), {
        chunkUploads: true,
        acceptedFileTypes: [
            'image/png',
            'image/jpeg'
        ]
    });
    FilePond.create(document.querySelector('input[name="file_permohonan"]'), {
        chunkUploads: true,
        acceptedFileTypes: [
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/doc',
            'application/pdf',
            '.docx'
        ]
    });
    FilePond.setOptions({
        server: {
            process: '/register/file',
            revert: '/register/revert',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
    });

    $('select[name="provinsi_id"]').each(function (index, element) {
        $(element).change(function (e) {
            e.preventDefault();
            window.localStorage.setItem('provinsi', $(element).data('id'));
            loadKabKota(this.value, $(element.parentElement.parentElement.parentElement)
                .find('#kab_kota_id'))
        });
    });

    function loadKabKota(val, kabupaten, kabupaten_id = null) {
        return new Promise(resolve => {
            $(kabupaten).html('<option value="">Memuat...</option>');
            fetch('/api/kab-kota/' + val)
                .then(res => res.json())
                .then(res => {
                    $(kabupaten).html(
                        '<option selected disabled>- Pilih Kabupaten / Kota -</option>');
                    res.forEach(model => {
                        var selected = kabupaten_id == model.id ? 'selected=""' : '';
                        $(kabupaten).append('<option value="' + model.id + '" ' +
                            selected + '>' + model.nama + '</option>');
                    })
                    resolve()
                })
        })
    }

    $('select[name="jenis_aparatur"]').change(function (e) {
        e.preventDefault();
        window.localStorage.setItem('jenis_aparatur', e.target.value)
        if ($('.wrapper-select').css('display') == 'none') {
            $('.wrapper-select').show();
            $('.jenis-eselon').hide();
            $('.jenis-jabatan-umum').hide();
        }
        if (e.target.value == 'struktural') {
            $('.jenis-jabatan').hide();
            $('.jenis-eselon').show();
            $('.jenis-jabatan-umum').hide();
        }
        if (e.target.value == 'fungsional') {
            $('.struktural').hide();
            $('.select-struktural').hide();
            $('.select-fungsional').show();
            $('.jenis-eselon').hide();
            $('.jenis-jabatan-umum').hide();
        }
        if (e.target.value == 'fungsional_umum') {
            $('.jenis-jabatan-umum').show();
            $('.jenis-jabatan').hide();
        }
    });

    $('.jenis-jabatan-kabkota').change(function (e) {
        e.preventDefault();
        if (e.target.value == 'provinsi') {
            $('.kabkota-kabkota').hide();
        }
        if (e.target.value == 'kab_kota') {
            $('.kabkota-kabkota').show();
        }
    });

    if (localStorage.getItem('jenis_aparatur') !== '') {
        $('select[name="jenis_aparatur"]').val(localStorage.getItem('jenis_aparatur'));
        if ($('.wrapper-select').css('display') == 'none') {
            $('.wrapper-select').show();
            $('.jenis-eselon').hide();
            $('.jenis-jabatan-umum').hide();
        }
        if (localStorage.getItem('jenis_aparatur') == 'struktural') {
            $('.jenis-jabatan').hide();
            $('.jenis-eselon').show();
            $('.jenis-jabatan-umum').hide();
        }
        if (localStorage.getItem('jenis_aparatur') == 'fungsional') {
            $('.struktural').hide();
            $('.jenis-eselon').hide();
            $('.select-struktural').hide();
            $('.select-fungsional').show();
            $('.jenis-jabatan-umum').hide();
        }
        if (localStorage.getItem('jenis_aparatur') == 'fungsional_umum') {
            $('.jenis-jabatan-umum').show();
            $('.jenis-jabatan').hide();
        }
    }
});
