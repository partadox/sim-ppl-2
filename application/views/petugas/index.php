<!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  </div>

  <!-- Content Row -->
  <!-- Begin Page Content -->
  <div class="container-fluid">
          <div class="row">

            <!-- Jumlah Petugas -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Petugas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $petugas; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jumlah Peralatan -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Peralatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $peralatan; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toolbox"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jumlah SkCadang -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Suku Cadang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $skcadang; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toolbox"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jumlah skcadang_keluar -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Suku Cadang Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $skcadang_keluar; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sign-out-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="row">

            <!-- Jumlah Pemeliharaan -->
            <div class="col md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pemeliharaan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $petugas; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wrench"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jumlah Facility Logbook -->
            <div class="col md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Facility Logbook</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $fl; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jumlah Laporan Kerusakan -->
            <div class="col md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan Kerusakan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $skcadang; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tools"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- Jumlah Mr CCR -->
            <div class="col md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data Meter Reading CCR</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ccr; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tachometer-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jumlah Mr UPS -->
            <div class="col md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data Meter Reading UPS</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ups; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tachometer-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jumlah Laporan Mr Genset -->
            <div class="col md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data Meter Reading Genset</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $genset; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tachometer-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>


  <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->
