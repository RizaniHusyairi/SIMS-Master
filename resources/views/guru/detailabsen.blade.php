@extends('layouts.app')


@section('style')
  @include('layouts.style')

@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Detail Presensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Detail Presensi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Presensi</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col" class="text-center">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dtsiswa as $siswa)                  
                  <tr>
                    <td>{{ $siswa->siswakelas->siswa->NISN}}</td>
                    <td>{{ $siswa->siswakelas->siswa->user->name }}</td>
                    @if($siswa->keterangan == "Hadir")
                    <td class="text-center text-white bg-success">
                    @elseif($siswa->keterangan == "Izin")
                    <td class="text-center text-white bg-info">
                    @elseif($siswa->keterangan == "Terlambat")
                    <td class="text-center text-white bg-secondary">
                    @elseif($siswa->keterangan == "Sakit")                    
                    <td class="text-center text-white bg-warning">
                    @elseif($siswa->keterangan == "Alpa")
                    <td class="text-center text-white bg-danger">
                    @endif
                      {{ $siswa->keterangan }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3">
                      <a href="/guru/absensi" class="btn btn-secondary">Kembali</a>

                    </td>
                  </tr>
                </tfoot>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
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