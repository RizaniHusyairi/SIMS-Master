@extends('layouts.app')


@section('style')
  @include('layouts.style')
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lihat Presensi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Lihat Presensi</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Presensi</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Hadir</th>
                            <th scope="col" class="text-center">Sakit</th>
                            <th scope="col" class="text-center">Izin</th>
                            <th scope="col" class="text-center">Terlambat</th>
                            <th scope="col" class="text-center">Alpa</th>
                        </tr>
                      </thead>
                      <tbody id="nilai-siswa">
                        <tr>
                          <td>{{ auth()->user()->siswa->NISN }}</td>
                          <td>{{ auth()->user()->name }}</td>
                          <td align="center">{{ $hadir }}</td>
                          <td align="center">{{ $sakit }}</td>
                          <td align="center">{{ $izin }}</td>
                          <td align="center">{{ $terlambat }}</td>
                          <td align="center">{{ $alpa }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>  
            <div class="col-lg-12 justify-content-center">
              <h3 class="text-center">Riwayat Presensi</h3>
              
            </div> 


            @foreach($dtabsen as $absen)
    
            <div class="col-lg-6">
                <!-- Card with header and footer -->
              <div class="card">
                <div class="card-header text-center">{{ $absen->absensi->mapel->nama_mapel }}</div>
                <div class="card-body">

                  <h5 class="card-title">Pertemuan Ke - {{ $absen->absensi->pertemuan_ke }}</h5>
                  
                  <ul>
                      <li>Tanggal: {{ $absen->absensi->tgl }}</li>
                      <li>Waktu: {{ $absen->absensi->waktu }}</li>
                      <li>Kelas: {{ $absen->absensi->kelas_jurusan->kelas->tingkat_kelas }}</li>
                      <li>Jurusan: {{ $absen->absensi->kelas_jurusan->jurusan->nama_jurusan}}</li>
                      <li>Guru: {{ $absen->absensi->guru->user->name}}</li>
                  </ul>
                
                </div>
                @if($absen->keterangan == "Hadir")
                <div class="card-footer bg-success text-center">
                @elseif($absen->keterangan == "Izin")
                <div class="card-footer bg-info text-center">
                @elseif($absen->keterangan == "Terlambat")
                <div class="card-footer bg-secondary text-center">
                @elseif($absen->keterangan == "Sakit")                    
                <div class="card-footer bg-warning text-center">
                @elseif($absen->keterangan == "Alpa")
                <div class="card-footer bg-danger text-center">
                @endif
                    <span class="text-white">{{ $absen->keterangan }}</span>
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
@endsection