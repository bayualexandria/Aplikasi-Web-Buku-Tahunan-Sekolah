<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                            <i class="ti-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $title; ?></h4>
                        <p class="card-description float-right">
                            <a href="<?= base_url('Admin/Pemesanan/create') ?>" class="btn-rounded btn-success btn-sm" style="text-decoration:none;"><i class="ti-plus menu-icon"></i> Tambah Data Admin</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pelanggan->result() as $a) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $a->name; ?></td>
                                            <td><?= $a->alamat; ?></td>
                                            <td><?= $a->no_hp; ?></td>
                                            <td><?= $a->email_pelanggan; ?></td>
                                            <td>
                                                <?php if ($a->is_active == 1) : ?>
                                                <label class="badge badge-success"><?= 'Aktif';?></label>
                                                <?php else : ?>
                                                <label class="badge badge-danger"><?= 'Tidak Aktif';?></label>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($a->role_id == 2) : ?>
                                                <?= 'Pelanggan';?>
                                                
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href=""><i class="text-primary ti-pencil-alt2 menu-icon"></i></a>
                                                <a href="<?= base_url('admin/Pelanggan/delete/'); ?><?= $a->name; ?>"><i class="text-danger ti-trash menu-icon"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
</div>

</div>