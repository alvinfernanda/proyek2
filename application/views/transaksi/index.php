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
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table id="datatables" class="display table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Pembeli</th>
                                <th>Tanggal Pesan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transaksi as $t) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $t['no_trans'] ?></td>
                                    <td><?= $t['nama'] ?></td>
                                    <td><?= date_indo($t['tanggal']) ?></td>
                                    <?php if ($t['status'] == "Proses") { ?>
                                        <td><?= $t['status'] ?><a href="<?= base_url('transaksi/edit_status/') . $t['id'] ?>" class="badge badge-warning ml-1">Edit</a></td>
                                    <?php } else { ?>
                                        <td><?= $t['status'] ?></td>
                                    <?php } ?>
                                    <td>
                                        <a href="<?= base_url('transaksi/detailTrans/' . $t['id']) ?>" class="btn btn-success  btn-sm">Detail</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->