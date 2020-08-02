<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-7">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-7">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" class="card-img" height="195" width="100">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Admin sejak <?= date('d F Y', $user['tgl_buat']); ?></small></p>
                    <div class="row">
                        <a href="<?= base_url('profil/edit') ?>" class="btn btn-primary ml-2 mr-2">Edit Profil</a>
                        <a href="<?= base_url('profil/ubah_password') ?>" class="btn btn-warning">Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->