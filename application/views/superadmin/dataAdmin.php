<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
                    <button class="btn btn-primary btn-icon-split ml-auto" data-toggle="modal" data-target="#tambahAdmin">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Admin</span>
                    </button>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($admin as $a) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><img src="<?= base_url('assets/img/profile/') . $a['foto']; ?>" alt="Foto" class="img-thumbnail" width="50" height="35"></td>
                                    <td><?= $a['nama'] ?></td>
                                    <td><?= $a['email'] ?></td>
                                    <?php
                                    if ($a['aktif'] == 1) {
                                        $aktif = "Aktif";
                                    } else {
                                        $aktif = "Nonaktif";
                                    }
                                    ?>
                                    <td><?= $aktif ?></td>
                                    <td>
                                        <a href="<?= base_url('superadmin/editAdmin/' . $a['id']) ?>" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                                        <a href="<?= base_url('superadmin/hapusAdmin/' . $a['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="tambahAdmin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewMenuLabel">Tambah Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('superadmin/dataAdmin'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" id="email" name="email">
                            <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <b class="text-danger">*</b></label>
                            <input type="password" class="form-control" id="password" name="password">
                            <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->