@extends('layouts.stisla.index', ['title' => 'Halaman Data Absensi', 'page_heading' => 'Data Absensi'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#inspeksi_create_modal">
        <i class="fas fa-file-excel"></i>
        Export Absen
      </button>
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#inspeksi_create_modal">
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
              <th scope="col">No.Peg</th>
              <th scope="col">Nama</th>
              <th scope="col">Satuan Kerja</th>
              <th scope="col">Hari</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Waktu</th>
              <th scope="col">Koordinat</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Foto</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Waktu</th>
              <th scope="col">Kooridnat</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Foto</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($inspeksis as $inspeksi)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $inspeksi->id_departemen }}</td>
              <td>{{ $inspeksi->id_inspek }}</td>
              <td>{{ $inspeksi->id_nama }}</td>
              <td>{{ $inspeksi->id_nrp }}</td>
              <td>{{ $inspeksi->tanggal }}</td>
              <td>{{ $inspeksi->id_lokasi }}</td>
              <td>{{ Str::limit($inspeksi->form_observasi, 55, '...') }}</td>
              <td>{{ $inspeksi->foto_deviasi }}</td>
              <td>{{ $inspeksi->created_date }}</td>
              <td class="text-center">
                <a data-id="{{ $inspeksi->id }}" class="btn btn-sm btn-info text-white show_modal" data-toggle="modal" data-target="#show_inspeksi">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $inspeksi->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#inspeksi_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $inspeksi->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('inspeksis.modal.create')
@include('inspeksis.modal.show')
@include('inspeksis.modal.edit')
@endpush

@push('js')
@include('inspeksis._script')
@endpush