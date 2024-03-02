<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<h5 class="card-title">Master Satuan Produk</h5>
<p class="card-text">Tambahkan data satuan baru pada halaman ini</p>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <form class="forms-sample" action="<?= site_url('perbarui-satuan'); ?>" method="POST">
        <div class="form-group row">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Satuan Produk</label>
          <div class="col-sm-9">

            <input type="hidden" class="form-control" id="exampleInputUsername2" name="id_satuan" value="<?= $detailSatuan[0]['id_satuan'];?>">
            <input type="text" class="form-control <?php if (session('errors.nama_satuan')) : ?>is-invalid<?php endif ?>" id="exampleInputUsername2" placeholder="Masukan Satuan Produk" name="nama_satuan" required name="satuan_produk" value="<?= $detailSatuan[0]['nama_satuan'];?>" autocomplete="off">
              <div class="ms-2">
                    <?php if (session()->has('errors')) : ?>
                      <?php foreach (session('errors') as $field => $error) : ?>
                        <?php if ($field === 'namaPelanggan') : ?>
                          <span class="text-danger text-sm"><?= $error ?></span>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
          </div>
        </div>
        <button type="submit" class="btn btn-gradient-primary me-2">Simpan</button>
        &nbsp;<a href="/satuan-produk" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>