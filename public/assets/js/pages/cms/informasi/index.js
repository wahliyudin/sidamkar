ClassicEditor
    .create( document.querySelector( '#editor' ), {
        
        toolbar: ['heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link', '|' , 'undo', 'redo', ]
    }).then( newEditor => {
        editor = newEditor;
    })
    .catch( error => {
        console.log( error );
    } );

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#tambahInformasi').on('click', '.simpan-informasi.simpan', function () {
        const editorData = editor.getData();
        console.log(editorData);
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
            'deskripsi' : editorData,
            'role' : role,
            'file' : file
        } 
        $('.simpan-informasi span').hide();
        $('.simpan-informasi .spin').show();
        $.ajax({
            type: "POST",
            url: url("/kemendagri/cms/informasi"),
            data: data,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    Toastify({
                        text: response.message,
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#18b882",
                    }).showToast()
                    location.reload();
                } else {
                    swal('Error!', response.message, "error",);
                    $('.swal2-confirm').click(function(){
                        $('.simpan-informasi span').show();
                        $('.simpan-informasi .spin').hide();
                    });
                }
            },
        });
    })
    $(".btn-tambah").on('click', function () {
        $('#tambahInformasi .modal-title').html('Tambah Informasi');
        $('input[name="judul"]').val(null);
        editor.setData('')
        $('.checkbox').prop('checked', false);
        $('.simpan-informasi').removeClass('update');
        $('.simpan-informasi').addClass('simpan');
        $('#tambahInformasi .modal-footer #simpan').html('Simpan');
    });
    $('.btn-edit-informasi').click(function (e) {
        e.preventDefault();
        $('.simpan-informasi').removeClass('simpan');
        $('.simpan-informasi').addClass('update');
        $('#tambahInformasi').modal('show');
        $('#tambahInformasi .modal-footer #simpan').html('Update');
        $('#tambahInformasi .modal-title').html('Edit Informasi');
        $('#tambahInformasi .bg-spin').show();
        const id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: url('/kemendagri/cms/informasi/' + id + '/edit'),
            success: function (response) {
            $('.simpan-informasi.update').attr('data-id', id);
            $('input[name="judul"]').val(response.data[0].judul);
            editor.setData(response.data[0].deskripsi)
            if(response.data[0].jenjang == 1){
                $('#tujuan1').prop('checked', true);
                $('#tujuan2').prop('checked', true);
                $('#tujuan3').prop('checked', true);
            }else if(response.data[0].jenjang == 2){
                $('#tujuan1').prop('checked', true);
                $('#tujuan2').prop('checked', false);
                $('#tujuan3').prop('checked', false);
            }else if(response.data[0].jenjang == 3){
                $('#tujuan1').prop('checked', false);
                $('#tujuan2').prop('checked', true);
                $('#tujuan3').prop('checked', false);
            }
            else if(response.data[0].jenjang == 4){
                $('#tujuan1').prop('checked', false);
                $('#tujuan2').prop('checked', false);
                $('#tujuan3').prop('checked', true);
            }
            else if(response.data[0].jenjang == 5){
                $('#tujuan1').prop('checked', true);
                $('#tujuan2').prop('checked', true);
                $('#tujuan3').prop('checked', false);
            } else if(response.data[0].jenjang == 6){
                $('#tujuan1').prop('checked', true);
                $('#tujuan2').prop('checked', false);
                $('#tujuan3').prop('checked', true);
            }else if(response.data[0].jenjang == 7){
                $('#tujuan1').prop('checked', false);
                $('#tujuan2').prop('checked', true);
                $('#tujuan3').prop('checked', true);
            }
            $('#tambahInformasi .bg-spin').hide();
            },
        });
    }); 

    $('#tambahInformasi').on('click', '.simpan-informasi.update', function () {
        var id = $(this).attr('data-id');
        const editorData = editor.getData();
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
            'deskripsi' : editorData,
            'role' : role,
            'file' : file
        } 
        $.ajax({
            type: "PUT",
            url: url("/kemendagri/cms/informasi/"+id+"/update"),
            data: data,
            success: function (response) {
                if (response.status == 200) {
                    Toastify({
                        text: response.message,
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#18b882",
                    }).showToast()
                    location.reload();
                } else {
                    swal('Error!', response.message, "error",);
                    $('.swal2-confirm').click(function(){
                        $('.simpan-informasi span').show();
                        $('.simpan-informasi .spin').hide();
                    });
                }
            },
        });
    })

    $('.btn-hapus-informasi').click(function (e) {
        var id = $(this).attr('data-id');
        console.log(id)
        $.ajax({
            type: "DELETE",
            url: url("/kemendagri/cms/informasi/"+id+"/destroy"),
            success: function (response) {
                if (response.status == 200) {
                console.log(response)
                location.reload();
                } else {
                    swal('Error!', response.message, "error",);
                    $('.swal2-confirm').click(function(){
                        $('.simpan-informasi span').show();
                        $('.simpan-informasi .spin').hide();
                    });
                }
            },
        });
    })
});