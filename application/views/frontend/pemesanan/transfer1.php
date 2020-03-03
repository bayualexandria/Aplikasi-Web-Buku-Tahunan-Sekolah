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
                    <h4 class="text-dark font-weight-bold"><?= $title; ?></h4>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <?php $id = $produk['id_bahan'];
                                $query = "SELECT `tbl_bahan`.* FROM `tbl_pemesanan` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id` WHERE `tbl_bahan`.`id`=$id";
                                $produck = $this->db->query($query)->row_array(); ?>
                                <img src="<?= base_url('assets/images/buku-tahunan-sekolah.jpg'); ?>" class="img-thumbnail w-75" style="border-radius: 5%;height:200px;width:auto" alt="">
                                <div class="mt-2">
                                    <h6 style="font-weight: 900;">Rp <?= $produck['harga']; ?>-, /<?= $produck['halaman']; ?></h6>
                                    <h6 style="font-weight: 900;" class="text-info">Bonus : <?= $produck['bonus']; ?></h6>
                                </div>
                            </div>
                        </div>
                        <table class="mt-3 table-striped table table-bordered">
                            <thead>
                                <tr>
                                    <th>Jenis Katalog</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php $id = $produck['id_katalog'];
                                        $query = "SELECT `tbl_katalog`.`jenis_katalog` FROM `tbl_pemesanan` JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` WHERE `tbl_katalog`.`id`=$id";
                                        $jenis = $this->db->query($query)->row_array(); ?>
                                        <?= $jenis['jenis_katalog']; ?>
                                    </td>
                                    <td><?= $produck['harga']; ?></td>
                                    <td><?= $produk['jumlah_katalog']; ?></td>

                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">Total</th>
                                    <th><?= $produk['total']; ?></th>
                                </tr>
                            </tbody>
                        </table>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <h6 class="font-weight-bold">Silahkan Transfer Ke No. Rekening Di Bawah Ini Atas Nama</h6>
                                <p>(* Transfer dengan nominal yang tertera pada total pemesanan)</p>
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="3" class="text-center">cv azharku media </th>
                                        <th class="text-justify bg-secondary" style="color:white;width:300px;">
                                            <img src="<?= base_url('assets/images/bank_jateng.png'); ?>" width="80px" />
                                            <span>
                                                1021-015276
                                            </span>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('Pemesanan/bukti_upload/' . $produk['id']); ?>" class="btn btn-info lanjut">Lanjutkan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>