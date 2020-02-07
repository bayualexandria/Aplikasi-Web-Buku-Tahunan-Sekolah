<div class="container-fluid page-body-wrapper">
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Home');?>">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-id-badge menu-icon"></i>
              <span class="menu-title">Buku Tahunan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/Pemesanan')?>">Data Pemesanan</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Produk')?>">
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
                <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/Admin');?>"> Data Admin </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/Pelanggan');?>"> Data Pelanggan </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/User');?>">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">My Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Company');?>">
              <i class="ti-world menu-icon"></i>
              <span class="menu-title">Tentang Perusahaan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Auth/logout')?>" data-toggle="modal" data-target="#logout">
              <i class="ti-power-off menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>