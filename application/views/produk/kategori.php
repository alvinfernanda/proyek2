<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
                    <button class="btn btn-primary btn-icon-split ml-auto" data-toggle="modal" data-target="#tambahKategori">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Kategori</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table id="datatables" class="display table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php $i = 1; ?>
                            <?php foreach ($kategori as $k) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $k['nm_kategori'] ?></td>
                                    <td>
                                        <a href="<?= base_url('produk/editKategori/' . $k['id']) ?>" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                                        <a href="<?= base_url('produk/editKategori/' . $k['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i></a>
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
    <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategori" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewMenuLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('produk/kategori'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
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