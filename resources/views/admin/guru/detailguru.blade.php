@php
$nama_panggil = explode(" ",$guru->user->name);    
@endphp
<div class="card">
    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

      <img src="{{ asset('storage/'.$guru->foto) }}" alt="{{ $guru->user->name }}" id="foto" class="rounded-circle">
      <h2 id="nama_guru">{{ $nama_panggil[0] }}</h2>
      <h5>Guru</h5>
      
    </div>
  </div>
  <div class="card">
    <div class="card-body pt-3">
      <!-- Bordered Tabs -->
      <div class="tab-content pt-2">

        <div class="tab-pane fade show active profile-overview" id="profile-overview">
          <h5 class="card-title">Profile Details</h5>
          @if($guru->kelas_jurusan_id)
          <div class="row">
            <div class="col-lg-4 col-md-5 label ">Wali Kelas</div>
            <div class="col-lg-8 col-md-7" id="walikelas">{{ $guru->kelas_jurusan->kelas->tingkat_kelas }} - {{ $guru->kelas_jurusan->jurusan->nama_jurusan }}</div>
          </div>
          @endif
          <div class="row">
            <div class="col-lg-4 col-md-5 label ">NIP</div>
            <div class="col-lg-8 col-md-7" id="NIP">{{ $guru->NIP }}</div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
            <div class="col-lg-8 col-md-7" id="nama_lengkap">{{ $guru->user->name }}</div>
          </div>
          @if($guru->gurumapel->count() > 0)
          <div class="row">
            <div class="col-lg-4 col-md-5 label">Pengampu Mapel</div>
            <div class="col-lg-8 col-md-7" id="pengampu">
              @foreach($guru->gurumapel as $mapel)
              - {{ $mapel->mapel->nama_mapel }} <br>
              @endforeach
            </div>
          </div>
          @endif

          <div class="row">
            <div class="col-lg-4 col-md-5 label">Tempat/Tanggal Lahir</div>
            <div class="col-lg-8 col-md-7" id="TTL">{{ $guru->tempat_lahir.' / '.$guru->tgl_lahir}}</div>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-5 label">Jenis Kelamin</div>
            <div class="col-lg-8 col-md-7" id="J_kelamin">{{ $guru->jenis_kelamin }}</div>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-5 label">Alamat</div>
            <div class="col-lg-8 col-md-7" id="alamat">{{ $guru->alamat }}</div>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-5 label">Email</div>
            <div class="col-lg-8 col-md-7" id="email">{{ $guru->user->email }}</div>
          </div>

        </div>
      </div>
    </div>
  </div>