$('#Kelas').change(function(){
    const idkelas = $('#Kelas').val();
    const idmapel = $('#Mapel').val();
    const data = {
        idkelas,
        idmapel
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    if (idkelas != "" && idmapel != "") {
        $.post(`/guru/pertemuan/`,data,function (data,status) {  
            $('#pertemuan').val(data);
        })
    }
})
$('#Mapel').change(function(){
    const idkelas = $('#Kelas').val();
    const idmapel = $('#Mapel').val();
    const data = {
        idkelas,
        idmapel
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    if (idkelas != "" && idmapel != "") {
        $.post(`/guru/pertemuan/`,data,function (data,status) {  
            $('#pertemuan').val(data);
        })
    }
})
