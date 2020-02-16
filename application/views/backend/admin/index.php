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
            <h4 class="card-title"><?= $title; ?></h4>
            <p class="card-description float-right">
              <a href="" data-toggle="modal" data-target="#add" class="btn-rounded btn-success btn-sm" style="text-decoration:none;"><i class="ti-plus menu-icon"></i> Tambah Data Admin</a>
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Admin</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($admin->result() as $a) : ?>
                    <tr>

                      <td><?= $i++; ?></td>
                      <td><?= $a->name; ?></td>
                      <td><?= $a->email; ?></td>
                      <td>
                        <?php if ($a->role_id == 1) : ?>
                          <?= 'Administrator'; ?>

                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if ($a->is_active == 1) : ?>
                          <label class="badge badge-success"><?= 'Aktif'; ?></label>
                        <?php else : ?>
                          <label class="badge badge-danger"><?= 'Tidak Aktif'; ?></label>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="<?= base_url('admin/Admin/update/' . $a->id); ?>"><i class="text-primary ti-pencil-alt2 menu-icon"></i></a>
                        <a href="<?= base_url('admin/Admin/delete/' . $a->id); ?>" class="hapus"><i class="text-danger ti-trash menu-icon hapus"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tamah Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Admin') ?>" method="POST">
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="password2">Re Password</label>
            <input type="password" name="password2" id="password2" class="form-control">
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="is_active" class="custom-control-input"  value="1" id="customCheck1" checked>
            <label class="custom-control-label" for="customCheck1">is active?</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>