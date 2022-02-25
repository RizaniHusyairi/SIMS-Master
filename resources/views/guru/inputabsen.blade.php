@extends('layouts.app')


@section('style')
  @include('layouts.style')

@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Presensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Presensi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Absen Siswa</h5>
        
                      <!-- Table with hoverable rows -->
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Hadir</th>
                            <th scope="col">Sakit</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Terlambat</th>
                            <th scope="col">Alpa</th>
                          </tr>
                        </thead>
                        {!! Form::open(['url'=>'/guru/absensi/'.$dtabsen->id,'method'=>'put']) !!}
                        <tbody>
                            @foreach($dtsiswa as $siswa)
                          <tr>
                            @include('layouts.formabsen')
                          </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <button type="submit" class="btn btn-primary">Simpan Absen</button>
                                    <a href="/guru/absensi" class="btn btn-secondary">Kembali</a>
                                </td>
                            </tr>
                        </tfoot>
                      </table>
                      <!-- End Table with hoverable rows -->
        
                    </div>
                  </div>
            </div>
        </div>
    </section>
    
  
</main>
@endsection

@section('script')
    @include('layouts.script')
@endsection