
$('.hapus_guru').click(function () {

    let form = $(this).parent();
    Swal.fire({
        icon: 'question',
        title: 'Hapus guru?',
        text: 'Apa anda yakin akan menghapus data guru? ',
        showCancelButton:true,
        showConfirmButton:true,

    }).then((result)=>{
        if(result.isConfirmed){
            form.submit();
        }
    })  
})

$('.detail_guru').click(function(){
    let idguru = $(this).attr('data-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.get(`/admin/dataguru/${idguru}`,{},function (data,status) {
        console.log(data);
        $('#detail').html(data);
    });
})