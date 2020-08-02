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
                <form action="<?= base_url('transaksi/proses_edit_status/' . $pembeli['id']) ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="id" name="id" value="<?= $pembeli['id']; ?>">
                            <div class="form-group">
                                <label for="">Status <b class="text-danger">*</b></label>
                                <br>
                                <label><input type="radio" name="status" id="status" value="1" <?= $pembeli['aktif'] == '1' ? ' checked' : ''; ?>> Aktif</label>
                                <label><input type="radio" name="status" id="status" value="0" <?= $pembeli['aktif'] == '0' ? ' checked' : ''; ?>> Nonaktif</label>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary mt-2">Ubah Data</button>
                            <a href="<?= base_url('transaksi/data_pembeli'); ?>" class="btn btn-danger mt-2 ml-1">Batal</a>
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