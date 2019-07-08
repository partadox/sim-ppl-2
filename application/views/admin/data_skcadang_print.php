<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_alat')): ?>
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
    <div class="form-group">
        <label>Masukan Bulan Laporan</label>
        <div class="row">
          <div class="col">
            <input type="month" class="form-control" id="date" name="date"  data-date-format="DD MMMM YYYY">
            <?= form_error('add_tanggal', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
              <button class="btn btn-primary mb-3" type="button" id="cari" name="cari"><i class="fas fa-search"></i>Cari Data (BELUM)</button>
                <button class="btn btn-success mb-3 ml-3" type="button" id="add_button" onclick="printDiv('table')"><i class="fas fa-print"></i></i>Print Data</button>
          </div>
      </div>
    </div>
</div>
  </div>
  <!-- ============================================================== -->
  <!-- TABEL-->
  <!-- ============================================================== -->
  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-uys7{border-color:inherit;text-align:center}
    .tg .tg-zoz6{font-size:11px;border-color:inherit;text-align:center}
    .tg .tg-xldj{border-color:inherit;text-align:left}
    .tg .tg-s268{text-align:left}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    </style>
  <div class="container-fluid">
  <div class="card mb-4">
        <div class="card-body">
          <div class="table-responsive" id="table">
            <table class="tg table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="tg-0lax">No</th>
                  <th class="tg-0pky">Tanggal</th>
                  <th class="tg-0lax">Kode</th>
                  <th class="tg-0lax">Nama Sk. Cadang</th>
                  <th class="tg-0lax">Merk</th>
                  <th class="tg-0lax">Type</th>
                  <th class="tg-0lax">Daya</th>
                  <th class="tg-0lax">Tegangan</th>
                  <th class="tg-0lax">Arus</th>
                  <th class="tg-0lax">Jumlah</th>
                  <th class="tg-0lax">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <h1><center><font size="4" class="mt-1" face="arial">BANDAR UDARA BUDIARTO CURUG</font></center></h1>
                <center><b><font size="3" class="mt-1" face="arial">Laporan Data Suku Cadang Bulan</font></b></center><br>
                <center><b><font size="2" class="mt-1" face="arial">Jl. Raya PLP Tromol Pos 08, Curug, Serdang Wetan, Tangerang, Banten 15810<b></center><br>
                <hr><width="100" height="75"></hr>
                <?php $i = 1; ?>
                <?php foreach ($skcadang as $prt) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $prt['tanggal_br']; ?> </td>
                    <td><?= $prt['kode']; ?> </td>
                    <td><?= $prt['nama_skcadang']; ?> </td>
                    <td><?= $prt['merk']; ?> </td>
                    <td><?= $prt['tipe']; ?> </td>
                    <td><?= $prt['daya']; ?> </td>
                    <td><?= $prt['tegangan']; ?> </td>
                    <td><?= $prt['arus']; ?> </td>
                    <td><?= $prt['jumlah']; ?> </td>
                    <td><?= $prt['keterangan']; ?> </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
  </div>
  <!-- ============================================================== -->
  <!-- TABLE  -->
  <!-- ============================================================== -->


  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
