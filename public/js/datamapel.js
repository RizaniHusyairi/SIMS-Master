$('.hapus-mapel').click(function () {
    let form = $(this).parent();
    Swal.fire({
        icon: 'question',
        title: 'Hapus mapel?',
        text: 'Apa anda yakin akan menghapus data Mapel? ',
        showCancelButton:true,
        showConfirmButton:true,

    }).then((result)=>{
        if(result.isConfirmed){
            form.submit();
        }
    })  
})

$('.edit-pengampu').click(function(){
    $('.hapus-pengampu').click(function(){
        console.log($(this).parents());
    })
    const idmapel = $(this).attr('pengampu-id');
    const form = $('#pengampu').parent();
    $(form).attr('action',`/admin/inputpengampu/${idmapel}`);

    $.get(`/admin/ambilpengampu/${idmapel}`,function(datamapel,status){
        datamapel.forEach(function(item,index){
            $.get('/admin/tambahpengampu',function (data,status) {  
                $('#pengampu').append(data);
                $('[name=nopengampu]').attr('name',index+1);
                const option = $(`[name=${index+1}] option`);
                option.each(function(index,data){
                    if(data.value == item.guru_id)
                        $(data).attr('selected',true);
                    else{
                        $(data).removeAttr('selected');
                    }
                })
                $('[hps-id=nomor]').attr('hps-id',index+1);
                $('[target-hps=nomor]').attr('target-hps',index+1);

                $(`[hps-id=${index+1}]`).click(function () {  
                    $(`[target-hps=${index+1}]`).remove();

                })
                
            });

        });
    });
})
$('.tutup-form').click(function(){
    $('#pengampu').html('');
})

$('.tambah-pengampu').click(function(){
    $.get('/admin/tambahpengampu',function (data,status) {  
        $('#pengampu').append(data);
        const nameOp = $('#pengampu > div').length;
        $('[name=nopengampu]').attr('name',nameOp);
        $('[target-hps=nomor]').attr('target-hps',nameOp);
        $('[hps-id=nomor]').attr('hps-id',nameOp);
        $(`[hps-id=${nameOp}]`).click(function () {  
            $(`[target-hps=${nameOp}]`).remove();
        })



    })
})

