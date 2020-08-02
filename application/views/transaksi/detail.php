<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Pemesan</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $trans['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Tanggal Pesan</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= date_indo($trans['tanggal']) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $trans['alamat']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <?php
                                if ($trans['id_status'] == 1) {
                                    $st = "Belum Bayar";
                                } else if ($trans['id_status'] == 2) {
                                    $st = "Proses";
                                } else if ($trans['id_status'] == 3) {
                                    $st = "Dalam Pengiriman";
                                } else {
                                    $st = "Sampai Tujuan";
                                }
                                ?>
                                <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $st; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Bukti Bayar</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $trans['bukti']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="display table table-hover table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pesanan as $p) :
                            $harga = $p['harga'];
                            $jumlah = $p['jumlah'];
                            $total = $harga * $jumlah;
                        ?>
                            <tr>
                                <td>
                                    <h6><?= $i++; ?></h6>
                                </td>
                                <td>
                                    <h6><?= $p['nama'] ?></h6>
                                </td>
                                <td>
                                    <h6><?= $p['harga'] ?></h6>
                                </td>
                                <td>
                                    <h6><?= $p['jumlah'] ?></h6>
                                </td>
                                <td>
                                    <h6><?= $total ?></h6>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"></td>
                            <td><b>Subtotal</b></td>
                            <td>
                                <h6><?= $trans['total'] ?></h6>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><b>Ongkos Kirim</b></td>
                            <td>
                                <h6><?= $trans['ongkir'] ?></h6>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><b>Total Bayar</b></td>
                            <td>
                                <h6><?= $trans['totalbayar'] ?></h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= base_url('transaksi') ?>" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->