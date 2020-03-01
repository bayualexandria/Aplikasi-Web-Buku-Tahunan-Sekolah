<div class="main-panel">
  <div class="content-wrapper">
    <div class="row mb-3">
      <div class="col-md-5">
        <div class="input-group">
          <form action="<?= base_url('admin/Pemesanan'); ?>" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search keyword" name="keyword">
              <div class="input-group-append" autocomplete="off" autofocus>
                <input class="btn btn-outline-primary" type="submit" value="Search" name="submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $title; ?></h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Handphone</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($All->result())) : ?>
                    <tr class=" text-center">
                      <td colspan="8" class="col-md">
                        <div class=" justify-content-center alert alert-danger" role="alert">
                          Data Not Found
                        </div>
                      </td>
                    </tr>
                  <?php endif; ?>
                  <?php foreach ($All->result() as $psn) : ?>

                    <tr>
                      <td><?= ++$start; ?></td>
                      <td><?= $psn->name; ?></td>
                      <td><?= $psn->alamat; ?></td>
                      <td><?= $psn->no_hp; ?></td>
                      <td>
                        <?php $id = $psn->id;
                        $query = "SELECT `tbl_pemesanan`.* FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id` WHERE `tbl_pemesanan`.`id_pelanggan`=$id";
                        $detail = $this->db->query($query)->row_array(); ?>
                        <?php if ($detail['id_pelanggan'] && $detail['id_status'] == 2) : ?>
                          <a href="<?= base_url('admin/pemesanan/detail/' . $psn->id) ?>"><i class="ti-eye text-primary"></i></a>
                          <a href="<?= base_url('admin/Pemesanan/laporan_pdf/' . $detail['id_pelanggan']) ?>" class="badge badge-success">Laporan <i class="ti-file"></i></a>
                        <?php elseif ($detail['id_pelanggan']) : ?>
                          <a href="<?= base_url('admin/pemesanan/detail/' . $psn->id) ?>"><i class="ti-eye text-primary"></i></a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?= $this->pagination->create_links(); ?>
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