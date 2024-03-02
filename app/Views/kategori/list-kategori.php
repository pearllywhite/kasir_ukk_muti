<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<h5 class="card-title">Master Data kategori</h5>
    <p class="card-text">Berikut adalah data satuan produk, tambahkan data baru pada halaman ini</p>
    <p><a href="<?= site_url('tambah-kategori');?>" class="btn btn-danger btn-sm">
    <i class="mdi mdi-library-plus"></i> Tambah</a></p>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th width="10px"> No </th>
                          <th> Nama Kategori </th>
                          <th width="10px"> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if(isset($listKategori)){
                             $no = null;
                            foreach ($listKategori as $baris)  {
                            
                            $no++
                            ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= ucwords($baris['nama_kategori']);?></td>
                                <td> 
                                    <a href=<?=site_url('/edit-kategori/'. $baris['id_kategori']);?>><i class="mdi mdi-eyedropper"></i></a>
                                    <form action="<?= site_url('hapus-kategori/' . $baris['id_kategori']); ?>" method="post" class="d-inline-block">
                                            <?= csrf_field() ?>
                                            <button type="submit" style="border: none; background-color: Transparent;" id="hapusKategori" class="text-danger" onclick="return confirm('Hapus data produk <?= $baris['nama_kategori']; ?>?');"
                                            data-id="<?= $baris['id_kategori']; ?>"><i class="mdi mdi-delete-forever"></i></button>
                                        </form>
                                </td>

                                <?php
                            }
                        }
                        ?>
                        </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>

        <?= $this->endSection(); ?>