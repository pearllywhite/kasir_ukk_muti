<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-0">From Tambah pengguna</h6>
                            
                            <form action="<?=site_url('simpan-pengguna');?>" method="POST">
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Username</label>
                                    <input type="hidden" class="form-control" id="InputId" name="id_user">
                                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="inputUsn" name="username"  placeholder="Masukan Username" autofocus autocomplete="off" value="<?= old('username') ?>">
                                        <div class="ms-1">
                                            <?php if (session()->has('errors')) : ?>
                                                <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'username') : ?>
                                                    <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Nama pengguna</label>
                                    <input type="text" class="form-control <?php if (session('errors.nama_user')) : ?>is-invalid<?php endif ?>" id="inputNama" name="nama_user"  placeholder="Masukan Nama Pengguna" autofocus autocomplete="off" value="<?= old('nama_user') ?>">
                                        <div class="ms-1">
                                            <?php if (session()->has('errors')) : ?>
                                                <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'nama_user') : ?>
                                                    <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Password</label>
                                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="inputPw" name="password"  placeholder="Masukan Password" autofocus autocomplete="off" value="<?= old('password') ?>">
                                        <div class="ms-1">
                                            <?php if (session()->has('errors')) : ?>
                                                <?php foreach (session('errors') as $field => $error) : ?>
                                                <?php if ($field === 'password') : ?>
                                                    <span class="text-danger text-xxs"><?= $error ?></span>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>
                                </div>
                                 <div class="mb-3">
                                    <label for="inputName" class="form-label">Level</label>
                                    <select id="level" class="form-control" name="level">
                                        <option selected>Admin</option>
                                        <option>Kasir</option>
                                    </select>  
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary me-2">Simpan</button>
                                    &nbsp;<a href="/data
                                    -pengguna" class="btn btn-danger">Cancel</a>



                                   
                            </form>
                        </div>
                    </div>

<?= $this->endSection();?>