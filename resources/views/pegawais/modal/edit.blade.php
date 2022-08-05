<!-- Modal -->
<div class="modal fade" id="pegawai_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="pegawai_edit">
          @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai_edit">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label for="description">NRP Pegawai</label>
                <textarea name="nrp_pegawai" class="form-control" id="nrp_pegawai_edit" cols="30" rows="10"></textarea>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
              <div class="form-group">
                <label for="jabatan_pegawai">Jabatan Pegawai</label>
                <select class="custom-select" id="id_jabatan_pegawai_edit">
                                    <option selected>Pilih</option>
                                    @foreach($jabatans as $jabatans)
                  <option value="{{ $jabatans->id }}">{{ $jabatans->jabatan }}</option>
                  @endforeach
                                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" data-id="" id="swal-update-button" class="btn btn-primary">Ubah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>