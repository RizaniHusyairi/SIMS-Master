
  <div class="col-md-4">
    <div class="form-floating">
        {!! Form::text('nama_mapel',null,['class' => 'form-control'.(($errors->has('nama_mapel'))?" border-danger":""), 'id'=>'validationTooltip03','placeholder'=>'Nama Mata pelajaran','autocomplete'=>'off']) !!}
      <label for="floatingName">Nama Mata pelajaran</label>
    </div>
    @if ($errors->any())
    {{-- @dd($errors) --}}
     @foreach ($errors->all() as $error)
         {{-- <div>{{$error}}</div> --}}
     @endforeach
 @endif
    @error('nama_mapel')
    <div class="invalid-feedback" style="display:block;">
      {{$errors->first('nama_mapel')}}
    </div>     
  @enderror
  </div>
  <div class="col-md-4">
    <div class="form-floating">
      {!! Form::select('jurusan_id',$dtjurusan,null,['placeholder'=>"Jurusan",'class'=>"form-select".(($errors->has('jurusan_id'))?" border-danger":"") , 'id'=>"Mapel"]) !!}
      <label for="Jurusan">Jurusan</label>
    </div>
    @error('jurusan_id')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('jurusan_id')}}
      </div>     
    @enderror
  </div>
  <div class="col-md-4">
      <div class="form-floating">
          {!! Form::number('KKM',null,['class' => 'form-control'.(($errors->has('KKM'))?" border-danger":""), 'id'=>'KKM','placeholder'=>'Nilai KKM']) !!}
        <label for="KKM">Nilai KKM</label>
      </div>
      @error('KKM')
      <div class="invalid-feedback" style="display:block;">
        {{$errors->first('KKM')}}
      </div>     
    @enderror
    </div>
  