<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <img class="logo-img" src="<?= base_url('assets/'); ?>img/logo.png" width="50" height="60" alt="logo">
    </div>
    <div class="sidebar-brand-text mx-2">SIM-PPL<sup><?= $role_name_sidebar; ?></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="<?= $sidebar_dashboard; ?>">
    <a class="nav-link" href="<?= base_url('admin'); ?>">
      <i class="fas fa-columns"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Heading -->
  <div class="sidebar-heading">
    Master Data
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Penjadwalan -->
  <li class="<?= $sidebar_penjadwalan; ?>">
    <a class="nav-link" href="index.html">
      <i class="fas fa-clipboard-list"></i>
      <span>Penjadwalan</span></a>
  </li>

  <!-- Nav Item - Petugas -->
  <li class="<?= $sidebar_petugas; ?>">
    <a class="nav-link" href="<?= base_url('admin/data_petugas'); ?>">
      <i class="fas fa-users"></i>
      <span>Data Petugas</span></a>
  </li>

  <!-- Nav Item - Peralatan -->
  <li class="<?= $sidebar_peralatan; ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeralatan" aria-expanded="true" aria-controls="collapsePeralatan">
      <i class="fas fa-toolbox"></i>
      <span> Data Peralatan</span>
    </a>
    <div id="collapsePeralatan" class="<?= $sidebar_peralatan_collapse; ?>" aria-labelledby="headingPeralatan" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Submenu:</h6>
        <a class="<?= $sidebar_peralatan_semua; ?>" href="<?= base_url('admin/data_peralatan'); ?>">Semua Peralatan</a>
      <!-- <a class="collapse-item" href="#">Ambil Peralatan</a> -->
      </div>
    </div>
  </li>

  <!-- Nav Item - Perawatan-->
  <li class="<?= $sidebar_perawatan; ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerawatan" aria-expanded="true" aria-controls="collapsePerawatan">
      <i class="fas fa-wrench"></i>
      <span> Data Pemeliharaan</span>
    </a>
    <div id="collapsePerawatan" class="<?= $sidebar_perawatan_collapse; ?>" aria-labelledby="headingPerawatan" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Submenu:</h6>
        <a class="<?= $sidebar_perawatan_semua; ?>" href="<?= base_url('admin/data_perawatan'); ?>">Laporan Pemeliharaan</a>
        <a class="<?= $sidebar_perawatan_hari; ?>" href="<?= base_url('admin/data_perawatan_harian'); ?>">Pemeliharaan Harian</a>
        <a class="<?= $sidebar_perawatan_minggu; ?>" href="<?= base_url('admin/data_perawatan_mingguan'); ?>">Pemeliharaan Mingguan</a>
        <a class="<?= $sidebar_perawatan_bulan; ?>" href="<?= base_url('admin/data_perawatan_bulanan'); ?>">Pemeliharaan Bulanan</a>
      <!-- <a class="collapse-item" href="#">Ambil Peralatan</a> -->
      </div>
    </div>
  </li>

  <!-- Nav Item - Facility Logbook -->
  <li class="<?= $sidebar_fl; ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLogbook" aria-expanded="true" aria-controls="collapseLogbook">
      <i class="fas fa-book"></i>
      <span> Facility Logbook</span>
    </a>
    <div id="collapseLogbook" class="<?= $sidebar_fl_collapse; ?>" aria-labelledby="headingLogbook" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Submenu:</h6>
        <a class="<?= $sidebar_fl_data; ?>" href="<?= base_url('admin/data_facility_logbook'); ?>">Data</a>
        <a class="<?= $sidebar_fl_print; ?>" href="<?= base_url('admin/data_facility_logbook_print'); ?>">Print</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Laporan Kerusakan dan Perbaikan -->
  <li class="<?= $sidebar_lkp; ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLKP" aria-expanded="true" aria-controls="collapseLKP">
      <i class="fas fa-tools"></i>
      <span> Laporan Kerusakan dan Perbaikan</span>
    </a>
    <div id="collapseLKP" class="<?= $sidebar_lkp_collapse; ?>" aria-labelledby="headingLKP" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Submenu:</h6>
        <a class="<?= $sidebar_lkp_data; ?>" href="<?= base_url('admin/data_laporan_kerusakan'); ?>">Data</a>
        <a class="<?= $sidebar_lkp_print; ?>" href="<?= base_url('admin/data_laporan_kerusakan_print'); ?>">Print</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Meter Reading -->
  <li class="<?= $sidebar_mr; ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMeterReadomg" aria-expanded="true" aria-controls="collapseMeterReadomg">
      <i class="fas fa-tachometer-alt"></i>
      <span> Meter Reading</span>
    </a>
    <div id="collapseMeterReadomg" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Submenu:</h6>
        <a class="collapse-item" href="#">Data CCR</a>
        <a class="collapse-item" href="#">Print Data CCR</a>
        <a class="collapse-item" href="#">Data UPS</a>
        <a class="collapse-item" href="#">Print Data UPS</a>
        <a class="collapse-item" href="#">Data Genset</a>
        <a class="collapse-item" href="#">Print Data Genset</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - SOP -->
  <li class="<?= $sidebar_sop; ?>">
    <a class="nav-link" href="<?= base_url('admin/sop'); ?>">
      <i class="fas fa-file-contract"></i>
      <span>SOP</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
