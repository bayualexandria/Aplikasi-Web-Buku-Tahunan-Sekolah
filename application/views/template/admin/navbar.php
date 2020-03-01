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