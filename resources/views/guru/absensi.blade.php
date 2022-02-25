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
        <a href="/guru/absensi/create" class="btn btn-primary mb-3">Tambah absen</a>
        <div class="row align-items-top">
        @foreach($dtabsen as $absen)

        <div class="col-lg-6">
            <!-- Card with header and footer -->
          <div class="card">
            <div class="card-header text-center">{{ $absen->mapel->nama_mapel }}</div>
            <div class="card-body">
              <h5 class="card-title">Pertemuan Ke - {{ $absen->pertemuan_ke }}</h5>
              
              <ul>
                  <li>Tanggal: {{ $absen->tgl }}</li>
                  <li>Waktu: {{ $absen->waktu }}</li>
                  <li>Kelas: {{ $absen->kelas_jurusan->kelas->tingkat_kelas }}</li>
                  <li>Jurusan: {{ $absen->kelas_jurusan->jurusan->nama_jurusan}}</li>
                  <li>Guru: {{ $absen->guru->user->name}}</li>
              </ul>
            
            </div>
            <div class="card-footer d-flex justify-content-around">
              @if(auth()->user()->guru->id == $absen->guru->id)
                @if($absen->telah_diisi)
                <a href="/guru/detailabsen/{{ $absen->id }}/edit" class="btn btn-warning text-white">Edit Absen</a>
                <a href="/guru/absensi/{{ $absen->id }}" class="btn btn-secondary text-white">Detail Absen</a>

                @else
                <a href="/guru/absensi/{{ $absen->id }}/edit" class="btn btn-warning text-white">Input Absen</a>
                @endif
              @endif
                {!! Form::open(['url' => '/guru/absensi/'.$absen->id , 'method' => 'delete']) !!}
                <button type="button" class="btn btn-danger text-white hapus-absen">Hapus Absen</button>
                {!! Form::close() !!}
              </div>
          </div><!-- End Card with header and footer -->

        </div>
        @endforeach
        </div>
    </section>
    
  
</main>
@endsection

@section('script')
    @include('layouts.script')
    <script>
      $('.hapus-absen').click(function () {
    let form = $(this).parent();
    Swal.fire({
        icon: 'question',
        title: 'Hapus absen?',
        text: 'Apa anda yakin akan menghapus Absen? ',
        showCancelButton:true,
        showConfirmButton:true,

    }).then((result)=>{
        if(result.isConfirmed){
            form.submit();
        }
    })  
})
    </script>
@endsection