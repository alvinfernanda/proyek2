<div class="container">
    <?php if ($pesanan == null) { ?>
        <h4 class="mt-5 text-center">Anda belum memiliki pesanan</h4 class="mt-4 text-center">
    <?php } else { ?>

        <div class="row">
            <div class="col">
                <h2>Pesanan Saya</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-10">
                <?= $this->session->flashdata('message'); ?>
                <table class="display table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal beli</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pesanan as $p) : ?>
                            <tr>
                                <td>
                                    <h6 class="mt-2"><?= $i++; ?></h6>
                                </td>
                                <td>
                                    <h6 class="mt-2"><?= $p['no_trans'] ?></h6>
                                </td>
                                <td>
                                    <h6 class="mt-2"><?= date_indo($p['tanggal']) ?></h6>
                                </td>
                                <td>
                                    <h6 class="mt-2">Rp. <?= number_format($p['total'], 0, ',', '.') ?></h6>
                                </td>
                                <td>
                                    <?php if ($p['status'] == 0) { ?>
                                        <h6 class="mt-2">Menunggu Pembayaran</h6>
                                    <?php } else { ?>
                                        <h6 class="mt-2">Pembayaran berhasil</h6>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('user/konfirmasi/') ?><?= $p['id'] ?>" role="button" class="btn btn-info">Konfirmasi</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>