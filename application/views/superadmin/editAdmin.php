<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $title; ?></h6>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="id" name="id" value="<?= $admin['id']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama']; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Status <b class="text-danger">*</b></label>
                                <br>
                                <label><input type="radio" name="status" id="status" value="1" <?= $admin['aktif'] == '1' ? ' checked' : ''; ?>> Aktif</label>
                                <label><input type="radio" name="status" id="status" value="0" <?= $admin['aktif'] == '0' ? ' checked' : ''; ?>> Nonaktif</label>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary mt-2">Ubah Data</button>
                            <a href="<?= base_url('superadmin/dataAdmin'); ?>" class="btn btn-danger mt-2 ml-1">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->