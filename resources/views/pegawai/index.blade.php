@extends('layouts.stisla.index', ['title' => 'Halaman Data Lokasi', 'page_heading' => 'List Pegawai'])

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
              <th scope="col">NRP</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Departemen</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($pegawais as $key => $peg)
            <tr>
              <td>{{ ($pegawais->currentpage()-1) * $pegawais->perpage() + $key + 1 }}</td>
              <td>{{ $peg->nrp_pegawai }}</td>
              <td>{{ $peg->nama_pegawai }}</td>
              <td>{{ $peg->jenis_kelamin }}</td>
              <td>{{ $peg->jabatan->jabatan }}</td>
              <td>{{ $peg->departement->departemen }}</td>
              <td>{{ $peg->lokasi->lokasi }}</td>
              <td>
                <a data-id="{{ $peg->id }}" data-nama_pegawai="{{ $peg->nama_pegawai }}" 
                  data-nrp_pegawai="{{ $peg->nrp_pegawai }}" data-jenis_kelamin="{{ $peg->jenis_kelamin }}" 
                  data-id_jabatan_pegawai="{{ $peg->id_jabatan_pegawai }}" data-id_departemen="{{ $peg->id_departemen }}" 
                  data-id_lokasi="{{ $peg->id_lokasi }}"
                  class="btn btn-sm btn-success text-white swal-edit-button" 
                  data-toggle="modal" data-target="#edit" 
                  data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $peg->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="modal" data-target="#delete" data-placement="top" title="Hapus data">
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
      {{$pegawais->links("pagination::bootstrap-4")}}
    </div>
  </div>
</div>

@endsection

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{ route('pegawai.update') }}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="id">
              <div class="modal-header">
                  <h5 class="modal-title">Ubah Data Pegawai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">   
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nrp_pegawai">NRP</label>
                            <input type="text" name="nrp_pegawai" class="form-control" id="nrp_pegawai">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="">~ Pilih Jenis Kelamin ~</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="id_departemen">Departemen</label>
                            <select class="custom-select" name="id_departemen" id="id_departemen">
                                <option selected>--Pilih Departemen--</option>
                                @foreach($departemens as $departemen)
                                <option value="{{ $departemen->id }}">{{ $departemen->departemen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="id_jabatan">Jabatan</label>
                            <select class="custom-select" name="id_jabatan_pegawai" id="id_jabatan_pegawai">
                                <option selected>--Pilih Jabatan--</option>
                                @foreach($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="id_lokasi">Lokasi</label>
                            <select class="custom-select" id="id_lokasi" name="id_lokasi">
                            <option selected>--Pilih Lokasi--</option>
                            @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->lokasi }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
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
          <form action="{{ route('pegawai.delete') }}" method="POST">
              @csrf
              @method('delete')
              <input type="hidden" name="id">
              <div class="modal-header">
                  <h5 class="modal-title">Hapus Pegawai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  Apakah Anda yakin ingin menghapus Data Pegawai ini ?
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
          <form action="{{ route('pegawai.store') }}" method="POST">
              @csrf
              <input type="hidden" name="id">
              <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Pegawai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="nrp_pegawai">NRP</label>
                          <input type="text" name="nrp_pegawai" class="form-control" id="nrp_pegawai">
                      </div>
                  </div>

                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="nama_pegawai">Nama Pegawai</label>
                          <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai">
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="jenis_kelamin">Jenis Kelamin</label>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                              <option value="">~ Pilih Jenis Kelamin ~</option>
                              <option value="pria">Pria</option>
                              <option value="wanita">Wanita</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="id_departemen">Departemen</label>
                          <select class="custom-select" name="id_departemen" id="id_departemen">
                              <option selected>--Pilih Departemen--</option>
                              @foreach($departemens as $departemens)
                              <option value="{{ $departemens->id }}">{{ $departemens->departemen }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="id_jabatan">Jabatan</label>
                          <select class="custom-select" name="id_jabatan_pegawai" id="id_jabatan_pegawai">
                              <option selected>--Pilih Jabatan--</option>
                              @foreach($jabatans as $jabatans)
                              <option value="{{ $jabatans->id }}">{{ $jabatans->jabatan }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="id_lokasi">Lokasi</label>
                          <select class="custom-select" id="id_lokasi" name="id_lokasi">
                          <option selected>--Pilih Lokasi--</option>
                          @foreach($locations as $locations)
                          <option value="{{ $locations->id }}">{{ $locations->lokasi }}</option>
                          @endforeach
                          </select>
                      </div>
                  </div>
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
        var nama_pegawai = $(e.relatedTarget).data('nama_pegawai');
        var nrp_pegawai = $(e.relatedTarget).data('nrp_pegawai');
        var jenis_kelamin = $(e.relatedTarget).data('jenis_kelamin');
        var id_jabatan_pegawai = $(e.relatedTarget).data('id_jabatan_pegawai');
        var id_departemen = $(e.relatedTarget).data('id_departemen');
        var id_lokasi = $(e.relatedTarget).data('id_lokasi');
        
        $('#edit').find('input[name="id"]').val(id);
        $('#edit').find('input[name="nama_pegawai"]').val(nama_pegawai);
        $('#edit').find('input[name="nrp_pegawai"]').val(nrp_pegawai);
        $('#edit').find('select[name="jenis_kelamin"]').val(jenis_kelamin);
        $('#edit').find('select[name="id_jabatan_pegawai"]').val(id_jabatan_pegawai);
        $('#edit').find('select[name="id_departemen"]').val(id_departemen);
        $('#edit').find('select[name="id_lokasi"]').val(id_lokasi);
        
    });
    
    $('#delete').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        console.log(id);
        $('#delete').find('input[name="id"]').val(id);
    });
</script>
@endpush