<div class="col-md-12">
    <div class="form-floating">
        {!! Form::number('NISN',$NISN,['class' => 'form-control', 'id'=>'NISN','placeholder'=>'NISN','readonly']) !!}
      <label for="NISN">NISN</label>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row mb-3">
      <label for="inputNumber" class="col-form-label">Foto Profil</label>
      <div class="col-sm-12">
        {!! Form::file('image',['class'=>'form-control','id'=>'formFile']); !!}
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-floating">
        {!! Form::text('name',null,['class' => 'form-control', 'id'=>'validationTooltip03','placeholder'=>'Nama siswa','autocomplete'=>'off']) !!}
      <label for="floatingName">Nama siswa</label>
    </div>
  </div>
  <div class="col-md-8">
    <div class="form-floating">
        {!! Form::text('tempat_lahir',null,['class' => 'form-control', 'id'=>'floatingName','placeholder'=>'Tempat Lahir','autocomplete'=>'off']) !!}
      <label for="floatingName">Tempat Lahir</label>
    
    </div>
  </div>
  
  <div class="col-md-4">
    <div class="form-floating">
        {!! Form::date('tgl_lahir',null,['class' => 'form-control', 'id'=>'floatingName','placeholder'=>'Tanggal Lahir','autocomplete'=>'off']) !!}
      <label for="floatingName">Tanggal Lahir</label>
    </div>
  </div>
  <div class="col-md-6 d-flex justify-content-sm-between">
      <legend class="col-form-label pt-0" style="flex-basis: 200px;">Jenis Kelamin</legend>
  
      <div class="form-check">
          {!! Form::radio('jenis_kelamin','Laki-laki',null,['class'=>'form-chech-input','id'=>'jenis_kelamin1']) !!}
          <label class="form-check-label" for="jenis_kelamin1">
              Laki-Laki
          </label>
      </div>
      <div class="form-check">
          {!! Form::radio('jenis_kelamin','Perempuan',null,['class'=>'form-chech-input','id'=>'jenis_kelamin2']) !!}
          <label class="form-check-label" for="jenis_kelamin2">
              Perempuan
          </label>
      </div>
  
  </div>
  <div class="col-12">
    <div class="form-floating">
        {!! Form::textarea('alamat',null,['class'=>'form-control','id'=>'Alamat','placeholder'=>'Alamat','autocomplete'=>'off','style'=>"height: 70px;"]) !!}
      <label for="Alamat">Alamat</label>
    </div>
  </div>
  <div class="col-md-6">
    <div class="col-md-12">
      
      <label for="Kelas" class="form-label">Kelas</label>
          {!! Form::select('kelas_id',$dtkelas,null,['placeholder' => 'Pilih kelas..','class'=>"form-select js-example-basic-single1" , 'id'=>"Kelas"]) !!}
    </div>
  </div>
  <div class="col-md-6">
    <label for="jurusan" class="form-label">Jurusan</label>
    
      {!! Form::select('jurusan_id',$dtjurusan,null,['placeholder' => 'Pilih jurusan..','class'=>"form-select js-example-basic-single2" , 'id'=>"jurusan"]) !!}
  
  </div>
  <div class="col-md-12">
      <div class="form-floating">
          {!! Form::text('nama_wali',null,['class' => 'form-control', 'id'=>'floatingName','placeholder'=>'Nama walisiswa','autocomplete'=>'off']) !!}
        <label for="floatingName">Nama Walisiswa</label>
      </div>
      
  </div>
  <div class="col-md-6">
      <div class="form-floating">
          {!! Form::email('email',null,['class'=>'form-control','id'=>'floatingEmail','placeholder'=>'Email','autocomplete'=>'off']) !!}
          <label for="floatingEmail">Email</label>
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-floating">
          {!! Form::password('password',['class'=>'form-control','id'=>'floatingPassword','placeholder'=>'Password']) !!}
          <label for="floatingPassword">Password</label>
      </div>
  </div>