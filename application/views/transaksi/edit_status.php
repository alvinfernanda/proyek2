<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-md-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="status">Status <b class="text-danger">*</b></label>
                    <select name="status" id="status" class="form-control">
                        <?php foreach ($status as $s) : ?>
                            <option value="<?= $s['id']; ?>" <?= $s['id'] == $transaksi['id_status'] ? "selected" : null ?>><?= $s['status']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <button type="submit" name="ubah" class="btn btn-primary mt-2">Ubah Data</button>
                <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger mt-2 ml-1">Batal</a>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->