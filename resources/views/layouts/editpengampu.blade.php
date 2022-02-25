<div class="d-flex justify-content-between mb-3" target-hps="nomor">
    <div class="col-10 form-floating">
        {!! Form::select('nopengampu',$guru,null,['placeholder'=>'Pilih pengampu','class'=>'form-select','id'=>"floatingSelect","required"]) !!}
      <label for="floatingSelect">Guru Pengampu</label> 
    </div>
    <div class="col-2 text-center align-self-center">
      <button class="btn btn-danger align-self-center" hps-id="nomor" type="button"><i class="fas fa-trash-alt"></i></button>
    </div>
  </div>