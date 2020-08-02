<section class="produk1 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-header">
                                <b>Dashboard</b>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/profil/' . $user['id']) ?>">Profil</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/alamatProfil/' . $user['id']) ?>">Alamat</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/riwayat_trans/' . $user['id']) ?>">Riwayat Transaksi</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/ganti_password') ?>">Ganti Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="row">
                    <div class="col">
                        <h4>Alamat</h4>
                    </div>
                </div>
                <form action="" method="post">
                    <?= $this->session->flashdata('message'); ?>
                    <input type="hidden" id="id" name="id_user" value="<?= $user['id']; ?>">
                    <input type="hidden" id="id" name="id_alamat" value="<?= $alamat['id_alamat']; ?>">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="2"><?= $alamat['alamat'] ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $alamat['telepon'] ?>">
                        <?= form_error('telepon', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
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
                        <label for="provinsi">Provinsi</label>
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
                    <button type="submit" name="ubah" class="btn btn-info mt-2 float-right">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</section>