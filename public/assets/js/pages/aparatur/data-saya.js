$(document).ready(function () {
    $('.jenis_kelamin').select2();
    $('.provinsi_id').select2();
    $('.kab_kota_id').select2();
    $('.pen_terakhir').select2();
    $('.pangkat_golongan').select2();
    $('select[name="mekanisme_pengangkatan_id"]').select2();

    // $('select[name="mekanisme_pengangkatan_id"]').change(function (e) {
    //     e.preventDefault();
    //     if ($(this).val() == 4) {
    //         $('.mekanisme-angka').show();
    //         $('.mekanisme-status').show();
    //         $('.mekanisme-status').css('display', 'flex');
    //     } else {
    //         $('.mekanisme-angka').hide();
    //         $('.mekanisme-status').hide();
    //         $('.mekanisme-status').css('display', 'none');
    //     }
    // });
});
