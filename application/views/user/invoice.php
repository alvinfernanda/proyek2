<section class="konfirmasi mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="mb-3 text-center">
                    <h4 class="mb-5">Transaksi Berhasil</h4>
                    Kode Pesanan anda : <b><?= $trans['no_trans'] ?></b><br>
                    Total belanja anda <b class="text-danger">Rp. <?= number_format($trans['totalbayar'], 0, ',', '.') ?></b><br>
                    <br>
                </div>

                <div class="mb-3">
                    <p class="text-justify">
                        Silahkan mentransferkan uang dengan total <b>Rp. <?= number_format($trans['totalbayar'], 0, ',', '.') ?></b> ke rekening di bawah ini : <br>
                    </p>
                </div>

                <div class="col-md-10 mx-auto text-left">
                    <table class='table table-borderless table-sm'>
                        <thead>
                            <tr>
                                <th>Nama Bank</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BRI</td>
                                <td>1234567890</td>
                                <td>Batik Mulya</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>
                <p class="mt-2 mb-2">
                    Setelah melakukan Pembayaran, silahkan konfirmasi pembayaran anda <a href="<?= base_url('user/konfirmasi') ?>"><strong>disini</strong></a>.
                </p>
            </div>
        </div>
    </div>
</section>