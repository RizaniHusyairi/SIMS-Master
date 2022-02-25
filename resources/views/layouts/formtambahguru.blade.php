<div class="col-md-12">
    <div class="form-floating">
        {!! Form::number('NIP',$NIP,['class' => 'form-control', 'id'=>'NIP','placeholder'=>'NIP','readonly']) !!}
      <label for="NIP">NIP</label>
    </div>
    
  </div>
  <div class="col-md-12">
    <div class="row mb-3">
      <label for="inputNumber" class="col-form-label">Foto Profil</label>
      <div class="col-sm-12">
        {!! Form::file('image',['class'=>'form-control','id'=>'formFile']); !!}
        {{-- <input class="form-control" type="file" id="formFile"> --}}
      </div>
    </div>
  </div>
    <div class="col-md-12">
      <div class="form-floating">
          {!! Form::text('name',null,['class' => 'form-control'.(($errors->has('name'))?" border-danger":""), 'id'=>'validationTooltip03','placeholder'=>'Nama guru','autocomplete'=>'off']) !!}
        <label for="floatingName">Nama guru</label>
      </div>
      @error('name')
        <div class="invalid-feedback" style="display:block;">
          {{$errors->first('name')}}
        </div>     
      @enderror
    </div>
  <div class="col-md-8">
    <div class="form-floating">
        {!! Form::text('tempat_lahir',null,['class' => 'form-control'.(($errors->has('tempat_lahir'))?" border-danger":""), 'id'=>'floatingName','placeholder'=>'Tempat Lahir','autocomplete'=>'off']) !!}
      <label for="floatingName">Tempat Lahir</label>
    
    </div>
    @error('tempat_lahir')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('tempat_lahir')}}
      </div>     
    @enderror
  </div>
  
  <div class="col-md-4">
    <div class="form-floating">
        {!! Form::date('tgl_lahir',null,['class' => 'form-control'.(($errors->has('tgl_lahir'))?" border-danger":""), 'id'=>'floatingName','placeholder'=>'Tanggal Lahir','autocomplete'=>'off']) !!}
      <label for="floatingName">Tanggal Lahir</label>
    </div>
    @error('tgl_lahir')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('tgl_lahir')}}
      </div>     
    @enderror
  </div>
  <div class="col-md-6">
      <div class="d-flex justify-content-sm-between">
        <legend class="col-form-label pt-0" style="flex-basis: 200px;">Jenis Kelamin</legend>
    
        <div class="form-check">
            {!! Form::radio('jenis_kelamin','Laki-laki',null,['class'=>'form-check-input','id'=>'jenis_kelamin1']) !!}
            <label class="form-check-label" for="jenis_kelamin1">
                Laki-Laki
            </label>
        </div>
        <div class="form-check">
            {!! Form::radio('jenis_kelamin','Perempuan',null,['class'=>'form-check-input','id'=>'jenis_kelamin2']) !!}
            <label class="form-check-label" for="jenis_kelamin2">
                Perempuan
            </label>
        </div>
      
      </div>
      @error('jenis_kelamin')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('jenis_kelamin')}}
      </div>     
    @enderror

  </div>  
  <div class="col-12">
    <div class="form-floating">
        {!! Form::textarea('alamat',null,['class'=>'form-control'.(($errors->has('alamat'))?" border-danger":""),'id'=>'Alamat','placeholder'=>'Alamat','autocomplete'=>'off','style'=>"height: 70px;"]) !!}
      <label for="Alamat">Alamat</label>
    </div>
    @error('alamat')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('alamat')}}
      </div>     
    @enderror
  </div>
  
  <div class="col-md-6">
      <div class="form-floating">
          {!! Form::email('email',null,['class'=>'form-control'.(($errors->has('email'))?" border-danger":""),'id'=>'floatingEmail','placeholder'=>'Email','autocomplete'=>'off']) !!}
          <label for="floatingEmail">Email</label>
      </div>
    @error('email')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('email')}}
      </div>     
    @enderror
  </div>
  <div class="col-md-6">
      <div class="form-floating">
          {!! Form::password('password',['class'=>'form-control'.(($errors->has('password'))?" border-danger":""),'id'=>'floatingPassword','placeholder'=>'Password']) !!}
          <label for="floatingPassword">Password</label>
      </div>
      @error('password')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('password')}}
      </div>     
    @enderror
  </div>