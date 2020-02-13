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
                            <a href="" class="btn-rounded btn-success btn-sm" data-toggle="modal" data-target="#insert" style="text-decoration:none;"><i class="ti-plus menu-icon"></i> Tambah Data Produk</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis Katalog</th>
                                        <th>Bahan Kertas</th>
                                        <th>Ukuran</th>
                                        <th>Halaman</th>
                                        <th>Cover</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($produks->result() as $produk) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $produk->jenis_katalog; ?></td>
                                            <td><?= $produk->bahan_kertas; ?></td>
                                            <td><?= $produk->ukuran; ?></td>
                                            <td><?= $produk->halaman; ?></td>
                                            <td><?= $produk->cover; ?></td>
                                            <td><?= $produk->harga; ?></td>
                                            <td>
                                                <!-- <i href=""><i class="text-secondary ti-eye menu-icon"></i></a> -->
                                                <a href="<?= base_url('admin/produk/update/' . $produk->id) ?>"><i class="text-primary ti-pencil-alt2 menu-icon"></i></a>
                                                <a href="<?= base_url('admin/produk/delete/' . $produk->id) ?>"><i class="text-danger ti-trash menu-icon"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk Buku Tahunan Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/produk') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_katalog">Jenis Katalog</label>
                                <select class="form-control" id="id_katalog" name="id_katalog">
                                    <?php $katalog = $this->db->get('tbl_katalog'); ?>
                                    <?php foreach ($katalog->result() as $k) : ?>
                                        <option value="<?= $k->id; ?>"><?= $k->jenis_katalog; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ukuran">Ukuran</label>
                                <input type="text" class="form-control" id="ukuran" name="ukuran">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="bahan_kertas">Bahan Kertas</label>
                                <input type="text" class="form-control" id="bahan_kertas" name="bahan_kertas">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="halaman">Halaman</label>
                                <input type="text" class="form-control" id="halaman" name="halaman">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cover">Cover</label>
                                <input type="text" class="form-control" id="cover" name="cover">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="finishing">Finishing</label>
                                <input type="text" class="form-control" id="finishing" name="finishing">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cetakan">Cetakan</label>
                                <input type="text" class="form-control" id="cetakan" name="cetakan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dokFile">Dok File</label>
                                <input type="text" class="form-control" id="dokFile" name="dokFile">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>