<section class="header mt-3">
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets') ?>/img/user/pengrajin.jpg" class="d-block w-100" alt="..." style="height: 530px">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets') ?>/img/user/pengrajin2.jpg" class="d-block w-100" alt="..." style="height: 530px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section class="kategori">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Kategori</h1>
            </div>
        </div>
        <div class="row mb-5 mt-2">
            <div class="col-md-4">
                <div class="card">
                    <a href="<?= base_url('user/pria') ?>">
                        <img src="<?= base_url('assets') ?>/img/user/bp5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text text-center">Pria</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="<?= base_url('user/wanita') ?>">
                        <img src="<?= base_url('assets') ?>/img/user/bw1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text text-center">Wanita</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="<?= base_url('user/kerajinan') ?>">
                        <img src="<?= base_url('assets') ?>/img/user/kain.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text text-center">Kerajinan Batik</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="produk">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Produk Terbaru</h1>
            </div>
        </div>
        <div class="row mb-5 mt-2">
            <?php foreach ($produk as $p) : ?>
                <div class="col-lg-3 mb-5">
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

        <div class="row">
            <div class="col text-center">
                <a href="<?= base_url('user/produk') ?>" class="btn btn-warning" role="button">Lihat Semua Produk</a>
            </div>
        </div>
    </div>
</section>