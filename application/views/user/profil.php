<section class="produk1 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-header">
                                <b>Dashboard</b>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/profil/' . $user['id']) ?>">Profil</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/alamatProfil/' . $user['id']) ?>">Alamat</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/riwayat_trans/' . $user['id']) ?>">Riwayat Transaksi</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/ganti_password') ?>">Ganti Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="row">
                    <div class="col">
                        <h4>Profil</h4>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <?= $this->session->flashdata('message'); ?>
                    <input type="hidden" id="id" name="id" value="<?= $user['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Foto</label>
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" style="height: 100px; width: 100px">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label class="custom-file-label" for="foto">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="ubah" class="btn btn-info mt-2 float-right">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</section>