$('.simpan-kegiatan').click(function (e) {
    e.preventDefault();
    var role_id = $('select[name="role_id"]').val();
    var unsur = $('input[name="unsur"]').val();
    result = [];
    $.each($('input[name="sub_unsur[]"]'), function (indexInArray, valueOfElement) {
        result.push({
            name: $(valueOfElement).val(),
            butir_kegiatans: $.map($(this.parentElement.parentElement
                .parentElement.parentElement).find(
                'input[name="butir_kegiatan[]"]'), function (
                elementOrValue, indexOrKey) {
                if ($(elementOrValue.parentElement.parentElement).find(
                        'input[name="angka_kredit[]"]')) {
                    return {
                        name: $(elementOrValue).val(),
                        angka_kredit: $($(elementOrValue.parentElement
                            .parentElement).find(
                            'input[name="angka_kredit[]"]')).val()
                    }
                } else {
                    return {
                        sub_butir_kegiatans: $.map($(elementOrValue)
                            .find(
                                'input[name="sub_butir_kegiatan[]"]'
                            ),
                            function (elementOrValue1, indexOrKey) {
                                return {
                                    name: $(elementOrValue1).val(),
                                    angka_kredit: $($(
                                            elementOrValue1
                                            .parentElement
                                            .parentElement)
                                        .find(
                                            'input[name="angka_kredit[]"]'
                                        )).val()
                                }
                            })
                    }
                }
            })
        })
    });
    $('.simpan-kegiatan span').hide();
    $('.simpan-kegiatan .spin').show();
    console.log(JSON.stringify(result));
    // $.ajax({
    //     type: "POST",
    //     url: "{{ route('kemendagri.cms.kegiatan-profesi.store') }}",
    //     data: {
    //         role_id: role_id,
    //         unsur: unsur,
    //         sub_unsurs: result
    //     },
    //     dataType: "json",
    //     success: function(response) {
    //         $('.simpan-kegiatan span').show();
    //         $('.simpan-kegiatan .spin').hide();
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
    //         }
    //     },
    //     error: function(err) {
    //         $('.simpan-kegiatan span').show();
    //         $('.simpan-kegiatan .spin').hide();
    //     }
    // });
});
