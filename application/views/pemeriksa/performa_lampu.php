<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_performa')): ?>
  <div class="form-group">
    <div class="col-lg-12">
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $pesan; ?>
      </div>
    </div>
  </div>
<?php endif ?>

  <div class="col-lg-12">
      <button class="btn btn-success ml-1 mb-3" type="button" id="add_button" data-target="#data-modal" data-toggle="modal"><i class="fas fa-folder"></i> Seluruh Data Performa Lampu</button>
  </div>
<body>
  <style>
      #chart_wrap {
      position: relative;
      padding-bottom: 100%;
      height: 0;
      overflow:hidden;
    }

    #piechart {
      position: absolute;
      top: 0;
      left: 0;
      width:100%;
      height:500px;
    }
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Status', 'Jumlah'],
        ['Beroperasi', <?= $operasi['operasi']; ?>],
        ['Tidak Beroperasi', <?= $no_operasi['no_operasi']; ?>]
      ]);

      var options = {
        title: 'Performa Lampu pada Tanggal <?= $tanggal['tanggal']; ?>',
        width: '100%',
        height: '500px'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>


        <div class="container">
        <div class="row">
          <div class="col-xs-6 col-md-10">
            <!-- <div id="piechart"> -->
            <div class="overflow-auto" id="chart_wrap">
                <div id="piechart"></div>
            </div>
              <!-- Chart goes here -->
            </div>
            <div class="col-xs-6 col-md-2">
              <h4><u>Keterangan:</u></h4>
              <span class="badge badge-primary mt-3" style="pointer-events: none;" type="button" disabled>Nomor Lampu Operasi Normal</span>
              <h9 class="ml-2 mt-7" type="text"><?= $keop['ket_operasi']; ?></h9><br>
              <span class="badge badge-danger mt-3" style="pointer-events: none;" type="button" disabled>Nomor Lampu Tidak Beroperasi</span>
              <h9 class="ml-2 mt-7" type="text"><?= $kenop['ket_no_operasi']; ?></h9>
            </div>
          </div>
        </div>
        </div>








</body>
  </div>
  <!-- ============================================================== -->
  <!-- TABEL-->
  <!-- ============================================================== -->



    <!-- ============================================================== -->
    <!-- Modal Data-->
    <!-- ============================================================== -->
    <div class="modal fade" id="data-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalPetugas">Data Performa Lampu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="15%">Tanggal</th>
                  <th width="10%">Jml Operasi</th>
                  <th width="10%">Jml Tdk Operasi</th>
                  <th width="10%">Ket. Operasi</th>
                  <th width="10%">Ket. Tdk Operaso</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data_performa as $lkp) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $lkp['tanggal']; ?> </td>
                    <td><?= $lkp['operasi']; ?> </td>
                    <td><?= $lkp['no_operasi']; ?> </td>
                    <td><?= $lkp['ket_operasi']; ?> </td>
                    <td><?= $lkp['ket_no_operasi']; ?> </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>

        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- END Modal Tambah Peralatan -->
    <!-- ============================================================== -->
