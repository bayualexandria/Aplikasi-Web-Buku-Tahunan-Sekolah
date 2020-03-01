<div class="container-fluid page-body-wrapper">
  <div class="success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Home'); ?>">
          <i class="ti-shield menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Produk') ?>">
          <i class="ti-layout-list-post menu-icon"></i>
          <span class="menu-title">Daftar Produk</span>
        </a>
      </li>
      <div class="hr fa-flip-horizontal"></div>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="ti-settings menu-icon"></i>
          <span class="menu-title">Data Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/Admin'); ?>"> Data Admin </a></li>
            <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/Pelanggan'); ?>"> Data Pelanggan </a></li>
            <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/pemesanan'); ?>">Data Pemesanan </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/User'); ?>">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">My Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Company'); ?>">
          <i class="ti-world menu-icon"></i>
          <span class="menu-title">Tentang Perusahaan</span>
        </a>
      </li>
      <li class="nav-item" id="log-out">
        <a class="nav-link" href="<?= base_url('admin/Auth/logout') ?>" id="logout">
          <i class="ti-power-off menu-icon"></i>
          <span class="menu-title" id="log-out">Logout</span>
        </a>
      </li>
    </ul>
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