<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
                    <button class="btn btn-warning ml-auto" data-toggle="modal" data-target="#export">
                        <i class="fas fa-file"></i>
                        Export PDF
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table id="datatables" class="display table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>Pembeli</th>
                                <th>Tanggal beli</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($laporan as $l) : ?>
                                <tr>
                                    <td><?= $i++  ?></td>
                                    <td><?= $l['no_trans'] ?></td>
                                    <td><?= $l['nama'] ?></td>
                                    <td><?= date_indo($l['tanggal']) ?></td>
                                    <td>Rp. <?= number_format($l['total'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>Pembeli</th>
                                <th>Tanggal beli</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="tambahKategori" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewMenuLabel">Export PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('laporan/exportPDF'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="tgl1" class="col-sm-2 col-form-label">Dari</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="tgl1" name="tgl1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl2" class="col-sm-2 col-form-label">Sampai</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="tgl2" name="tgl2">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->