<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
</head><body>
    <div class="table-responsive">
        <table class="display table table-bordered" width="100%" cellspacing="0">
            <thead style="color: white; background-color: #858796; text-align: center">
                <tr>
                    <th>No</th>
                    <th>Kode Pesanan</th>
                    <th>Pembeli</th>
                    <th>Tanggal beli</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php $i = 1; ?>
                <?php $total = 0; ?>
                <?php foreach ($transaksi as $t) : ?>
                    <tr>
                        <td><?= $i++  ?></td>
                        <td><?= $t['no_trans'] ?></td>
                        <td><?= $t['nama'] ?></td>
                        <td><?= date_indo($t['tanggal']) ?></td>
                        <td>Rp. <?= number_format($t['total'], 0, ',', '.') ?></td>
                    </tr>
                    <?php $total += $t['total']; ?>
                <?php endforeach; ?>
                <tr style="font-weight: bold;">
                    <td colspan="3"></td>
                    <td>Subtotal</td>
                    <td>
                        Rp. <?= number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body></html>