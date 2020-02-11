<div class="container" style="margin-top: 15rem;">
    <div class="row justify-content-center" style="min-height: 20rem;">
        <div class="col-md-3">
            <div class="text-center mt-5">
                <img src="<?= base_url('assets/images/profile/' . $user['images']); ?>" alt="profile" style="width: 50%;border-radius:50%;border:2px solid silver;">
            </div>
            <div class="text-upercase mt-3 text-center" style="font-weight:800;font-size:1.3rem;">
                <?= $user['name']; ?>
            </div>
            <div class="text-muted text-center" style="font-weight:800;font-size:0.9rem;">
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
            <div class="login" data-flashdata="<?= $this->session->flashdata('login'); ?>"></div>
            <div class="success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
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
                                            <div class="our-pricing--package <?= $p['bg']; ?>">
                                                <h3 class="text-uppercase d-block"><?= $p['jenis_katalog']; ?></h3>
                                                <div class="our-pricing--package__data">
                                                    <span>
                                                        <p class="pt-5" style="font-size: 2rem;">Rp<?= $p['harga']; ?></p><?= $p['halaman']; ?>
                                                    </span>
                                                    <ul>
                                                        <li><?= $p['ukuran']; ?></li>
                                                        <li><?= $p['bahan_kertas']; ?></li>

                                                        <li>
                                                            <h5>BONUS</h5>
                                                        </li>
                                                        <li><?= $p['bonus']; ?></li>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md my-5 mx-5">
                                    <?php $id = $user['id'];
                                    $query = "SELECT `tbl_pemesanan`.*,`tbl_katalog`.*,`tbl_bahan`.*,`pelanggan`.* FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id`  JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id` WHERE `tbl_pemesanan`.`id_pelanggan`=$id";
                                    $orderList = $this->db->query($query)->result_array(); ?>

                                    <ul class="list-group">
                                        <?php foreach ($orderList as $ol) : ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $ol['jenis_katalog']; ?> ( <?= date('d-M-Y',$ol['date_created']); ?>)
                                                <span class="badge badge-primary badge-pill">14</span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>