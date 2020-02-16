<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="<?= base_url('admin/Home'); ?>"><img src="<?= base_url('assets/images/profile/azhar.png'); ?>" class="mr-2" alt="logo" style="height:3.5rem;" /></a>
    <a class="navbar-brand brand-logo-mini" href="<?= base_url('admin/Home'); ?>"><img src="<?= base_url('assets/images/profile/azhar.png'); ?>" alt="logo" style="height:3rem; width:3rem;" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="ti-view-list"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown mr-1">
        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
          <i class="ti-email mx-0"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
          <?php foreach ($message3 as $msg) : ?>
            <a href="<?= base_url('admin/Home/getMessage/'); ?><?= $msg['id']; ?>" class="dropdown-item">
              <div class="item-thumbnail">
                <img src="<?= base_url('assets/images/profile/') . $msg['logo']; ?>" alt="image" class="profile-pic">
              </div>
              <div class="item-content flex-grow">
                <h6 class="ellipsis font-weight-normal"><?= $msg['name']; ?>
                </h6>
                <p class="font-weight-light small-text text-muted mb-0"><?= $msg['email']; ?>
                </p>
                <p class="font-weight-lighter text-small"><?= date('d F Y', $msg['date_send']); ?></p>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </li>
      <div class="login" data-flashdata="<?= $this->session->flashdata('login'); ?>"></div>
      <div class="success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="ti-bell mx-0"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <div class="item-icon bg-success">
                <i class="ti-info-alt mx-0"></i>
              </div>
            </div>
            <div class="item-content">
              <h6 class="font-weight-normal">Application Error</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <div class="item-icon bg-warning">
                <i class="ti-settings mx-0"></i>
              </div>
            </div>
            <div class="item-content">
              <h6 class="font-weight-normal">Settings</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Private message
              </p>
            </div>
          </a>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <div class="item-icon bg-info">
                <i class="ti-user mx-0"></i>
              </div>
            </div>
            <div class="item-content">
              <h6 class="font-weight-normal">New user registration</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                2 days ago
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <h5 class="mt-2 mr-1"><?= $user['name']; ?></h5>
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="<?= base_url('assets/images/profile/') . $user['images']; ?>" alt="profile" />
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a href="<?= base_url('admin/User'); ?>" class="dropdown-item">
            <i class="ti-user text-primary"></i>
            My Profile
          </a>
          <a href="<?= base_url('admin/Auth/logout'); ?>" class="dropdown-item" id="log-out">
            <i class="ti-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="ti-view-list"></span>
    </button>
  </div>
</nav>
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Apakah Anda Yakin Ingin Logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('admin/Auth/logout') ?>" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>