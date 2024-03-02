<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- <?php
print_r($listSatuan);
?> -->

<h5 class="card-title">Master Satuan Produk</h5>
    <p class="card-text">Berikut adalah data satuan produk, tambahkan data baru pada halaman ini</p>
    <p><a href="<?= site_url('tambah-satuan');?>" class="btn btn-danger btn-sm">
    <i class="mdi mdi-library-plus"></i> Tambah</a></p>
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="10px"> No </th>
                          <th> Nama Satuan </th>
                          <th width="10px"> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(isset($listSatuan)){
                             $no = null;
                            foreach ($listSatuan as $baris)  {
                            
                            $no++
                            ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= ucwords($baris['nama_satuan']);?></td>
                                <td> 
                                    <a href="<?=site_url('/edit-satuan/'. $baris['id_satuan']); ?>"><i class="mdi mdi-eyedropper"></i></a>
                                    <form action="<?= site_url('hapus-satuan/' . $baris['id_satuan']); ?>" method="post" class="d-inline-block">
                                            <?= csrf_field() ?>
                                            <button type="submit" style="border: none; background-color: Transparent;" id="hapusKategori" class="text-danger" onclick="return confirm('Hapus data produk <?= $baris['nama_satuan']; ?>?');"
                                            data-id="<?= $baris['id_satuan']; ?>"><i class="mdi mdi-delete-forever"></i></button>
                                        </form>
                                    



                                <?php
                            }
                        }
                        ?>
                        </td>
                            </tr>
                      </tbody>
                    </table>
                      </tr>
                </div>
              </div>

        <?= $this->endSection();?>