@extends('layouts.app')


@section('style')
  @include('layouts.style')
  <style>
    .foto-guru{
      width: 100px;
      height: 100px;
    }
  </style>
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
          {{-- <div class="col-md-4">
            
        </div> --}}
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-md-between p-2">
              <h5 class="card-title">Data Nilai</h5>
              <div class="form-floating">
                {!! Form::select('semester',[1=>1,2=>2],null,['placeholder'=>'Pilih Semester','class'=>'form-select','id'=>"semester"]) !!}
              <label for="floatingSelect">Semester</label> 
            </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Mapel</th>
                  <th scope="col">Tugas 1</th>
                  <th scope="col">Tugas 2</th>
                  <th scope="col">Tugas 3</th>
                  <th scope="col">Tugas 4</th>
                  <th scope="col">Tugas 5</th>
                  <th scope="col">UTS</th>
                  <th scope="col">UAS</th>
                  <th scope="col">Nilai Akhir</th>
                  <th scope="col">KKM</th>
                </tr>
              </thead>
              <tbody id="nilai-siswa">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{ asset('js/nilaisiswa.js') }}"></script>
@endsection