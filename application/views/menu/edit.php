<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Form Edit Menu
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $menu['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">
                            <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right mt-2">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>