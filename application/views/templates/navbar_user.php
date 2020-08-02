<nav class="navbar py-2 navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Batik Mulia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active align-self-center">
                    <a class="nav-link" href="<?= base_url('user') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="<?= base_url('user/produk') ?>">Produk</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="<?= base_url('user/tentang') ?>">Tentang Kami</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="<?= base_url('user/konfirmasi') ?>">Konfirmasi Pembayaran</a>
                </li>
                <?php if ($this->session->userdata('email')) { ?>
                    <li class="nav-item align-self-center mr-3">
                        <a class="nav-link" href="<?= base_url('user/keranjang/' . $user['id']) ?>">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            <span class="badge badge-danger badge-counter"><?= $this->cart->total_items() ?></span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item align-self-center mr-3">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#login">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            <span class="badge badge-danger badge-counter"><?= $this->cart->total_items() ?></span>
                        </a>
                    </li>
                <?php } ?>


                <div class="topbar-divider d-none d-sm-block"></div>

                <?php if ($this->session->userdata('email')) { ?>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow profil-navbar">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['foto']; ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('user/profil/'); ?><?= $user['id'] ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profil saya
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('user/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                <?php } else { ?>
                    <a href="<?= base_url('auth') ?>" class="btn  btn-outline-secondary px-3 py-2 ml-2 mr-1" role="button">Masuk</a>
                    <a href="<?= base_url('auth/registration') ?>" class="btn btn-warning px-3 py-2" role="button">Daftar</a>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewMenuLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-info btn-user btn-block">
                        Login
                    </button>
                </div>
            </form>
            <hr>
            <div class="text-center mb-3">
                <a class="small" href="<?= base_url('auth/registration'); ?>">Daftar Akun?</a>
            </div>
        </div>
    </div>
</div>