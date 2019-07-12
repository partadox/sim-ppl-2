<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_logbook')): ?>
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
    <button class="btn btn-primary mb-3" type="button" id="add_button" data-target="#perawatan-modal" data-toggle="modal"><i class="far fas fa-plus"></i> Tambah Data Facility Logbook</button>
</div>
  </div>
  <!-- ============================================================== -->
  <!-- TABEL-->
  <!-- ============================================================== -->
  <div class="container-fluid">
  <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">Tanggal</th>
                  <th width="10%">Jam</th>
                  <th width="20%">Catatan</th>
                  <th width="10%">Petugas</th>
                  <th width="10%">Status Pemeriksaan</th>
                  <th width="10%">Pemeriksa</th>
                  <th width="10%">Tgl/Jam Diperiksa</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($logbook as $log) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $log['waktu']; ?> </td>
                    <td><?= $log['jam']; ?> </td>
                    <td><?= $log['catatan']; ?> </td>
                    <td><?= $log['name']; ?> </td>
                    <td><?php if ($log['status_id'] == 1) {
    echo "<h2 class='badge badge-pill badge-danger'>Belum Diperiksa</h2>";
} else {
    echo "<h2 class='badge badge-pill badge-success'>Sudah Diperiksa</h2>";
}; ?> </td>
                    <td><?= $log['nama_pemeriksa']; ?> </td>
                    <td><?= $log['waktu_periksa']; ?> </td>
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

<!-- ============================================================== -->
<!-- Modal Tambah Logbook-->
<!-- ============================================================== -->
<div class="modal fade" id="perawatan-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Tambah Data Pemeliharaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('petugas/tambah_logbook'); ?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col">
              <label>Tanggal Bulan/Hari/Tahun</label>
              <input type="date" class="form-control" id="add_tanggal" name="add_tanggal"  data-date-format="DD MMMM YYYY">
              <?= form_error('add_tanggal', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Jam</label>
             <input type="text" class="form-control" id="time" name="time" placeholder="Time">
             <?= form_error('time', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col">
            <label>Pilih Petugas</label>
            <input type="text" class="form-control" id="nama_ptgs" name="nama_ptgs" value="<?= $user['name']; ?>" disabled>
            <input type="hidden" class="form-control" id="add_nama_petugas" name="add_nama_petugas" value="<?= $user['id']; ?>">
            <?= form_error('add_nama_petugas', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
          <div class="form-group">
            <label class="mt-4">Catatan</label>
            <textarea type="text" class="form-control" id="add_catatan" name="add_catatan" placeholder="Catatan"></textarea>
            <?= form_error('add_kegiatan', '<small class="text-danger">', '</small>'); ?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- END Modal Tambah Perawatan -->
<!-- ============================================================== -->
