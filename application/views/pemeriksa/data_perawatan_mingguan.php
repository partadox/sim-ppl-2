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
        <label>Masukan Tanggal Laporan</label>
        <div class="row">
          <div class="col">
            <input type="week" class="form-control" id="date" name="date"  data-date-format="DD MMMM YYYY">
            <?= form_error('add_tanggal', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
              <button class="btn btn-primary mb-3" type="button" id="cari" name="cari"><i class="fas fa-search"></i>Cari Data (BELUM)</button>
                <button class="btn btn-success mb-3 ml-3" type="button" id="add_button" onclick="printDiv('printableArea')"><i class="fas fa-print"></i></i>Print Data</button>
          </div>

      </div>
    </div>
</div>
  </div>
  <!-- ============================================================== -->
  <!-- TABEL-->
  <!-- ============================================================== -->
  <div id="printableArea">
    <div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="tabel" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="15%">Tanggal (yyyy-mm-dd)</th>
                    <th width="10%">Nama Alat</th>
                    <th width="10%">Petugas</th>
                    <th width="10%">Kegiatan</th>
                    <th width="10%">Keterangan</th>
                    <th width="10%">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($perawatan as $prwt) : ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $prwt['tanggal']; ?> </td>
                      <td><?= $prwt['nama']; ?> </td>
                      <td><?= $prwt['name']; ?> </td>
                      <td><?= $prwt['kegiatan']; ?> </td>
                      <td><?= $prwt['keterangan']; ?> </td>
                      <td><?= $prwt['status']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
<!-- End of Main Content -->
</div>
<!-- ============================================================== -->
<!-- Modal Tambah Perawatan -->
<!-- ============================================================== -->
<div class="modal fade" id="perawatan-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Tambah Data Perawatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/tambah_perawatan'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label>Tanggal Bulan/Hari/Tahun</label>
            <input type="date" class="form-control" id="add_tanggal" name="add_tanggal"  data-date-format="DD MMMM YYYY">
            <?= form_error('add_tanggal', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <div class="col">
            <label>Nama Alat</label>
            <select class="custom-select mr-sm-2" id="add_nama_alat" name="add_nama_alat">
              <?= form_error('add_nama_alat', '<small class="text-danger">', '</small>'); ?>
              <option selected value="">-- Pilih --</option>
              <?php
                foreach ($option_alat as $opta) : ?>
                  echo '<option value="<?= $opta['id']; ?>"><?= $opta['nama']; ?></option>';
              <?php endforeach; ?>
            </select>
            <?= form_error('add_nama_alat', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Pilih Petugas</label>
            <select class="custom-select mr-sm-2" id="add_nama_petugas" name="add_nama_petugas">
              <?= form_error('add_nama_alat', '<small class="text-danger">', '</small>'); ?>
              <option selected value="">--Pilih--</option>
              <?php
                foreach ($option_petugas as $opp) : ?>
                  echo '<option value="<?= $opp['id']; ?>"><?= $opp['name']; ?></option>';
              <?php endforeach; ?>
            </select>
            <?= form_error('add_nama_petugas', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
          <div class="form-group">
            <label class="mt-4">Kegiatan</label>
            <textarea type="text" class="form-control" id="add_kegiatan" name="add_kegiatan" placeholder="Kegiatan Perawatan"></textarea>
            <?= form_error('add_kegiatan', '<small class="text-danger">', '</small>'); ?>
          </div>
         <div class="form-group">
           <label>Keterangan</label>
           <textarea type="text" class="form-control" id="add_keterangan" name="add_keterangan" placeholder="Keterangan Perawatan"></textarea>
           <?= form_error('add_keterangan', '<small class="text-danger">', '</small>'); ?>
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
