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
            <div class="col-lg-9">
                <div class="row">
                    <div class="col">
                        <h4>Riwayat Transaksi</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <table class="display table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Pesanan</th>
                                    <th>Tanggal beli</th>
                                    <th>Total Bayar</th>
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
                                            <h6 class="mt-2">Rp. <?= number_format($p['totalbayar'], 0, ',', '.') ?></h6>
                                        </td>
                                        <td>
                                            <?php if ($p['id_status'] == 1) { ?>
                                                <h6 class="mt-2 text-danger">Menunggu Pembayaran</h6>
                                            <?php } else if ($p['id_status'] == 2) { ?>
                                                <h6 class="text-warning mt-2">Sedang diproses</h6>
                                            <?php } else if ($p['id_status'] == 3) { ?>
                                                <h6 class="text-primary mt-2">Sedang dikirim</h6>
                                            <?php } else { ?>
                                                <h6 class="text-success mt-2">Sampai Tujuan</h6>
                                            <?php } ?>

                                        </td>
                                        <td>
                                            <a href="<?= base_url('user/detail_trans/' . $p['id']) ?>" class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>