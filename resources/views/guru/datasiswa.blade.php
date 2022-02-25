@extends('layouts.app')


@section('style')
  @include('layouts.style')
  <style>
    .foto-siswa{
      width: 100px;
      height: 100px;
    }
  </style>
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
  
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-md-between p-2">
              <h5 class="card-title">Data Siswa</h5>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">NISN</th>
                  <th scope="col">Name</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($dtsiswa as $siswa) 
              {{-- @dd($siswa->siswa->user) --}}
                <tr>
                  <th scope="row">
                    <img src="{{ asset('storage/'.$siswa->siswa->foto) }}" alt="{{ $siswa->siswa->user->name }}" class="img-fluid foto-siswa">  
                  </th>
                  <td>{{ $siswa->siswa->NISN }}</td>
                  <td>{{ $siswa->siswa->user->name }}</td>
                  <td>{{ $siswa->kelas_jurusan->kelas->tingkat_kelas }}</td>
                  <td>{{ $siswa->kelas_jurusan->jurusan->nama_jurusan }}</td>
                  <td>
                    <div class="d-flex justify-content-evenly">
                      <div data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <button class="btn btn-sm btn-secondary detail_siswa" data-id ="{{$siswa->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Siswa" ><i class="fas fa-info-circle"></i></button>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- Modal -->
<section class="profile">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="" alt="Profile" id="foto" class="rounded-circle">
            <h2 id="nama_siswa">Aprilia</h2>
            <h5>Siswa</h5>
            
          </div>
        </div>
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label ">NISN</div>
                  <div class="col-lg-8 col-md-7" id="NISN">1234</div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
                  <div class="col-lg-8 col-md-7" id="nama_lengkap">Kevin Anderson</div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Kelas</div>
                  <div class="col-lg-8 col-md-7" id="kelas">Lueilwitz, Wisoky and Leuschke</div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Jurusan</div>
                  <div class="col-lg-8 col-md-7" id="jurusan"></div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">TTL</div>
                  <div class="col-lg-8 col-md-7" id="TTL">USA</div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Jenis Kelamin</div>
                  <div class="col-lg-8 col-md-7" id="J_kelamin">Laki</div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Alamat</div>
                  <div class="col-lg-8 col-md-7" id="alamat">(436) 486-3538 x29071</div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Nama Wali</div>
                  <div class="col-lg-8 col-md-7" id="nama_wali"></div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Email</div>
                  <div class="col-lg-8 col-md-7" id="email">k.anderson@example.com</div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{  asset('js/datasiswa2.js') }}"></script>
@endsection