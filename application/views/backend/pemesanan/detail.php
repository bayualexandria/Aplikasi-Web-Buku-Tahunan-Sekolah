<div class="main-panel">
    <div class="content-wrapper">
        <div>
            <h4 class="font-weight-bold mb-3">Data Pemesanan</h4>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nama Pelanggan</span>
                    </div>
                    <input type="text" aria-label="First name" class="form-control" value="<?= $detail['name']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">No Handphone</span>
                    </div>
                    <input type="text" aria-label="First name" class="form-control" value="<?= $detail['no_hp']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Alamat</span>
                    </div>
                    <input type="text" aria-label="First name" class="form-control" value="<?= $detail['alamat']; ?>" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <?php foreach ($All as $a) : ?>
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/images/buku-tahunan-sekolah.jpg') ?>" class="card-img-top" alt="...">
                                        <div class="card-body text-center font-weight-bold">
                                            <h5 class="card-title"><?= $a['jenis_katalog']; ?></h5>
                                            <p class="card-text">Rp <?= $a['harga']; ?> / <?= $a['halaman']; ?> Halaman</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Ukuran : <?= $a['ukuran']; ?></li>
                                            <li class="list-group-item">Jenis Bahan : <?= $a['bahan_kertas']; ?></li>
                                            <li class="list-group-item">Cover : <?= $a['cover']; ?></li>
                                            <li class="list-group-item">Finishing : <?= $a['finishing']; ?></li>
                                            <li class="list-group-item">Cetakan : <?= $a['cetakan']; ?></li>
                                            <li class="list-group-item">Dok. File : <?= $a['dokFile']; ?></li>
                                            <?php if (!$a['images'] == null && $a['id_status'] == 5) : ?>
                                                <li class="list-group-item"><a href="<?= base_url('admin/Pemesanan/verify/' . $a['id']); ?>" class="btn btn-warning btn-sm btn-block">Konfirmasi Pembayaran</a></li>
                                            <?php endif; ?>
                                        </ul>
                                        <div class="card-body">
                                            <div class="float-left mt-0">
                                                <h6 class="ml-1">Status</h6>
                                                <?php if ($a['id_status'] == 2) : ?>
                                                    <span class="badge badge-pill badge-<?= $a['style'] ?>"><?= $a['konfirmasi']; ?></span>
                                                <?php else : ?>
                                                    <a href="<?= base_url('admin/pemesanan/updateStatus/' . $a['id']) ?>" class="badge badge-pill badge-<?= $a['style'] ?>"><?= $a['konfirmasi']; ?></a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="float-right font-weight-bold">
                                                <p>Jumlah : <?= $a['jumlah_katalog']; ?></p>
                                                <p>Total : Rp <?= $a['total']; ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer text-muted">
                                            <a href="<?= base_url('admin/pemesanan/update/' . $a['id']); ?>" class="btn btn-primary btn-sm btn-block mb-3">Edit <i class="icon ti-pencil-alt2 menu-icon"></i></a>
                                            <a href="<?= base_url('admin/pemesanan/delete/' . $a['id']); ?>" class="btn btn-danger btn-sm hapus btn-block">Hapus <i class="ti-trash icon menu-icon"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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