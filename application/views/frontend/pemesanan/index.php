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
                    <a class="nav-item nav-link" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="false"> <i class="ti-key menu-icon"></i> Daftar Pemesanan</a>
                    <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"> <i class="ti-key menu-icon"></i> Status Pemesanan</a>
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
                    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md my-5 mx-5">
                                    <?php $id = $user['id'];
                                    $query = "SELECT `tbl_pemesanan`.*,`tbl_katalog`.`jenis_katalog`,`tbl_status`.`style`,`tbl_status`.`konfirmasi` FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id`  JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id`  JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id` WHERE `tbl_pemesanan`.`id_pelanggan`=$id ORDER BY `tbl_pemesanan`.`date_created` ASC";
                                    $orderList = $this->db->query($query)->result_array(); ?>

                                    <ul class="list-group">
                                        <?php foreach ($orderList as $ol) : ?>
                                            <?php if ($ol['style'] == 'danger') : ?>
                                            <?php else : ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <?= $ol['jenis_katalog']; ?> <p class="float-left mt-3" style="font-size: 12px;font-weight:bold"><?= date('d F Y', $ol['date_created']); ?></p>
                                                    <div class="float-left">
                                                        <!-- <?php if ($ol['konfirmasi'] == 'order') : ?>
                                                            <a href="<?= base_url('pemesanan/batal/' . $ol['id']); ?>" class="badge badge-danger badge-pill">cancel</a>
                                                        <?php endif; ?> -->
                                                        <a href="<?= base_url('pemesanan/detail/' . $ol['id']); ?>" class="badge badge-primary badge-pill">detail</a>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php $id = $user['id'];
                                    $query = "SELECT `tbl_pemesanan`.* FROM `pelanggan` JOIN `tbl_pemesanan` ON `pelanggan`.`id`=`tbl_pemesanan`.`id_pelanggan` WHERE `pelanggan`.`id`=$id ";
                                    $status = $this->db->query($query)->result_array(); ?>
                                    <?php if ($status[0]['id_status'] == 2) : ?>
                                        <div class="mt-3 float-right">
                                            <a href="<?= base_url('pemesanan/laporan_pdf'); ?>" class="btn btn-secondary">Laporan <i class="fa fa-print"></i></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                        <div class="container">
                            <?php $id = $user['id'];
                            $query = "SELECT `tbl_pemesanan`.*,`tbl_katalog`.`jenis_katalog`,`tbl_status`.`konfirmasi`,`tbl_status`.`style` FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id`  JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id` JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id` WHERE `tbl_pemesanan`.`id_pelanggan`=$id ORDER BY `tbl_pemesanan`.`date_created` DESC";
                            $orderList = $this->db->query($query)->result_array(); ?>
                            <?php foreach ($orderList as $oL) : ?>
                                <div class="row mt-2">
                                    <div class="list-group mx-2 mb-2">
                                        <a href="#" class="list-group-item list-group-item-action active ">
                                            <div class="d-flex justify-content-between" style="width: 667px;">
                                                <h5 class="mb-1"><?= $oL['jenis_katalog']; ?></h5>
                                                <small><?= date('d M', $oL['date_created']); ?></small>
                                            </div>
                                            <p class="mb-1 pt-3">Status Pemesanan</p>
                                            <small class="badge badge-pill badge-<?= $oL['style']; ?>"><?= $oL['konfirmasi']; ?></small>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>