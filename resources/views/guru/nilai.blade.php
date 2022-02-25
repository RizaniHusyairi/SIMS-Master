@extends('layouts.app')


@section('style')
  @include('layouts.style')

@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Nilai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Nilai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      
        <div class="row">
          <div class="col-md-4 ">
            <div class="form-floating">
              {!! Form::select('kelas_id',$dtkelas,null,['placeholder'=>'Pilih Kelas','class'=>'form-select','id'=>"Kelas"]) !!}
              <label for="floatingSelect">Kelas</label> 
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              {!! Form::select('mapel_id',$dtmapel,null,['placeholder'=>'Pilih Mata pelajaran','class'=>'form-select','id'=>"Mapel"]) !!}
            <label for="floatingSelect">Mata pelajaran</label> 
          </div>
        </div>
          <div class="col-md-4">
            <div class="form-floating">
              {!! Form::select('semester',[1=>1,2=>2],null,['placeholder'=>'Pilih Semester','class'=>'form-select','id'=>"semester"]) !!}
            <label for="floatingSelect">Semester</label> 
          </div>
        </div>
          <div class="col-lg-12 mt-2">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Nilai </h5>
  
                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">Name</th>
                      <th scope="col">Tugas 1</th>
                      <th scope="col">Tugas 2</th>
                      <th scope="col">Tugas 3</th>
                      <th scope="col">Tugas 4</th>
                      <th scope="col">Tugas 5</th>
                      <th scope="col">UTS</th>
                      <th scope="col">UAS</th>
                      <th scope="col">Nilai Akhir</th>
                      <th scope="col">KKM</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="siswa">

                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>  
        </div>
    </section>
    
  
</main>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{ asset('js/nilai.js') }}"></script>
@endsection