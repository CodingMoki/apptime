<!-- Modal -->
<div class="modal fade" id="p5m_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data P5M</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
        <form name="p5m_create">
          @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="name">Judul Materi</label>
                <input type="text" class="form-control" id="materi_create">
              </div>
  
        </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="pegawai">Nama Pemateri</label>
                <select class="custom-select" id="pegawai_create">
                  <option selected>Pilih</option>
                  @foreach($pegawais as $pegawais)
                  <option value="{{ $pegawais->nrp_pegawai }}">{{ $pegawais->nama_pegawai }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="departemens">Departemen</label>
                <select class="custom-select" id="departemens_id_create">
                  <option selected>Pilih</option>
                  @foreach($departemens as $departemens)
                  <option value="{{ $departemens->id }}">{{ $departemens->departemen }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="note">Upload File</label>
                <input type="file" class="form-control" id="note_create">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="condition">Shift</label>
                <select class="custom-select" id="condition_create">
                  <option selected>Pilih</option>
                  <option value="1">Shift 1</option>
                  <option value="2">Shift 2</option>
                </select>
              </div>
            </div>
          </div>
            
              <div class="row">
            
           
        
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>