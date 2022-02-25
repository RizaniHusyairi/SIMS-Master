$('#semester').change(function(){
    $('#nilai-siswa').html('');
    
    const semester = $('#semester').val();
    $.get(`/walisiswa/getnilaimapel/${semester}`,function (data,status) {  
                $('#nilai-siswa').append(data);
            })
    })