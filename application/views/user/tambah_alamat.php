<form action="<?= base_url('user/tambahAlamat') ?>" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <input type="hidden" id="id" name="id_user" value="<?= $user['id']; ?>">
                <div class="form-group">
                    <label for="alamat">Alamat <b class="text-danger">*</b></label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="2"></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon">
                    <?= form_error('telepon', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi <b class="text-danger">*</b></label>
                    <select onchange="get_kota()" name="provinsi" id="provinsi" class="form-control provinsi">
                        <option value="">Pilih Provinsi</option>
                    </select>
                    <?= form_error('provinsi', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kota">Kota <b class="text-danger">*</b></label>
                    <select name="kota" id="kota" class="form-control">
                        <option value="">Pilih Kota</option>
                    </select>
                    <?= form_error('kota', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kodepos">Kode Pos</label>
                    <input type="number" class="form-control" id="kodepos" name="kodepos">
                    <?= form_error('kodepos', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary float-right">Tambah Alamat</button>
            </div>
        </div>

    </div>
</form>