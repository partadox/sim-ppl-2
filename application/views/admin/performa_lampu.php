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
      <button class="btn btn-primary mb-3" type="button" id="add_button" data-target="#alat-modal" data-toggle="modal"><i class="far fas fa-plus"></i> Performa Lampu</button>
  </div>
<body>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['status', 'jumlah'],
        <?php
        foreach ($operasi as $row) {
            echo "['".$row["status"]."',".$row["jumlah"]."],";
        }
         ?>
      ]);

      var options = {
        title: 'Grafik Performa Lampu Runway'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

  <div class="row mb-5">
    <div class="col">
      <div class="card shadow ">
        <div class="card-body" id="piechart" style="width: 900px; height: 500px;"></div>
      </div>
    </div>
    <div class="col">
      <div class="card shadow">
        <div class="card-body" style="height: 500px;">
          <h3 type="text">Keterangan :</h3>
          <button class="btn btn-primary mt-3" style="pointer-events: none;" type="button" disabled>Nomor Lampu Operasi Normal</button>
          <h9 class="ml-2 mt-7" type="text"><?= $keop['keterangan']; ?></h9>
          <button class="btn btn-danger mt-3" style="pointer-events: none;" type="button" disabled>Nomor Lampu Tidak Beroperasi</button>
          <h9 class="ml-2 mt-7" type="text"><?= $kenop['keterangan']; ?></h9>
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
  <!-- Modal Tambah Peralatan -->
  <!-- ============================================================== -->
  <div class="modal fade" id="alat-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalPetugas">Data Performa Lampu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="<?= base_url('admin/performa_lampu_op'); ?>" method="post">
          <div class="row">
            <div class="col">
              <label>Jumlah Lampu Operasi Normal</label>
              <input type="number" class="form-control" id="operasi" name="operasi">
              <?= form_error('operasi', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col">
              <label>Lampu yang Beroperasi</label>
              <input type="text" class="form-control" id="ket_operasi" name="ket_operasi" placeholder="1, 2, 3...">
              <?= form_error('ket_operasi', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary mt-4">Data Lampu Operasi</button>
            </div>
          </div>
          </form>

              <form action="<?= base_url('admin/performa_lampu_nop'); ?>" method="post">
              <div class="row">
                <div class="col">
                  <label class="mt-4">Jumlah Lampu No Operasi</label>
                  <input type="number" class="form-control" id="no_operasi" name="no_operasi">
                  <?= form_error('no_operasi', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label class="mt-4">Lampu tidak Beroperasi</label>
                  <input type="text" class="form-control" id="ket_no_operasi" name="ket_no_operasi" placeholder="4, 5, 6...">
                  <?= form_error('ket_no_operasi', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-danger mt-5">Data Lampu No Operasi</button>
                </div>
              </div>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

        </div>

      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- END Modal Tambah Peralatan -->
  <!-- ============================================================== -->
