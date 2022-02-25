@extends('layouts.app')


@section('style')
  @include('layouts.style')
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
  <section class="section profile">
    <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ asset('storage/'.auth()->user()->guru->foto) }}" alt="{{ auth()->user()->name }}" class="rounded-circle">
              <h2>{{ auth()->user()->name }}</h2>
              <h3>{{ auth()->user()->role}}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>
                    @if(auth()->user()->guru->kelas_jurusan_id)
                    <div class="row">
                      <div class="col-lg-4 col-md-5 label ">Wali Kelas</div>
                      <div class="col-lg-8 col-md-7" id="walikelas">{{ auth()->user()->guru->kelas_jurusan->kelas->tingkat_kelas }} - {{ $guru->kelas_jurusan->jurusan->nama_jurusan }}</div>
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-lg-4 col-md-5 label ">NIP</div>
                      <div class="col-lg-8 col-md-7" id="NIP">{{ auth()->user()->guru->NIP }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
                      <div class="col-lg-8 col-md-7" id="nama_lengkap">{{ auth()->user()->name }}</div>
                    </div>
                    @if(auth()->user()->guru->gurumapel)
                    <div class="row">
                      <div class="col-lg-4 col-md-5 label">Pengampu Mapel</div>
                      <div class="col-lg-8 col-md-7" id="pengampu">
                        @foreach(auth()->user()->guru->gurumapel as $mapel)
                         - {{ $mapel->mapel->nama_mapel }} <br>
                        @endforeach
                      </div>
                    </div>
                    @endif
          
                    <div class="row">
                      <div class="col-lg-4 col-md-5 label">Tempat/Tanggal Lahir</div>
                      <div class="col-lg-8 col-md-7" id="TTL">{{ auth()->user()->guru->tempat_lahir.' / '.auth()->user()->guru->tgl_lahir}}</div>
                    </div>
          
                    <div class="row">
                      <div class="col-lg-4 col-md-5 label">Jenis Kelamin</div>
                      <div class="col-lg-8 col-md-7" id="J_kelamin">{{ auth()->user()->guru->jenis_kelamin }}</div>
                    </div>
          
                    <div class="row">
                      <div class="col-lg-4 col-md-5 label">Alamat</div>
                      <div class="col-lg-8 col-md-7" id="alamat">{{ auth()->user()->guru->alamat }}</div>
                    </div>
          
                    <div class="row">
                      <div class="col-lg-4 col-md-5 label">Email</div>
                      <div class="col-lg-8 col-md-7" id="email">{{ auth()->user()->email }}</div>
                    </div>
          

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                {!! Form::model(auth()->user()->guru,['url'=>'/guru/editprofile/'.auth()->user()->guru->id, 'method'=>'put','files' => true]) !!}
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Guru</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{ asset('storage/'.auth()->user()->guru->foto) }}" alt="{{ auth()->user()->name }}" class="img-preview">
                        <div class="pt-2">
                          <input type="file" id="foto-profile" style="display:none;" name="foto" onchange="previewImage()">
                          <label for="foto-profile" class="btn btn-primary btn-sm">
                              <i class="bi bi-upload text-white" ></i>
                          </label>
                        </div>
                      </div>
                    </div>

                    
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                          {!! Form::text('name',auth()->user()->name,['class'=>'form-control','id'=>'name','required']) !!}
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                      <div class="col-md-8 col-lg-9">
                          {!! Form::text('tempat_lahir',null,['class'=>'form-control','id'=>'tempat_lahir','required']) !!}
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-md-8 col-lg-9">
                          {!! Form::date('tgl_lahir',null,['class'=>'form-control','id'=>'tgl_lahir','required']) !!}
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis kelamin</label>
                      <div class="col-md-8 col-lg-9" style="display: contents">
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
                    </div>

                    <div class="row mb-3">
                      <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                          {!! Form::textarea('alamat',null,['class'=>'form-control','id'=>'alamat','required']) !!}
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="/guru/changePassword">
                    @csrf
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="current_password" type="password" class="form-control" id="currentPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewpassword" class="col-md-4 col-lg-3 col-form-label" required>Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
  </section>
</main>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{ asset('js/profilguru.js') }}"></script>
    @error('current_password')
        <script>
            Swal.fire(
                'Ubah Password Gagal',
                '{{ $errors->first("current_password") }}',
                'error'
            );
        </script>
    @enderror
    @error('password')
        <script>
            Swal.fire(
                'Ubah Password Gagal',
                '{{ $errors->first("password") }}',
                'error'
            );
        </script>
    @enderror
    @if(session()->has('success'))
        <script>
            Swal.fire(
                '{{ session("success") }}',
                '',
                'success'
            );
        </script>
    @endif
@endsection