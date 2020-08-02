<section class="produk1 mt-5">
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
            <div class="col-lg-8 offset-lg-1">
                <div class="row">
                    <div class="col">
                        <h4>Ganti Password</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('user/ganti_password'); ?>" method="post">
                            <div class="form-group">
                                <label for="current_password">Password saat ini</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-2">', '</small>'); ?>

                            </div>
                            <div class="form-group">
                                <label for="new_password1">Password baru</label>
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Ulangi password</label>
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Ubah Password
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>