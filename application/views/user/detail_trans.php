<div class="container mt-3">
    <?php if ($trans['id_status'] == 3) { ?>
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="alert alert-info" role="alert">
                    Jika barang sudah sampai, silahkan konfirmasi dengan menekan tombol ini
                    <a href="<?= base_url('user/pesanan_sampai/' . $trans['id']) ?>" class="btn btn-info">konfirmasi</a>
                </div>

            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-10">
            <?= $this->session->flashdata('message'); ?>
            <h4>Detail Pembelian</h4>
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
                    <?php
                    $i = 1; ?>
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
                                <h6>Rp. <?= number_format($p['harga'], 0, ',', '.') ?></h6>
                            </td>
                            <td>
                                <h6><?= $p['jumlah'] ?></h6>
                            </td>
                            <td>
                                <h6>Rp. <?= number_format($total, 0, ',', '.') ?></h6>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Subtotal</b></td>
                        <td>
                            <h6>Rp. <?= number_format($trans['total'], 0, ',', '.') ?></h6>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Ongkos Kirim</b></td>
                        <td>
                            <h6>Rp. <?= number_format($trans['ongkir'], 0, ',', '.') ?></h6>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Total Bayar</b></td>
                        <td>
                            <h6>Rp. <?= number_format($trans['totalbayar'], 0, ',', '.') ?></h6>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('user/riwayat_trans/') . $user['id'] ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>