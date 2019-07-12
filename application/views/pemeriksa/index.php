<!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  </div>

  <!-- Content Row -->
  <!-- Begin Page Content -->
  <div class="container-fluid">
          <div class="row">

            <!-- Jumlah Pemeliharaan Belum-->
            <div class="col md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jml Pemeliharaan Belum Disetujui</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perawatan_belum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-edit"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Jumlah Pemeliharaan Sudah -->
            <div class="col md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jml Pemeliharaan Sudah Disetujui</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perawatan_sudah; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- Jumlah FL Belum -->
            <div class="col md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Facility Logbook Belum Disetujui</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $fl_belum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-edit"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Jumlah FL Sudah -->
            <div class="col md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Facility Logbook Sudah Disetujui</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $fl_sudah; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <!-- Jumlah LKP Belum -->
            <div class="col md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Laporan Kerusakan Belum Disetujui</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $lkp_belum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-edit"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Jumlah LKP Sudah -->
            <div class="col md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Laporan Kerusakan Sudah Disetujui</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $lkp_sudah; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>


  <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->
