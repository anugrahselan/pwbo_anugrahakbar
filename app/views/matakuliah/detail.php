<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kode matakuliah</th>
                        <th scope="col">Nama Matakuliah</th>
                        <th scope="col">jenis Matakuliah</th>
                        <th scope="col">SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $data['matkul']['kode_mk']; ?></td>
                        <td><?php echo $data['matkul']['nama_mk']; ?></td>
                        <td><?php echo $data['matkul']['jns_mk']; ?></td>
                        <td><?php echo $data['matkul']['sks']; ?></td>
                        <td><a href="<?php echo BASEURL; ?>/matakuliah" class="card-link">Kembali</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>