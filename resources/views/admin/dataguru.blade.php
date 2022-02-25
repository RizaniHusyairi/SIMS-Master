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
      <h1>Data Guru</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Guru</li>
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
              <h5 class="card-title">Data Guru</h5>
              <a href="/admin/dataguru/create" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Tambah Guru</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">NIP</th>
                  <th scope="col">Nama Guru</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dtguru as $guru)
                <tr>
                  <th scope="row">
                    <img src={{ asset("storage/".$guru->foto) }} alt="{{ $guru->user->name }}" class="img-fluid foto-guru">
                  </th>
                  <th >{{ $guru->NIP }}</th>
                  <td>{{ $guru->user->name }}</td>
                  <td >
                    <div class="d-flex justify-content-lg-evenly">
                      <div data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <button data-id="{{ $guru->id }}" class="btn btn-sm btn-secondary detail_guru" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Guru"><i class="fas fa-info-circle"></i></button>
                      </div>
  
                      <a href="/admin/dataguru/{{ $guru->id }}/edit" class="text-white btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Guru"><i class="fas fa-user-edit"></i></a>
                      {!! Form::open(['url' => '/admin/dataguru/'.$guru->id , 'method' => 'delete']) !!}
                      <button type="button" class="btn btn-sm btn-danger hapus_guru" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Guru"><i class="fas fa-trash-alt"></i></button>
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
<section class="profile">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Guru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="detail">
          
  
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
    <script src="{{ asset('js/dataguru.js') }}"></script>
@endsection