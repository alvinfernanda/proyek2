<section class="keranjang">
    <div class="container">
        <div class="row" style="border-bottom: 2px solid #e6eaee">
            <div class="col">
                <h2>Keranjang Belanja</h2>
            </div>
        </div>

        <?php if ($this->cart->total_items() == 0) { ?>
            <div class="text mt-3">
                <p><b>Wah, keranjang belanjamu kosong</b></p>
                <p>Daripada dianggurin, mending isi dengan barang-barang impianmu.<br>Yuk, cek sekarang</p>
            </div>
            <a href="<?= base_url('user') ?>" class="btn btn-warning mt-2">Belanja Sekarang</a>
        <?php } else { ?>
            <div class="row mt-3">
                <div class="col-md-8">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="display table table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->cart->contents() as $items) :
                                $id = $items['id'];
                                $produk = $this->User_model->getProdukById($id);
                            ?>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-5 gambar">
                                                <img src="<?= base_url('assets/img/produk/') ?><?= $produk['gambar'] ?>" class="card-img-top" alt="...">
                                            </div>
                                            <div class="col align-self-center huruf">
                                                <h6><?= $items['name'] ?></h6>
                                                <h6><?= $items['size'] ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mt-3">Rp. <?= number_format($items['price'], 0, ',', '.') ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="mt-3"><?= $items['qty'] ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="mt-3">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></h6>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('user/hapus_keranjang/') ?><?= $items['rowid'] ?>" class="btn btn-danger align-self-center"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url('user/hapusSemuaKeranjang') ?>" class="btn btn-danger mt-3 ml-2 float-right">Bersihkan Keranjang</a>
                    <a href="<?= base_url('user/produk') ?>" class="btn btn-primary mt-3 float-right">Lanjutkan Belanja</a>
                </div>
                <div class="col-md-4 ringkasan">
                    <div class="card">
                        <div class="card-header">
                            Ringkasan Belanja
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    Total Harga
                                </div>
                                <div class="col">
                                    Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?>
                                </div>
                            </div>
                            <?php if ($alamat['alamat'] == "") { ?>
                                <a href="<?= base_url('user/tambahAlamat') ?>" class="btn btn-primary btn-block mt-3">Beli</a>
                            <?php } else { ?>
                                <a href="<?= base_url('user/checkout/') ?><?= $user['id'] ?>" class="btn btn-primary btn-block mt-3">Beli</a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
</section>