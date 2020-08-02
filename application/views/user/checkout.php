<section class="checkout mt-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Checkout</h2>
            </div>
        </div>
        <div class="row mt-3" style="border-bottom: 2px solid #e6eaee">
            <div class="col">
                <h4>Alamat Pengiriman</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <?= $this->session->flashdata('message'); ?>
                <h6><strong><?= $user['nama'] ?></strong></h6>
                <h6><?= $alamat['telepon'] ?></h6>
                <h6><?= $alamat['alamat'] ?></h6>
                <h6><?= $alamat['nm_kota'] . ', ' . $alamat['nm_provinsi'] . ', ' . $alamat['kodepos'] ?></h6>
                <a href="" data-toggle="modal" data-target="#ubahAlamat">Ubah Alamat</a>
            </div>
        </div>
    </div>

</section>

<section class="keranjang">
    <div class="container">
        <div class="row" style="border-bottom: 2px solid #e6eaee">
            <div class="col">
                <h4>Konfirmasi Pesanan</h4>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <table class="display table table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalberat = 0; ?>
                        <?php foreach ($this->cart->contents() as $items) :
                            $id = $items['id'];
                            $produk = $this->User_model->getProdukById($id);
                            $berat = $items['qty'] * $items['weight'];
                            $totalberat += $berat;
                        ?>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-5 gambar">
                                            <img src="<?= base_url('assets/img/produk/') ?><?= $produk['gambar'] ?>" class="card-img-top" alt="...">
                                        </div>
                                        <div class="col align-self-center huruf">
                                            <h6><?= $items['name'] ?></h6>
                                            <h6><?= $items['size'] ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mt-3">Rp. <?= number_format($items['price'], 0, ',', '.') ?></h6>
                                </td>
                                <td>
                                    <h6 class="mt-3"><?= $items['qty'] ?></h6>
                                </td>
                                <td>
                                    <h6 class="mt-3">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></h6>
                                </td>
                                <td>
                                    <a href="<?= base_url('user/hapus_keranjang/') ?><?= $items['rowid'] ?>" class="btn btn-danger align-self-center"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <input type="hidden" id="totalberat" name="totalberat" value="<?= $totalberat ?>">
        <input type="hidden" name="tujuan" id="tujuan" value="<?= $alamat['kota'] ?>" />
        <input type="hidden" name="asal" id="asal" value="149" />
        <input type="hidden" name="total" id="total" value="<?= $this->cart->total() ?>" />

        <div class="row mt-3 mb-3">
            <div class="col-md-6">
                <div class="card w-100 shadow mb-2 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ekspedisi">Ekspedisi</label>
                                    <select onchange="get_ongkir()" class="kurir form-control" id="ekspedisi" name="ekspedisi">
                                        <option>Pilih Ekspedisi</option>
                                        <?php
                                        $eks = ['jne' => 'JNE', 'pos' => 'POS', 'tiki' => 'TIKI'];
                                        foreach ($eks as $key => $value) {
                                            echo "<option value='$key'> $value </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="service">Service</label>
                            <select onchange="hitungtotal()" name="service" id="service" class="form-control">

                            </select>
                        </div>
                        <!-- <div class="row mt-2" id="kuririnfo" style="display: none">
                            <div class="col"></div>
                            <div class="col pt-2" id="kurirserviceinfo">

                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ringkasan Belanja
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                Total Harga
                            </div>
                            <div class="col">
                                <b>Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Ongkos Kirim
                            </div>
                            <div class="col">
                                <b id="ongkoskirim">Rp. 0</b>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                Total Bayar
                            </div>
                            <div class="col">
                                <b id="totalbayar">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></b>
                            </div>
                        </div>
                        <?php if ($alamat['alamat'] == "") { ?>
                            <a href="<?= base_url('user/alamat_tidak_ada') ?>" class="btn btn-warning mt-3 px-5" name="btnsimpan" id="btnsimpan">Buat Pesanan</a>
                        <?php } else { ?>
                            <form action="<?= base_url('user/prosesInvoice') ?>" method="POST">
                                <input type="hidden" id="notrans" name="notrans" value="<?= $notrans ?>">
                                <input type="hidden" id="id_user" name="id_user" value="<?= $user['id']; ?>">
                                <input type="hidden" id="id_alamat" name="id_alamat" value="<?= $alamat['id_alamat']; ?>">
                                <input type="hidden" name="ongkir" id="ongkir" value="0" />
                                <input type="hidden" name="bayar" id="bayar" value="0" />
                                <button type="submit" name="btnsimpan" id="btnsimpan" class="btn btn-warning btn-block" style='display:none'>Buat Pesanan</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="ubahAlamat" tabindex="-1" role="dialog" aria-labelledby="ubahAlamat" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewMenuLabel">Ubah Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/checkout/') ?><?= $user['id'] ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id_user" value="<?= $user['id']; ?>">
                    <input type="hidden" id="id" name="id_alamat" value="<?= $alamat['id_alamat']; ?>">
                    <div class="form-group">
                        <label for="alamat">Alamat <b class="text-danger">*</b></label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="2"><?= $alamat['alamat'] ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $alamat['telepon'] ?>">
                        <?= form_error('telepon', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota <b class="text-danger">*</b></label>
                        <select name="kota" id="kota" class="form-control">
                            <?php $kota = $this->db->get('tb_kota')->result_array() ?>
                            <?php foreach ($kota as $k) : ?>
                                <?php if ($k['id_kota'] == $alamat['kota']) { ?>
                                    <option value="<?= $k['id_kota'] ?>" selected><?= $k['nm_kota'] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $k['id_kota'] ?>"><?= $k['nm_kota'] ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kota', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi <b class="text-danger">*</b></label>
                        <select name="provinsi" id="provinsi" class="form-control">
                            <?php $provinsi = $this->db->get('tb_provinsi')->result_array() ?>
                            <?php foreach ($provinsi as $p) : ?>
                                <?php if ($p['id_provinsi'] == $alamat['provinsi']) { ?>
                                    <option value="<?= $p['id_provinsi'] ?>" selected><?= $p['nm_provinsi'] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $p['id_provinsi'] ?>"><?= $p['nm_provinsi'] ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('provinsi', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kodepos">Kode Pos</label>
                        <input type="number" class="form-control" id="kodepos" name="kodepos" value="<?= $alamat['kodepos'] ?>">
                        <?= form_error('kodepos', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>