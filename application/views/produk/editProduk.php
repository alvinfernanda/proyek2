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
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <?= form_open_multipart(''); ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="id" name="id" value="<?= $produk['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Produk <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk['nm_produk']; ?>">
                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $produk['harga']; ?>">
                            <?= form_error('harga', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori <b class="text-danger">*</b></label>
                            <select name="kategori" id="kategori" class="form-control">
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id']; ?>" <?= $k['id'] == $produk['id_kategori'] ? "selected" : null ?>><?= $k['nm_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('kategori', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok <b class="text-danger">*</b></label>
                            <input type="number" class="form-control" id="stok" name="stok" value="<?= $produk['stok']; ?>">
                            <?= form_error('stok', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat(gram) <b class="text-danger">*</b></label>
                            <input type="number" class="form-control" id="berat" name="berat" value="<?= $produk['berat']; ?>">
                            <?= form_error('berat', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi <b class="text-danger">*</b></label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"><?= $produk['deskripsi']; ?></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar <b class="text-danger">*</b></label>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <input type="hidden" id="fotolama" name="fotolama" value="<?= $produk['gambar']; ?>">
                                        <label class="custom-file-label" for="gambar">Pilih file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary mt-2">Ubah Data</button>
                        <a href="<?= base_url('produk'); ?>" class="btn btn-danger mt-2 ml-1">Batal</a>
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