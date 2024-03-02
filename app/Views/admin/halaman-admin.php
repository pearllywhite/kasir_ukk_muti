<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>
 
<div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                   
                    <h4 class="font-weight-normal mb-3">Laporan Pendapatan Harian <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $pendapatan_harian ?></h2>
                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    
                    <h4 class="font-weight-normal mb-3">Jumlah Stok Produk<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"> <?php echo $total_stok ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    
                    <h4 class="font-weight-normal mb-3">Jumlah Produ Habis<i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $stok ?></h2>
                  </div>
                </div>
              </div>
            </div>

<?= $this->endSection();?>