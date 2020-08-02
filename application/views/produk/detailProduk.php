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
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $produk['nm_produk']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" style="height: 100px; width: 100px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="harga" value="<?= $produk['harga']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="stok" value="<?= $produk['stok']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="kategori" value="<?= $produk['nm_kategori']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="deskripsi" value="<?= $produk['deskripsi']; ?>">
                            </div>
                        </div>

                        <a href="<?= base_url('produk') ?>" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>




        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->