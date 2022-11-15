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
    $('#tambahInformasi').on('click', '.simpan-informasi', function () {
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
        // $.ajax({
        //     type: "POST",
        //     url: url("/kemendagri/cms/informasi"),
        //     data: data,
        //     success: function (response) {
        //         console.log(response)
        //         if (response.status == 200) {
        //             Toastify({
        //                 text: response.message,
        //                 duration: 5000,
        //                 close: true,
        //                 gravity: "top",
        //                 position: "right",
        //                 backgroundColor: "#18b882",
        //             }).showToast()
        //             location.reload();
        //         } else {
                  
        //             swal('Error!', response.message, "error",);
        //             $('.swal2-confirm').click(function(){
        //                 $('.simpan-informasi span').show();
        //                 $('.simpan-informasi .spin').hide();
        //           });
        //         }
        //     },
        // });
    })
    $('.btn-edit-informasi').click(function (e) {
        e.preventDefault();
        $('#tambahInformasi').modal('show');
        $('#tambahInformasi .modal-title').html('Edit Informasi');
        $('#tambahInformasi .bg-spin').show();
        const id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: url('/kemendagri/cms/informasi/' + id + '/edit'),
            success: function (response) {
            $('#tambahInformasi .bg-spin').hide();
            $('input[name="judul"]').val(response.data[0].judul);
            editor.setData(response.data[0].deskripsi)
            },
        });
    });
});