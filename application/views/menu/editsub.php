<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Form Edit Submenu
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $subMenu['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $subMenu['judul']; ?>">
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Menu</label>
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="<?= $subMenu['menu_id'] ?>"><?= $sub['id']; ?></option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('menu_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="<?= $subMenu['url']; ?>">
                            <small class="form-text text-danger"><?= form_error('url'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Ikon</label>
                            <input type="text" class="form-control" id="ikon" name="ikon" value="<?= $subMenu['ikon']; ?>">
                            <small class="form-text text-danger"><?= form_error('ikon'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right mt-2">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>