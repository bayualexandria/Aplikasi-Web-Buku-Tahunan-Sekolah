<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h4 class="font-weight-bold mb-0">Halaman Utama</h4>
          </div>
          <div>
            <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
              <i class="ti-clipboard btn-icon-prepend"></i>Report
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Pesan</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $NumRowMessage; ?></h3>
              <i class="ti-email icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Pelanggan</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $NumRowUser; ?></h3>
              <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Data Buku Tahunan</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $NumRowBahan; ?></h3>
              <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Pemesanan</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $NumRowPemesanan; ?></h3>
              <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Sales details</p>
            <p class="text-muted font-weight-light">Received overcame oh sensible so at an. Formed do change merely to county it. Am separate contempt domestic to to oh. On relation my so addition branched.</p>
            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
            <canvas id="sales-chart"></canvas>
          </div>
          <div class="card border-right-0 border-left-0 border-bottom-0">
            <div class="d-flex justify-content-center justify-content-md-end">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-lg btn-outline-light dropdown-toggle rounded-0 border-top-0 border-bottom-0" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Today
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
              <button class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block" type="button"> View all </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card border-bottom-0">
          <div class="card-body pb-0">
            <p class="card-title">Purchases</p>
            <p class="text-muted font-weight-light">The argument in favor of using filler text goes something like this: If you use real content in the design process, anytime you reach a review</p>
            <div class="d-flex flex-wrap mb-5">
              <div class="mr-5 mt-3">
                <p class="text-muted">Status</p>
                <h3>362</h3>
              </div>
              <div class="mr-5 mt-3">
                <p class="text-muted">New users</p>
                <h3>187</h3>
              </div>
              <div class="mr-5 mt-3">
                <p class="text-muted">Chats</p>
                <h3>524</h3>
              </div>
              <div class="mt-3">
                <p class="text-muted">Feedbacks</p>
                <h3>509</h3>
              </div>
            </div>
          </div>
          <canvas id="order-chart" class="w-100"></canvas>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Top Products</p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Pelanggan</th>
                    <th>Produk</th>
                    <th>QTY</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($getPemesanan as $p) : ?>
                    <tr>
                      <td><?= $p['nama_pelanggan']; ?></td>
                      <td><?= $p['jenis_katalog']; ?></td>
                      <td class="text-danger"> <?= $p['jumlah_katalog']; ?><i class="ti-arrow-up"></i></td>
                      <td>
                        <a class="badge badge-<?= $p['style']; ?>" href="<?= base_url('admin/pemesanan/detail/' . $p['id_pelanggan']) ?>">
                          <?= $p['konfirmasi']; ?>
                        </a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">To Do Message Lists</h4>
            <div class="list-wrapper pt-2">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <?php foreach ($message as $msg) : ?>
                  <li class="pesan">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <img class="img-fluid mr-3" style="width:3rem;border-radius:50%;" src="<?= base_url('assets/images/profile/') . $msg['logo']; ?>" alt="image" class="profile-pic">
                        <?= $msg['mess']; ?>
                      </label>
                    </div>
                    <a href="<?= base_url('admin/Home/deleteMessage/') . $msg['id']; ?>" class="remove ti-trash"></a>
                    <i class="aktif"></i>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="add-items d-flex mb-0 mt-4">
              <input type="text" class="form-control todo-list-input mr-2" placeholder="Add new task">
              <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="ti-location-arrow"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
          <div class="card-body">
            <p class="card-title">Detail Laporan Pemesanan</p>
            <div class="row">
              <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                <div class="ml-xl-4">
                  <h3 class="font-weight-light mb-xl-4">Diagram Status Pemesanan</h3>
                  <p class="text-muted mb-2 mb-xl-0">Total diagram detail dari sebuah status pemesanan Buku Tahunan pada Pelanggan</p>
                </div>
              </div>
              <div class="col-md-10 col-xl-9">
                <div class="row">
                  <div class="col-md-6 mt-3 col-xl-5">
                    <canvas id="north-america-chart"></canvas>
                    <div id="north-america-legend"></div>
                  </div>
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
  <!-- partial -->
</div>