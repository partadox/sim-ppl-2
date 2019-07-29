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
          <form action="<?= base_url('admin/tambah_bln_prt'); ?>" method="post">
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
      <div> Tata Cara print Laporan Peralatan:</div>
      <div>1. Wajib memasukan judul laporan dalam input judul laporan (sesuai format pada contoh), kemudian klik tombol <i class="fas fa-plus"></i> Masukan Judul Laporan.</div>
      <div>2. Klik tombol print untuk priview dan print.</div>
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
            <table id="example" class="tg"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="3%">No</th>
                  <th width="20%">Nama</th>
                  <th width="10%">Kategori</th>
                  <th width="15%">Merk</th>
                  <th width="10%">Tipe</th>
                  <th width="10%">Data Teknis</th>
                  <th width="5%">Tahun Instalasi</th>
                  <th width="5%">Jumlah</th>
                  <th width="5%">Kondisi</th>
                  <th width="15%">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($peralatan as $prt) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $prt['nama']; ?> </td>
                    <td><?= $prt['kategori']; ?> </td>
                    <td><?= $prt['merk']; ?> </td>
                    <td><?= $prt['tipe']; ?> </td>
                    <td><?= $prt['data_teknis']; ?> </td>
                    <td><?= $prt['tahun_install']; ?> </td>
                    <td><?= $prt['jumlah']; ?> </td>
                    <td><?= $prt['kondisi']; ?> </td>
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
