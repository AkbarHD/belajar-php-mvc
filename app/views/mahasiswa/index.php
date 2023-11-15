<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?> <!-- panggil fungsi flash dan method agar dia tanpil dsni  -->
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>


    <div class="row">
        <div class="col-5">
            <!-- Button trigger modal -->
            <form method="post" action="<?= BASEURL; ?>/mahasiswa/cari">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari apa cuy..." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit" id="button-addon2">Button</button>
                    </div>
                </div>
            </form>

            <h3 class="mt-3">Data Mahasiswa</h3>

            <ul class="list-group ">
                <?php foreach ($data["mhs"] as $mhs) : ?>
                    <li class="list-group-item ">
                        <?= $mhs["nama"]; ?>
                        <a class="badge badge-danger float-lg-right ml-1" onclick="return confirm('yakin?');" href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs["id"]; ?>">Hapus</a>
                        <a class="badge badge-success float-lg-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>" href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs["id"]; ?>">Edit</a>
                        <a class="badge badge-warning float-lg-right" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs["id"]; ?>">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Form Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post"> <!-- masi bingung dsni knp bisa ke mahasiswa/tambah -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                    </div>

                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" placeholder="Masukan NRP" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" required>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Pilih Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" required>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Ilmu Komputer">Ilmu Komputer</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>