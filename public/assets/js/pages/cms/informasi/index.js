$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#tambahInformasi').on('click', '.simpan-informasi', function () {
        var judul = $('input[name="judul"]').val();
        if(judul == '' ){
            judul = null;
        }
        var deskripsi = $('textarea[name="deskripsi"]').val();
        if(deskripsi == ''){
            deskripsi = null
        }
        var role = [];
        $(':checkbox:checked').each(function(i){
            role[i] = $(this).val();
        });
        var file = $("#formFile").val();
        const data ={
            'judul' : judul,
            'deskripsi' : deskripsi,
            'role' : role,
            'file' : file
        } 
        $.ajax({
            type: "POST",
            url: url("/kemendagri/cms/informasi"),
            data: data,
            success: function (response) {
                console.log(response)
                // $('.simpan-kegiatan span').show();
                // $('.simpan-kegiatan .spin').hide();
                // if (response.status == 200) {
                //     Toastify({
                //         text: response.message,
                //         duration: 5000,
                //         close: true,
                //         gravity: "top",
                //         position: "right",
                //         backgroundColor: "#18b882",
                //     }).showToast()
                //     location.reload();
                // } else {
                //     swal('Error!', response.message, "error");
                // }
            },
        });
    })
});