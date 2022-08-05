@extends('layouts.stisla.index', ['title' => 'Halaman Data P5M', 'page_heading' => 'Daftar P5M'])

@section('content')
<div class="card">

  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>×</span>
        </button>
        {{$errors->first()}}
      </div>
    </div>
  @endif

  @if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>×</span>
        </button>
        {{session()->get('sukses')}}
      </div>
    </div>
  @endif

  <div class="row">
    <div class="col-lg-12">

      <!-- <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#p5m_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button> -->

      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#excel_menu">
        Import
      </button> -->

      <a href="{{ route('excel.p5m.export') }}" class="btn btn-success float-right mt-3 mx-3" data-toggle="tooltip" title="Export Excel">Export File
        <i class="fas fa-fw fa-file-excel"></i>
      </a>

    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <!-- <th scope="col">ID P5M</th> -->
              <th scope="col">Materi</th>
              <th scope="col">Tanggal</th>
              <th scope="col">NRP</th>
              <th scope="col">Nama Pemateri</th>
              <th scope="col">Departemen</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Shift</th>
              <th scope="col">Photo</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($p5ms as $p5m)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
         
              <td>{{ Str::limit($p5m->materi, 55, '...') }}</td>
              <td>{{ $p5m->tanggal }}</td>
              <td>{{ $p5m->nrp }}</td>
              <td>{{ $p5m->nama_pegawai }}</td>
              <td>{{ $p5m->departemen }}</td>
              <td>{{ $p5m->lokasi }}</td>
              @if($p5m->condition === 1)
              <td>
                <span class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Shift 1">Shift 1</span>
              </td>
              @else
              <td>
                <span class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Shift 2">Shift 2</span>
              </td>
              @endif
              <td>{{ $p5m->photo_p5m }}</td>
              <td class="text-center">
                <a data-id="{{ $p5m->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#edit_p5m" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $p5m->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
<!-- @include('p5ms.modal.show') -->
@include('p5ms.modal.create')
@include('p5ms.modal.edit')
@include('p5ms.modal.import')
@endpush

@push('js')
@include('p5ms._script')
@endpush