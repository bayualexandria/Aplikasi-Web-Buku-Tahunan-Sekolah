<div class="container" style="margin-top: 15rem;">
    <div class="row justify-content-center" style="min-height: 20rem;">
        <div class="col-md-3">
            <div class="text-center mt-5">
                <img src="<?= base_url('assets/images/profile/' . $user['images']); ?>" alt="profile" style="width: 50%;border-radius:50%;border:2px solid silver;">
            </div>
            <div class="text-upercase mt-3 text-center" style="font-weight:800;text-shadow:1px 1px 1px 1px black;color:black; font-size:1.3rem;">
                <?= $user['name']; ?>
            </div>
            <div class="text-muted text-center" style="font-weight:800;text-shadow:1px 1px 1px 1px black;color:black; font-size:0.9rem;">
                <?= $user['email_pelanggan']; ?>
            </div>
            <a href="<?= base_url('profile') ?>" class="btn btn-primary btn-block mt-5">Edit Profile</a>
            <div class="mt-3">
                <div class="container">
                    <div class="text-justify" style="text-shadow:1px 1px 1px 1px black;font-weight:600;">
                        <?= $user['alamat']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md">
        <div class="login" data-flashdata="<?= $this->session->flashdata('login'); ?>"></div>
            <nav style="font-weight: 800;">
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-dashboard-tab" data-toggle="tab" href="#nav-dashboard" role="tab" aria-controls="nav-dashboard" aria-selected="false"> <i class="ti-direction menu-icon"></i> Dashboard</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <i class="ti-key menu-icon"></i> Daftar Pemesanan</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <i class="ti-key menu-icon"></i> Status Pemesanan</a>
                </div>
            </nav>
            <div class="card mt-5 " style="font-weight: 500;">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="row text-center">
                                    <?php foreach ($producks as $p) : ?>
                                        <div class="col-md-4">
                                            <div class="our-pricing--package <?= $p['bg_produck']; ?>">
                                                <h3>Price</h3>
                                                <div class="our-pricing--package__data">
                                                    <span>
                                                        <p class="pt-5" style="font-size: 2rem;">Rp<?= $p['price']; ?></p><?= $p['pages']; ?> pages
                                                    </span>
                                                    <ul>
                                                        <li><?= $p['ukuran']; ?></li>
                                                        <li><?= $p['cetak']; ?></li>
                                                        <li><?= $p['bahan']; ?></li>
                                                        <li><?= $p['cover']; ?></li>
                                                    </ul>
                                                    <a href="<?= base_url('pemesanan/order/' . $p['id']) ?>" class="button small">Choose Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <form method="POST" action="http://localhost/ta/admin/User/ubahpassword">
                                        <div class="form-group row">
                                            <!-- <label for="password" class="col-sm-2 col-form-label">Password</label> -->
                                            <div class="col-sm-10">
                                                <input id="password" class="form-control" type="hidden" name="password" value="$2y$10$btkaQ673w5pVjsrwEblkmuGHP.VCbPZnfVuQy71VXwJiC6HOjfrpK" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-10">
                                                <input id="passwordbaru" class="form-control" type="password" name="passwordbaru">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="konfpasswordbaru" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                                            <div class="col-sm-10">
                                                <input id="konfpasswordbaru" class="form-control" type="password" name="konfpasswordbaru">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                                            </div>
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
</div>