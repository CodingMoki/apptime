<!-- Modal -->
<div class="modal fade" id="pegawai_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pegawai.store') }}">
                    @csrf
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
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>