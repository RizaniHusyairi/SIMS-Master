$('.edit-wali').click(function(){
    const idkelas = $(this).attr('kelas-id');

    $.get(`/admin/walikelas/${idkelas}`,function (data,status) {  
        $('#form-wali').html(data)
    })
    
})