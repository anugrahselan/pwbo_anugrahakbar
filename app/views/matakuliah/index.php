<div class="container mt-4">
  <div class="row">
    <div class="col-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
        Tambah Data Matakuliah
      </button>
      <h3>Daftar Matakuliah</h3>
      <ul class="list-group">
        <?php foreach ($data['matkul'] as $matkul): ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $matkul['nama_mk']; ?>
            <a href="<?php echo BASEURL; ?>/matakuliah/detail/<?php echo $matkul['id']; ?>" class="badge badge-primary">
              detail
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo BASEURL; ?>/matakuliah/tambah" method="post">
          <div class="form-group">
            <label for="kode_mk">Kode Matkul</label>
            <input type="text" class="form-control" id="kode_mk" name="kode_mk">
          </div>
          <div class="form-group">
            <label for="nama_mk">Nama Matkul</label>
            <input type="text" class="form-control" id="nama_mk" name="nama_mk">
          </div>
          <div class="form-group">
            <label for="jns_mk">Jenis Matkul</label>
            <select class="form-control" name="jns_mk" id="jns_mk">
              <option value="Wajib">Wajib</option>
              <option value="Peminatan">Peminatan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="sks">Sks</label>
            <input type="text" class="form-control" id="sks" name="sks">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>