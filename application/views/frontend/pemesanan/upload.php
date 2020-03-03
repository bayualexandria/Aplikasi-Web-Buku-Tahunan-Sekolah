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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><?= $title; ?></h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-bold">Pemesanan</h5>
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
                                    <?php $id = $upload['id_katalog'];
                                    $query = "SELECT `tbl_katalog`.`jenis_katalog` FROM `tbl_pemesanan` JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` WHERE `tbl_katalog`.`id`=$id";
                                    $jenis = $this->db->query($query)->row_array(); ?>
                                    <?= $jenis['jenis_katalog']; ?>
                                </td>
                                <td><?= $upload['harga']; ?></td>
                                <td><?= $upload['jumlah_katalog']; ?></td>

                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">Total</th>
                                <th><?= $upload['total']; ?></th>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="font-weight-bold">Transfer Pembayaran</h5>
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
                <div class="card-footer text-muted">
                    (* Silahkan upload bukti pembayaran anda)
                   <?php echo form_open_multipart('Pemesanan/upload/'.$upload['id']); ?>
                    <input type="hidden" name="id" value="<?= $upload['id']; ?>">
                    <div class="row">
                        <div class="col-md-5">
                                <div class="custom-file">
                                    <input type="file" name="images" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                        </div>
                        <div class="col-md">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>