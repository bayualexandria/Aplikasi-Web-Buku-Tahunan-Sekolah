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
                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="<?= base_url('assets/images/buku-tahunan-sekolah.jpg') ?>" class="card-img-top" alt="...">
                                    <div class="card-body text-center font-weight-bold">
                                        <h5 class="card-title"><?= $produck['jenis_katalog']; ?></h5>
                                        <p class="card-text">Rp <?= $produck['harga']; ?> / <?= $produck['halaman']; ?> Halaman</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Ukuran : <?= $produck['ukuran']; ?></li>
                                        <li class="list-group-item">Jenis Bahan : <?= $produck['bahan_kertas']; ?></li>
                                        <li class="list-group-item">Cover : <?= $produck['cover']; ?></li>
                                        <li class="list-group-item">Finishing : <?= $produck['finishing']; ?></li>
                                        <li class="list-group-item">Cetakan : <?= $produck['cetakan']; ?></li>
                                        <li class="list-group-item">Dok. File : <?= $produck['dokFile']; ?></li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="float-left mt-0">
                                            <h6 class="ml-1">Status</h6>
                                            <?php if ($produck['id_status'] == 2) : ?>
                                                <span class="badge badge-pill badge-<?= $produck['style'] ?>"><?= $produck['konfirmasi']; ?></span>
                                            <?php else : ?>
                                                <a href="<?= base_url('admin/pemesanan/updateStatus/' . $produck['id']) ?>" class="badge badge-pill badge-<?= $produck['style'] ?>"><?= $produck['konfirmasi']; ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?= $produck['id'] ?>" />
                                            <div class="float-right font-weight-bold">
                                                <input type="hidden" name="harga" value="<?= $produck['harga']; ?>" id="harga">
                                                <?php if (form_error('jumlah_katalog') == 0) : ?>
                                                    <input class="form-control" name="jumlah_katalog" type="number" min="1" max="12" step="1" value="<?= $produck['jumlah_katalog']; ?>" id="jumlah">
                                                <?php endif; ?>

                                                <h6 style="padding-top:12px;margin-left:-20px;">Rp</h6>

                                                <input type="text text-muted " style="font-weight:500; font-size:1.3rem;margin-top:-40px;margin-right:-100px;" class="form-control-plaintext position-absolute" value="<?= $produck['total']; ?>" id="total" name="total" readonly>


                                            </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-3">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
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