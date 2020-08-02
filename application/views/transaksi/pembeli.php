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
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table id="datatables" class="display table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pembeli as $p) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><img src="<?= base_url('assets/img/profile/') . $p['foto']; ?>" alt="Foto" class="img-thumbnail" width="50" height="35"></td>
                                    <td><?= $p['nama'] ?></td>
                                    <td><?= $p['email'] ?></td>
                                    <?php
                                    if ($p['aktif'] == 1) {
                                        $aktif = "Aktif";
                                    } else {
                                        $aktif = "Nonaktif";
                                    }
                                    ?>
                                    <td><?= $aktif ?><a href="<?= base_url('transaksi/edit_status_pembeli/') . $p['id'] ?>" class="badge badge-warning ml-1">Edit</a></td>
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