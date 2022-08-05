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
      <a href="{{ route('barang.print') }}" class="btn btn-success float-right mt-3 mx-3" data-toggle="tooltip" title="Print">
        <i class="fas fa-fw fa-print"></i>
      </a>

      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#commodity_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#excel_menu">
        Import
      </button>

      <a href="{{ route('excel.barang.export') }}" class="btn btn-success float-right mt-3 mx-3" data-toggle="tooltip" title="Export Excel">
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
            @foreach($commodities as $commodity)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
         
              <td>{{ Str::limit($commodity->name, 55, '...') }}</td>
              <td>{{ $commodity->date_of_purchase }}</td>
              <td>{{ $commodity->brand }}</td>
              <td>{{ $commodity->material }}</td>
              <td>{{ $commodity->item_code }}</td>
              <td>{{ $commodity->name }}</td>
              @if($commodity->condition === 1)
              <td>
                <span class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Shift 1">Shift 1</span>
              </td>
              @else
              <td>
                <span class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Shift 2">Shift 2</span>
              </td>
              @endif
              <td>{{ $commodity->note }}</td>
              <td class="text-center">
                <a data-id="{{ $commodity->id }}" class="btn btn-sm btn-info text-white show_modal" data-toggle="modal" data-target="#show_commodity" title="Lihat Detail">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $commodity->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#edit_commodity" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a href="{{ route('barang.print.one', $commodity->id) }}" class="btn btn-sm text-white btn-primary" data-toggle="tooltip" title="Print">
                  <i class="fas fa-fw fa-print"></i>
                </a>
                <a data-id="{{ $commodity->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('commodities.modal.show')
@include('commodities.modal.create')
@include('commodities.modal.edit')
@include('commodities.modal.import')
@endpush

@push('js')
@include('commodities._script')
@endpush