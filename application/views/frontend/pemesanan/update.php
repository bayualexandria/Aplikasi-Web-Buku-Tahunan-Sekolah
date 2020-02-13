<div class="container" style="margin-top: 15rem;">
    <div class="row justify-content-center" style="min-height: 20rem;">
        <div class="col-md-3">
            <div class="text-center mt-5">
                <img src="<?= base_url('assets/images/profile/' . $user['images']); ?>" alt="profile" style="width: 50%;border-radius:50%;border:2px solid silver;">
            </div>
            <div class="text-upercase mt-3 text-center" style="font-weight:800;color:black; font-size:1.3rem;">
                <?= $user['name']; ?>
            </div>
            <div class="text-muted text-center" style="font-weight:800;color:black; font-size:0.9rem;">
                <?= $user['email_pelanggan']; ?>
            </div>
            <a href="<?= base_url('profile') ?>" class="btn btn-primary btn-block mt-5">Edit Profile</a>
            <div class="mt-3">
                <div class="container">
                    <div class="text-justify" style="font-weight:600;">
                        <?= $user['alamat']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md">
            <div class="card">
                <div class="container" style="margin:10px auto;">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="row mt-5">
                        <div class="col-md-6 text-center">
                            <img src="<?= base_url('assets/images/buku-tahunan-sekolah.jpg'); ?>" class="img-thumbnail w-75" style="border-radius: 5%;height:200px;width:auto" alt="">
                            <div class="mt-2">
                                <h6 style="font-weight: 900;">Rp <?= $produck['harga']; ?>-, /<?= $produck['halaman']; ?></h6>
                                <h6 style="font-weight: 900;" class="text-info">Bonus : <?= $produck['bonus']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-6  border-left">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h6>Ukuran : <?= $produck['ukuran']; ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <h6>Jenis kertas : <?= $produck['bahan_kertas']; ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <h6>Cover : <?= $produck['cover']; ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <h6>Finishing : <?= $produck['finishing']; ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <h6>Cetakan : <?= $produck['cetakan']; ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <h6>Dok. File : <?= $produck['dokFile']; ?></h6>
                                </li>
                                <form method="POST" action="">
                                    <input type="hidden" name="id" value="<?= $produck['id'] ?>" />
                                    <li class="list-group-item">
                                        <input type="hidden" name="nama_pelanggan" value="<?= $user['name']; ?>">
                                        <input type="hidden" name="id_pelanggan" value="<?= $user['id']; ?>">
                                        <input type="hidden" name="id_bahan" value="<?= $produck['id_bahan']; ?>">
                                        <input type="hidden" name="id_katalog" value="<?= $produck['id_katalog']; ?>">
                                        <input type="hidden" name="harga" value="<?= $produck['harga']; ?>" id="harga">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <?php if (form_error('jumlah_katalog') == 0) : ?>
                                                        <input class="form-control" name="jumlah_katalog" type="number" min="1" max="12" step="1" value="<?= $produck['jumlah_katalog']; ?>" id="jumlah">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <h6 style="margin-right: -15px; margin-top:10px;">Rp</h6>
                                                <div class="col-md">
                                                    <input type="text text-muted mr-5" style="font-weight:800;color:silver; font-size:1.3rem;" class="form-control-plaintext position-absolute" value="<?= $produck['total']; ?>" id="total" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <button type="submit" class="btn btn-info btn-block">Order Now</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>