<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
                    <button class="btn btn-primary btn-icon-split ml-auto" data-toggle="modal" data-target="#tambahProduk">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Produk</span>
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
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Berat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($produk as $p) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><img src="<?= base_url('assets/img/produk/') . $p['gambar']; ?>" alt="Gambar Produk" class="img-thumbnail" width="50" height="35"></td>
                                    <td><?= $p['nm_produk'] ?></td>
                                    <td><?= $p['harga'] ?></td>
                                    <td><?= $p['stok'] ?></td>
                                    <td><?= $p['nm_kategori'] ?></td>
                                    <td><?= $p['berat'] ?></td>
                                    <td>
                                        <a href="<?= base_url('produk/detailProduk/' . $p['id']) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('produk/editProduk/' . $p['id']) ?>" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                                        <a href="<?= base_url('produk/hapusProduk/' . $p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i></a>
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
    <div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="tambahAdmin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewMenuLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('produk'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Produk <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga <b class="text-danger">*</b></label>
                        <input type="number" class="form-control" id="harga" name="harga">
                        <?= form_error('harga', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori <b class="text-danger">*</b></label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nm_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok <b class="text-danger">*</b></label>
                        <input type="number" class="form-control" id="stok" name="stok">
                        <?= form_error('stok', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat(gram) <b class="text-danger">*</b></label>
                        <input type="number" class="form-control" id="berat" name="berat">
                        <?= form_error('berat', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi <b class="text-danger">*</b></label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar <b class="text-danger">*</b></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <?= form_error('gambar', '<small class="text-danger pl-2">', '</small>'); ?>
                            <label class="custom-file-label" for="gambar">Pilih file</label>
                        </div>
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