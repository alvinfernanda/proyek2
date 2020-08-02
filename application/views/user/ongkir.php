<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST">
                <!-- <?php var_dump($ongkir) ?> -->
                <h4>Alamat Pengiriman</h4>
                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control" id="provinsi" name="provinsi">
                                <option>Pilih Provinsi</option>
                                <?php
                                if ($provinsi['rajaongkir']['status']['code'] == '200') {
                                    foreach ($provinsi['rajaongkir']['results'] as $pv) {
                                        echo "<option value='$pv[province_id]'> $pv[province] </option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kota">Kabupaten/Kota</label>
                            <select class="form-control" id="kota" name="kota">
                                <option>Pilih Kota</option>
                            </select>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prov_tujuan">Provinsi Tujuan</label>
                            <select onchange="get_kota()" class="form-control provinsi" id="provinsi_tujuan" name="prov_tujuan">
                                <option>Pilih Provinsi</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kota_tujuan">Kota Tujuan</label>
                            <select class="form-control" id="kota_tujuan" name="kota_tujuan">
                                <option>Pilih Kota</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ekspedisi">Ekspedisi</label>
                            <select class="form-control" id="ekspedisi" name="ekspedisi">
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
                    <div class="col-md-6">
                        <label for="berat">Berat</label>
                        <input type="number" name="berat" class="form-control" id="berat">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cek Ongkir</button>
            </form>

            <div class="card-deck mt-2">
                <?php
                $biaya = json_decode($ongkir, true);

                if ($biaya['rajaongkir']['status']['code'] == 200) {
                    foreach ($biaya['rajaongkir']['results'][0]['costs'] as $by) {
                ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $by['service'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $by['description'] ?></h6>
                                <p class="card-text">Rp. <?= number_format($by['cost'][0]['value'], 0, ',', '.')  ?></p>
                                <p class="card-text"><?= $by['cost'][0]['etd'] ?> hari</p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>