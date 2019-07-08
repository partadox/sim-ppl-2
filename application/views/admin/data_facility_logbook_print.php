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
    <div class="form-group">
        <label>Masukan Tanggal Laporan</label>
        <div class="row">
          <div class="col">
            <input type="date" class="form-control" id="date" name="date"  data-date-format="DD MMMM YYYY">
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
  <div class="container-fluid">
  <div class="card mb-4" id="printableArea">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">Nama Alat</th>
                  <th width="10%">Tanggal</th>
                  <th width="10%">Jam</th>
                  <th width="10%">Catatan</th>
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
                    <td><?= $log['nama']; ?> </td>
                    <td><?= $log['waktu']; ?> </td>
                    <td><?= $log['jam']; ?> </td>
                    <td><?= $log['catatan']; ?> </td>
                    <td><?= $log['name']; ?> </td>
                    <td><?= $log['status']; ?></td>
                    <td><?= $log['name']; ?> </td>
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
      <form action="<?= base_url('admin/tambah_logbook'); ?>" method="post">
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
            <label class="mt-4">Catatan</label>
            <textarea type="text" class="form-control" id="add_catatan" name="add_catatan" placeholder="Catatan"></textarea>
            <?= form_error('add_kegiatan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Pilih Pemeriksa</label>
            <select class="custom-select mr-sm-2" id="add_pemeriksa" name="add_pemeriksa">
              <?= form_error('add_nama_alat', '<small class="text-danger">', '</small>'); ?>
              <option selected value="">--Pilih--</option>
              <?php
                foreach ($option_petugas as $opp) : ?>
                  echo '<option value="<?= $opp['id']; ?>"><?= $opp['name']; ?></option>';
              <?php endforeach; ?>
            </select>
            <?= form_error('add_pemeriksa', '<small class="text-danger">', '</small>'); ?>
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

<!-- ============================================================== -->
<!-- Modal Edit Karyawan -->
<!-- ============================================================== -->
<div class="modal fade" id="karyawan-modal-edit" tabindex="-1" role="dialog" aria-labelledby="ModalPetugasEdit" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugasEdit">Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/edit_petugas')?>" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Petugas</label>
            <input type="hidden" name="id" id="id">
            <input type="text" class="form-control" id="name" name="name">
            <?= form_error('add_name', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <div class="col">
            <label>Nomor Induk Pegawai</label>
            <input type="text" class="form-control" id="edit_nip" name="edit_nip">
            <?= form_error('add_nip', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Pilih User Role</label>
            <input type="text" class="form-control" id="edit_user_role" name="edit_user_role" disabled>
              <?= form_error('add_user_role', '<small class="text-danger">', '</small>'); ?>
            </input>
          </div>
        </div>
          <div class="form-group mt-2">
            <label>E-mail</label>
            <input type="email" class="form-control" id="edit_email" name="edit_email">
            <?= form_error('add_email', '<small class="text-danger">', '</small>'); ?>
          </div>
         <div class="form-group">
           <label>Kontak</label>
           <input type="text" class="form-control" id="edit_phone" name="edit_phone">
           <?= form_error('add_phone', '<small class="text-danger">', '</small>'); ?>
         </div>
         <div class="form-group">
           <label>Alamat</label>
           <input type="text" class="form-control" id="edit_alamat" name="edit_alamat">
           <?= form_error('add_alamat', '<small class="text-danger">', '</small>'); ?>
         </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" id="edit_username" name="edit_username">
            <?= form_error('add_username', '<small class="text-danger">', '</small>'); ?>
          </div>
         <div class="form-group">
           <label>Password</label>
           <input type="text" class="form-control" id="edit_password" name="edit_password">
           <?= form_error('add_password', '<small class="text-danger">', '</small>'); ?>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Edit Data</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- END Modal Edit Karyawan -->
<!-- ============================================================== -->
