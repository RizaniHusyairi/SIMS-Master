$('form input').change(function(){
    const input = this;
    const parent = $(this).parents()[1];
    const span = parent.getElementsByTagName('span')[0];
    if ($(this).val() > 100) {
        $(input).attr('class','form-control border-danger')
        $(span).attr('style','display:block;');        
    }else{
        $(input).removeClass('border-danger')
        $(span).attr('style','display:none;');        
    }
})

$('#submit-btn').click(function(){
    let valid = true;
    $('form input.form-control').each(function(i,data){
        if($(data).val() > 100){
            valid = false;
        }
    });
    if (valid) {
        $('#form_nilai').submit();
    }
})

