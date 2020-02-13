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
                        <form action="" method="POST" name="formpemesanan">
                            <input type="hidden" name="id" value="<?= $produk['id']; ?>">
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
                                        <input type="text" class="form-control" id="ukuran" value="<?= $produk['ukuran']; ?>" name="ukuran">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="bahan_kertas">Bahan Kertas</label>
                                        <input type="text" class="form-control" id="bahan_kertas" value="<?= $produk['bahan_kertas']; ?>" name="bahan_kertas">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="halaman">Halaman</label>
                                        <input type="text" class="form-control" id="halaman" value="<?= $produk['halaman']; ?>" name="halaman">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cover">Cover</label>
                                        <input type="text" class="form-control" id="cover" value="<?= $produk['cover']; ?>" name="cover">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="finishing">Finishing</label>
                                        <input type="text" class="form-control" id="finishing" value="<?= $produk['finishing']; ?>" name="finishing">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cetakan">Cetakan</label>
                                        <input type="text" class="form-control" id="cetakan" value="<?= $produk['cetakan']; ?>" name="cetakan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dokFile">Dok File</label>
                                        <input type="text" class="form-control" id="dokFile" value="<?= $produk['dokFile']; ?>" name="dokFile">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" value="<?= $produk['harga']; ?>" name="harga">
                            </div>

                            <div class="float-right">
                                <a href="<?= base_url('admin/produk'); ?>" class="btn btn-warning btn-sm">Kembali</a>
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </div>
                        </form>
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