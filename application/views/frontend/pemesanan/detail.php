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
        <div class="container" style="margin:10px auto;">
          <h3 class="card-title"><?= $title; ?></h3>
          <div class="row mt-5">
            <div class="col-md-6 text-center">
              <img src="<?= base_url('assets/images/buku-tahunan-sekolah.jpg'); ?>" class="img-thumbnail w-75" style="border-radius: 5%;height:200px;width:auto" alt="">
              <div class="mt-2">
                <h6 style="font-weight: 900;">Rp <?= $detail['harga']; ?>-, /<?= $detail['halaman']; ?></h6>
                <h6 style="font-weight: 900;" class="text-info">Bonus : <?= $detail['bonus']; ?></h6>
              </div>
              <div style="margin-top: 350px">
                <a href="<?= base_url('Pemesanan/pembayaran/' . $detail['id']); ?>" class="btn btn-info btn-block">Lanjutkan Ke Pembayaran</a>
              </div>
            </div>
            <div class="col-md-6  border-left">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <h6 style="font-weight: bold;"><?= $detail['jenis_katalog']; ?></h6>
                </li>
                <li class="list-group-item">
                  <h6>Ukuran : <?= $detail['ukuran']; ?></h6>
                </li>
                <li class="list-group-item">
                  <h6>Jenis kertas : <?= $detail['bahan_kertas']; ?></h6>
                </li>
                <li class="list-group-item">
                  <h6>Cover : <?= $detail['cover']; ?></h6>
                </li>
                <li class="list-group-item">
                  <h6>Finishing : <?= $detail['finishing']; ?></h6>
                </li>
                <li class="list-group-item">
                  <h6>Cetakan : <?= $detail['cetakan']; ?></h6>
                </li>
                <li class="list-group-item">
                  <h6>Dok. File : <?= $detail['dokFile']; ?></h6>
                </li>
                <li class="list-group-item">
                  <h6>Harga : Rp <?= $detail['harga']; ?></h6>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-5">
                      <h6>Jumlah : <?= $detail['jumlah_katalog']; ?></h6>
                    </div>
                    <div class="col-md font-weight-bold">
                      Total : Rp <?= $detail['total']; ?>
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-6">
                      <h6>Status : <span class="badge badge-<?= $detail['style']; ?> badge-pill"><?= $detail['konfirmasi']; ?></span></h6>
                    </div>
                    <?php if ($detail['konfirmasi'] == 'Order') : ?>
                      <div class="col-md">
                        <a href="<?= base_url('pemesanan/batal/' . $detail['id']) ?>" class="btn btn-block btn-danger hapus">Batal Pemesanan</a>
                      </div>
                    <?php endif; ?>
                  </div>
                </li>
                <?php if ($detail['konfirmasi'] == 'Order') : ?>
                  <li class="list-group-item">
                    <a href="<?= base_url('pemesanan/update/' . $detail['id']) ?>" class="btn btn-block btn-info">Update Pemesanan</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>