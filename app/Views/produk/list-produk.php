<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<h5 class="card-title">Master Data produk</h5>
    <p class="card-text">Berikut adalah data data produk , tambahkan data baru pada halaman ini</p>
    <p><a href="<?= site_url('tambah-produk'); ?>" class="btn btn-danger btn-sm">
    <i class="mdi mdi-library-plus"></i> Tambah</a></p>
<div class="col-lg-12 grid-margin stretch-card">
<?php if (session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-success col-3 text-sm text-light ms-4 my-2" role="alert">
              <b><?= session()->getFlashdata('berhasil') ?></b>
            </div>
          <?php endif; ?>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-sm table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th>Kode Produk</th>
                          <th> Nama Produk</th>
                          <th>Harga Beli</th>
                          <th>Harga Jual</th>
                          <th>Satuan</th>
                          <th>Kategori</th>
                          <th>Stok</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $no =null;
                         foreach ($listProduk as $baris):
                          $no++
                          ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?=$baris ['kode_produk'];?></td>
                                <td><?= ucwords($baris ['nama_produk']);?></td>
                                <td><?=$baris ['harga_beli'];?></td>
                                <td><?=$baris ['harga_jual'];?></td>
                                <td><?=ucwords($baris ['nama_satuan']);?></td>
                                <td><?=ucwords($baris ['nama_kategori']);?></td>
                                <td><?=$baris ['stok'];?></td>
                                
                                <td> 
                                    <a href="<?=site_url('/edit-produk/'. $baris['id_produk']); ?>"><i class="mdi mdi-eyedropper"></i></a>
                                    <form action="<?= site_url('hapus-produk/' . $baris['id_produk']); ?>" method="post" class="d-inline-block">
                                            <?= csrf_field() ?>
                                            <button type="submit" style="border: none; background-color: Transparent;" id="hapusProduk" class="text-danger" onclick="return confirm('Hapus data produk <?= $baris['nama_produk']; ?>?');"
                                            data-id="<?= $baris['id_produk']; ?>"><i class="mdi mdi-delete-forever"></i></button>
                                        </form>


                                    <?php
                                    endforeach;
                                    
                                    ?>
                              </td>
                                  </table>
                                  </div>


        <?= $this->endSection(); ?>