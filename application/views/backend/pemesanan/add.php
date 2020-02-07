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
            <form action="" method="POST" name="formpemesanan">
              <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan Nama Pelanggan">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="no_hp">No Handphone</label>
                <input type="text" class="form-control" name="no_hp" placeholder="Masukan No Handphone">
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="id_ukuran">Jenis Ukuran</label>
                  <select name="id_ukuran" id="id_ukuran" class="form-control">
                    <option value="0">
                      <--Pilih Jenis Ukuran-->
                    </option>
                    <?php foreach ($Ukuran->result() as $u) : ?>
                      <option value="<?= $u->id; ?>"><?= $u->jenis_ukuran; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="id_bahan">Bahan Kertas</label>
                  <select name="id_bahan" id="id_bahan" class="form-control" onkeyup="jumlah()">
                    <option>--Masukan Bahan Kertas--</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="jumlah_katalog">Jumlah Katalog</label>
                  <select name="jumlah_katalog" id="b" class="form-control" onkeyup="jumlah()">
                    <option>--Masukan Jumlah Katalog--</option>
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                      <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" id="c" class="form-control" onkeyup="jumlah()" disabled />
              </div>
            </form>
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