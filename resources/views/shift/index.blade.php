@extends('layouts.stisla.index', ['title' => 'Halaman Data Shift', 'page_heading' => 'Data Shift'])

@section('content')
@if($message = session()->get('success'))
<div class="alert alert-success alert-block d-flex d-inline justify-content-between p-1">
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#tambah">
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
              <th scope="col">Shift</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($shifts as $key => $shift)
            <tr>
              <td>{{ ($shifts->currentpage()-1) * $shifts->perpage() + $key + 1 }}</td>
              <td>{{ $shift->shift_code }}</td>
              <td>
                <a data-id="{{ $shift->id }}" data-shift="{{ $shift->shift_code }}"  class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#edit" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $shift->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="modal" data-target="#delete" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <br>
      {{$shifts->links("pagination::bootstrap-4")}}
    </div>
  </div>
</div>

@endsection


{{-- Modal data shift --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{ route('shift.update') }}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="id">
              <div class="modal-header">
                  <h5 class="modal-title">Ubah Data Shift</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="shift">Nama Shift</label>
                      <input type="text" class="form-control" name="shift_code" value="{{ old('shift_code') }}" required>
                      @error('shift_code')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                      @enderror
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{ route('shift.delete') }}" method="POST">
              @csrf
              @method('delete')
              <input type="hidden" name="id">
              <div class="modal-header">
                  <h5 class="modal-title">Hapus Lokasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  Apakah Anda yakin ingin menghapus Data Lokasi ini ?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Hapus</button>
              </div>
          </form>
      </div>
  </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{ route('shift.store') }}" method="POST">
              @csrf
              <input type="hidden" name="id">
              <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Shift</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="shift_code">Nama Lokasi</label>
                    <input type="text" class="form-control" name="shift_code" value="{{ old('shift_code') }}" required>
                    @error('shift_code')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>
@push('modal')
<script>
    $("#edit").on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var shift_code = $(e.relatedTarget).data('shift_code');
        
        $('#edit').find('input[name="id"]').val(id);
        $('#edit').find('input[name="shift_code"]').val(shift_code);
    });
    
    $('#delete').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        console.log(id);
        $('#delete').find('input[name="id"]').val(id);
    });
</script>
@endpush