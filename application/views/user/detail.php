<section class="produk1">
    <div class="container">
        <div class="row" style="border-bottom: 2px solid #e6eaee">
            <div class="col">
                <h1>Detail Produk</h1>
            </div>
        </div>
        <?php if ($this->session->userdata('email')) { ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <form action="<?= base_url('user/tambah_keranjang/') ?><?= $produk['id'] ?>" method="post">
                <div class="row mt-3">
                    <div class="col-md-5 detail">
                        <img src="<?= base_url('assets/img/produk/') ?><?= $produk['gambar'] ?>" class="card-img-top detail" alt="...">
                    </div>

                    <div class="col-md-6 align-self-center detail-produk">
                        <h3><?= $produk['nm_produk'] ?></h3>
                        <h4 style="color: rgb(219, 133, 3); font-weight: bold">Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></h4>
                        <!-- <h6>Stok : <?= $produk['stok'] ?></h6> -->
                        <?php if ($produk['id_kategori'] == 4) { ?>
                        <?php } else { ?>
                            <div class="form-group">
                                <label class="form-label d-block">Ukuran</label>
                                <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                    <label class="selectgroup-item mr-3">
                                        <input type="radio" name="ukuran" value="M" class="selectgroup-input" checked="">
                                        <span class="selectgroup-button selectgroup-button-icon">M</span>
                                    </label>
                                    <label class="selectgroup-item mr-3">
                                        <input type="radio" name="ukuran" value="L" class="selectgroup-input">
                                        <span class="selectgroup-button selectgroup-button-icon">L</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="ukuran" value="XL" class="selectgroup-input">
                                        <span class="selectgroup-button selectgroup-button-icon">XL</span>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row mt-3 ml-1">
                            <div class="col-md-3 input-jumlah">
                                <input type="text" name="jumlah" value="1" maxlength="<?= $produk['stok'] ?>">
                            </div>
                        </div>

                        <button class="btn btn-warning btn-lg mt-4" type="submit">Masukan ke Keranjang</button>

                    </div>
                </div>
            </form>
        <?php } else { ?>
            <div class="row mt-3">
                <div class="col-md-5 detail">
                    <img src="<?= base_url('assets/img/produk/') ?><?= $produk['gambar'] ?>" class="card-img-top detail" alt="...">
                </div>
                <div class="col align-self-center detail-produk">
                    <h3><?= $produk['nm_produk'] ?></h3>
                    <h4 style="color: rgb(219, 133, 3); font-weight: bold">Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></h4>
                    <!-- <h6>Stok : <?= $produk['stok'] ?> produk</h6> -->
                    <div class="form-group">
                        <label class="form-label d-block">Ukuran</label>
                        <div class="selectgroup selectgroup-secondary selectgroup-pills">
                            <label class="selectgroup-item mr-3">
                                <input type="radio" name="icon-input" value="1" class="selectgroup-input">
                                <span class="selectgroup-button selectgroup-button-icon">M</span>
                            </label>
                            <label class="selectgroup-item mr-3">
                                <input type="radio" name="icon-input" value="2" class="selectgroup-input">
                                <span class="selectgroup-button selectgroup-button-icon">L</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="3" class="selectgroup-input">
                                <span class="selectgroup-button selectgroup-button-icon">XL</span>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-3 ml-1">
                        <div class="col-md-3 input-jumlah">
                            <input type="text" name="jumlah" value="1">
                        </div>
                    </div>

                    <button class="btn btn-warning btn-lg mt-4" data-toggle="modal" data-target="#login">Masukan ke Keranjang</button>
                </div>
            </div>
        <?php } ?>

        <div class="row mt-5">
            <div class="col-md-6">
                <h4>Deskripsi Produk</h4>
                <p><?= $produk['deskripsi'] ?></p>
            </div>
        </div>
    </div>
</section>

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