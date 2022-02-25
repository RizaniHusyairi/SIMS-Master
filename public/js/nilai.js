$('.hapus-absen').click(function () {
    let form = $(this).parent();
    Swal.fire({
        icon: 'question',
        title: 'Hapus absen?',
        text: 'Apa anda yakin akan menghapus Absen? ',
        showCancelButton:true,
        showConfirmButton:true,

    }).then((result)=>{
        if(result.isConfirmed){
            form.submit();
        }
    })  
})

$('#Kelas').change(function(){
    getnilaisiswa();
})

$('#Mapel').change(function(){
    getnilaisiswa();
})
$('#semester').change(function(){
    getnilaisiswa();
})

const getnilaisiswa = () => {
    $('#siswa').html('');
    
    const idkelas = $('#Kelas').val();
    const idmapel = $('#Mapel').val();
    const semester = $('#semester').val();
    const data = {
        idkelas,
        idmapel,
        semester
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    if (idkelas != "" && idmapel != "") {
        if (semester != "") {
            $.post(`/guru/getnilaisiswa/`,data,function (data,status) {  
                
                $('#siswa').append(data);
            })
        }
    }
}