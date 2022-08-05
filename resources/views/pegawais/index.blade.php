@extends('layouts.stisla.index', ['title' => 'Halaman Data pegawai', 'page_heading' => 'Daftar pegawai'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#pegawai_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>

    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NRP</th>
              <th scope="col">Nama</th>
              <th scope="col">Departemen</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pegawais as $pegawai)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $pegawai->nrp_pegawai }}</td>
              <td>{{ $pegawai->nama_pegawai }}</td>
              <td>{{ $pegawai->departement->departemen }}</td>
              <td>{{ $pegawai->jabatan->jabatan }}</td>
              <td>{{ $pegawai->lokasi->lokasi}}</td>
              <td class="text-center">
                <a data-id="{{ $pegawai->id }}" class="btn btn-sm btn-info text-white show_modal" data-toggle="modal" data-target="#show_pegawai">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $pegawai->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#pegawai_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $pegawai->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('pegawais.modal.create')
@include('pegawais.modal.show')
@include('pegawais.modal.edit')
@endpush

@push('js')
@include('pegawais._script')
@endpush