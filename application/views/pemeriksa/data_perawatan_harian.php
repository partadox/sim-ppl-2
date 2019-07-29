<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_perawatan')): ?>
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
          <form action="<?= base_url('pemeriksa/tambah_bln_pml'); ?>" method="post">
          <div class="row">
            <label>Masukan Judul Laporan</label>
          <div class="col">
            <input type="input" class="form-control" id="bulan" name="bulan" placeholder="cth: Laporan Kerusakan dan Perbaikan Bulan x Tahun x">
            <?= form_error('bulan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <button class="btn btn-primary mb-3" type="submit"><i class="fas fa-plus"></i> Masukan Judul Laporan</button>
          </div>
          </form>
      </div>
    </div>
    <div class="form-group">
      <div> Tata Cara print Laporan:</div>
      <div>1. Wajib memasukan judul laporan dalam input judul laporan (sesuai format pada contoh), kemudian klik tombol <i class="fas fa-plus"></i> Masukan Judul Laporan.</div>
      <div>2. Mencari data sesuai dengan bulan data yang ingin di print pada input <b>"search tabel"</b>. Contoh print bulan Januari 2019 maka ketikan<b>"2019-01"</b></div>
      <div>3. Klik tombol print untuk priview dan print.</div>
      <div style="font-size:18px;"><br>*Jika terdapat tulisan kecil diatas kop laporan, dapat dihilangkan dari menu setting print. Pilih More Setting dan uncheck header and footer.</div>
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
          <div class="table-responsive">
            <table class="tg table-hover" id="example" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="10%">Tanggal</th>
                  <th width="10%">Nama Alat</th>
                  <th width="10%">Kegiatan</th>
                  <th width="10%">Petugas</th>
                  <th width="10%">Keterangan</th>
                  <th width="10%">Status</th>
                  <th width="10%">Petugas Pemeriksa</th>
                  <th width="10%">Tanggal Diperiksa</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($perawatan as $prwt) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $prwt['tanggal']; ?> </td>
                    <td><?= $prwt['nama']; ?> </td>
                    <td><?= $prwt['kegiatan']; ?> </td>
                    <td><?= $prwt['name']; ?> </td>
                    <td><?= $prwt['keterangan']; ?> </td>
                    <td><?= $prwt['status']; ?> </td>
                    <td><?= $prwt['pemeriksa']; ?> </td>
                    <td><?= $prwt['tanggal_periksa']; ?> </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
</div>
<!-- End of Main Content -->
</div>
