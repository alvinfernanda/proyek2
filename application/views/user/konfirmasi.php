<div class="container mt-3">
    <h3 style="font-weight: bold;">Konfirmasi Pembayaran</h3>
    <?php if ($this->session->userdata('email')) { ?>
        <form action="<?= base_url('user/konfirmasi') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <label for="kode">Kode Pesanan</label>
                        <input type="text" class="form-control" id="kode" name="kode" autocomplete="off">
                        <small>* Untuk kode pesanan, anda bisa melihatnya <a href="<?= base_url('user/riwayat_trans/' . $user['id']) ?>">disini</a></small>
                        <br>
                        <?= form_error('kode', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti Pembayaran</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="bukti" name="bukti" required>
                            <small>* Silahkan pilih file dengan format <b class="text-danger">jpg/png</b>, ukuran maksimal <b class="text-danger">2 mb</b></small>
                            <label class="custom-file-label" for="bukti">Pilih file</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info btn-block mt-4" name="submit" value="Konfirmasi">
                    <!-- <button type="submit" class="btn btn-info btn-block mt-4">Konfirmasi</button> -->
                </div>
            </div>
        </form>
    <?php } else { ?>
        <form action="<?= base_url('user/konfirmasi') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <label for="kode">Kode Pesanan</label>
                        <input type="text" class="form-control" id="kode" name="kode">
                        <small>* Untuk kode pesanan, anda bisa melihatnya <a href="" data-toggle="modal" data-target="#login">disini</a></small>
                        <?= form_error('kode', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti Pembayaran</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="bukti" name="bukti" required>
                            <small>* Silahkan pilih file dengan format <b class="text-danger">jpg/png</b>, ukuran maksimal <b class="text-danger">2 mb</b></small>
                            <label class="custom-file-label" for="bukti">Pilih file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-block mt-4">Konfirmasi</button>
                </div>
            </div>
        </form>
    <?php } ?>
</div>

<!-- Modal Login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewMenuLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-info btn-user btn-block">
                        Login
                    </button>
                </div>
            </form>
            <hr>
            <div class="text-center mb-3">
                <a class="small" href="<?= base_url('auth/registration'); ?>">Daftar Akun?</a>
            </div>
        </div>
    </div>
</div>