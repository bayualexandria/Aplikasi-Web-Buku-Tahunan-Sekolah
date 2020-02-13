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
                        <div class="row mx-5">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $one['id'] ?>">
                                <input type="hidden" name="id_katalog" value="<?= $one['id_katalog'] ?>">
                                <input type="hidden" name="jumlah_katalog" value="<?= $one['jumlah_katalog'] ?>">
                                <input type="hidden" name="total" value="<?= $one['total'] ?>">
                                <input type="hidden" name="id_pelanggan" value="<?= $one['id_pelanggan'] ?>">
                                <input type="hidden" name="nama_pelanggan" value="<?= $one['nama_pelanggan'] ?>">
                                <input type="hidden" name="id_bahan" value="<?= $one['id_bahan'] ?>">
                                <div class="form-group">
                                    <label for="id_ukuran">Status Pemesanan</label>
                                    <select name="id_status" id="id_status" class="form-control">
                                        <?php
                                        $query = "SELECT * FROM `tbl_status`";
                                        $status = $this->db->query($query)->result_array(); ?>
                                        <?php foreach ($status as $s) : ?>
                                            <option value="<?= $s['id']; ?>" class="text-<?= $s['style']; ?>"><?= $s['konfirmasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
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