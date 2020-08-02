<section class="produk1">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row" style="border-bottom: 2px solid #e6eaee">
                    <div class="col">
                        <h1>Kerajinan Batik</h1>
                    </div>
                </div>
                <div class="row mb-5 mt-3">
                    <?php foreach ($produk as $p) : ?>
                        <div class="col-md-4 mb-5">
                            <div class="card">
                                <a href="<?= base_url('user/detail/'); ?><?= $p['id'] ?>">
                                    <img src="<?= base_url('assets/img/produk/') ?><?= $p['gambar'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-text"><?= $p['nm_produk'] ?></h6>
                                        <p class="card-text">Rp. <?= number_format($p['harga'], 0, ',', '.') ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row" style="margin-top: 75px">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                <b>Kategori</b>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/pria') ?>">Batik Pria</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/wanita') ?>">Batik Wanita</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= base_url('user/kerajinan') ?>">Kerajinan Batik</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>