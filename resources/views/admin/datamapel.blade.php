@extends('layouts.app')


@section('style')
  @include('layouts.style')
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Mata Pelajaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Mapel</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
  
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
            
              @endif
            <div class="d-flex justify-content-md-between p-2">
              <h5 class="card-title">Data Mata pelajaran</h5>
              <a href="/admin/datamapel/create" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Tambah Mapel</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Mata Pelajaran</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Nilai KKM</th>
                  <th scope="col" class="text-center">Guru Pengampu</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dtmapel as $mapel)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $mapel->nama_mapel }}</td>
                  <td>{{ $mapel->jurusan->nama_jurusan }}</td>
                  <td>{{ $mapel->KKM }}</td>
                  <td>
                    @if($mapel->gurumapel)
                      @foreach($mapel->gurumapel as $pengampu)
                        <span>- {{ $pengampu->guru->user->name }}</span> <br>
                      @endforeach
                    @endif                    
                  </td>
                  <td >
                    <div class="d-flex justify-content-lg-evenly"> 
                      <div data-bs-toggle="modal" data-bs-target="#editpengampu">
                        <button class="btn btn-sm btn-info text-white edit-pengampu" pengampu-id = "{{ $mapel->id }}"  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Pengampu"><i class="fas fa-address-book"></i></button>
                      </div>
                      <a href="/admin/datamapel/{{ $mapel->id }}/edit" class="text-white btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Mapel"><i class="fas fa-user-edit"></i></a>
                      {!! Form::open(['url' => '/admin/datamapel/'.$mapel->id , 'method' => 'delete']) !!}
                      <button type="button" class="btn btn-sm btn-danger hapus-mapel" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Mapel"><i class="fas fa-trash-alt"></i></button>
                      {!! Form::close() !!}

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
<div class="modal fade" id="editpengampu" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengampu</h5>
        <button type="button" class="btn-close tutup-form" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <form action="/admin/inputpengampu" method="post">
          @csrf
          @method('put')
          <div id="pengampu">

          </div>
        <div class="text-center">
          <button class="btn btn-primary tambah-pengampu" type="button"><i class="fas fa-plus"></i> Tambah Pengampu</button>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tutup-form" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{ asset('js/datamapel.js') }}"></script>
@endsection