<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-md-10">
            <?= $this->session->flashdata('message'); ?>
            <table class="display table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Pesanan</th>
                        <th>File</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($bukti as $b) : ?>
                        <tr>
                            <td>
                                <h6><?= $i++; ?></h6>
                            </td>
                            <td>
                                <h6><?= $b['no_trans'] ?></h6>
                            </td>
                            <td>
                                <h6><a href="<?= base_url('assets/img/bukti/') . $b['bukti'] ?>"><?= $b['bukti'] ?></a></h6>
                            </td>
                            <td>
                                <a href="<?= base_url('transaksi/detailTrans/' . $b['id']) ?>" class="btn btn-success">Detail</a>
                                <a href="<?= base_url('superadmin/verif_bukti/' . $b['id']) ?>" class="btn btn-info">Verifikasi</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->