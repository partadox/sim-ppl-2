<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_ccr')): ?>
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
    <button class="btn btn-primary mb-3" type="button" id="add_button" data-target="#perawatan-modal" data-toggle="modal"><i class="far fas fa-plus"></i> Tambah Data Meter Reading CCR</button>
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
  <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="tg table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="tg-zoz6" rowspan="3">#</th>
                  <th class="tg-uys7" rowspan="3">Nama CCR</th>
                  <th class="tg-uys7" rowspan="3">Tanggal</th>
                  <th class="tg-uys7" rowspan="3">Jam</th>
                  <th class="tg-c3ow" colspan="3">Supply</th>
                  <th class="tg-c3ow" colspan="5">Arus per Step</th>
                  <th class="tg-uys7" rowspan="3">Frek</th>
                  <th class="tg-uys7" rowspan="3">Indikasi</th>
                  <th class="tg-uys7" rowspan="3">Keterangan</th>
                  <th class="tg-uys7" rowspan="3">Petugas</th>
                </tr>
                <tr>
                  <td class="tg-c3ow" colspan="3">Tegangan (Volt)</td>
                  <td class="tg-c3ow" colspan="5">Ampere</td>
                </tr>
                <tr>
                  <td class="tg-c3ow">R</td>
                  <td class="tg-c3ow">S</td>
                  <td class="tg-c3ow">T</td>
                  <td class="tg-c3ow">1</td>
                  <td class="tg-c3ow">2</td>
                  <td class="tg-c3ow">3</td>
                  <td class="tg-c3ow">4</td>
                  <td class="tg-c3ow">5</td>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($laporan_ccr as $ccr) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ccr['nama']; ?> </td>
                    <td><?= $ccr['tanggal']; ?> </td>
                    <td><?= $ccr['jam']; ?> </td>
                    <td><?= $ccr['supply_vr']; ?> </td>
                    <td><?= $ccr['supply_vs']; ?> </td>
                    <td><?= $ccr['supply_vt']; ?> </td>
                    <td><?= $ccr['step_1a']; ?> </td>
                    <td><?= $ccr['step_2a']; ?> </td>
                    <td><?= $ccr['step_3a']; ?> </td>
                    <td><?= $ccr['step_4a']; ?> </td>
                    <td><?= $ccr['step_5a']; ?> </td>
                    <td><?= $ccr['frek']; ?> </td>
                    <td><?= $ccr['indikasi']; ?> </td>
                    <td><?= $ccr['keterangan']; ?> </td>
                    <td><?= $ccr['name']; ?> </td>
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
<!-- Modal Tambah Meter Reading CCR-->
<!-- ============================================================== -->
<div class="modal fade" id="perawatan-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Tambah Data Meter Reading CCR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('petugas/tambah_ccr'); ?>" method="post">
      <div class="modal-body">
        <div class="row">
            <div class="col">
              <label>Petugas Pelapor</label>
              <input type="text" class="form-control" id="nama_ptgs" name="nama_ptgs" value="<?= $user['name']; ?>" disabled>
              <input type="hidden" class="form-control" id="add_nama_petugas" name="add_nama_petugas" value="<?= $user['id']; ?>">
            </div>
              <div class="col">
                <label>Nama Alat CCR</label>
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
        </div>
        <div class="row mt-3">
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
            <div class="form-group">
              <label class="mt-2">Indikasi Alarm</label>
              <input type="text" class="form-control" id="add_indikasi" name="add_indikasi" placeholder="Indikasi Alarm">
              <?= form_error('add_indikasi', '<small class="text-danger">', '</small>'); ?>
            </div>
                <div class="form-group">
                  <label>Keterangan Meter Reading CCR</label>
                  <input type="text" class="form-control" id="add_keterangan" name="add_keterangan" placeholder="Keterangan Perbaikan">
                  <?= form_error('add_uraian', '<small class="text-danger">', '</small>'); ?>
                </div>
              <div class="row mt-2">
                <div class="col">
                  <label>Supply R (Volt)</label>
                  <input type="number" class="form-control" placeholder="1.0" step="0.01" min="0" max="10000" name="add_supply_vr" id="add_supply_vr">
                  <?= form_error('add_supply_vr', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Supply S (Volt)</label>
                  <input type="number" class="form-control" placeholder="1.0" step="0.01" min="0" max="10000" name="add_supply_vs" id="add_supply_vs">
                  <?= form_error('add_supply_vs', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Supply T (Volt)</label>
                  <input type="number" class="form-control" placeholder="1.0" step="0.01" min="0" max="10000" name="add_supply_vt" id="add_supply_vt">
                  <?= form_error('add_supply_vt', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Frekuensi(Hertz)</label>
                  <input type="number" class="form-control" placeholder="1"  name="add_frek" id="add_frek">
                  <?= form_error('add_frek', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label>Arus per Step 1</label>
                  <input type="number" class="form-control" placeholder="1" name="add_step_1a" id="add_step_1a">
                  <?= form_error('add_step_1a', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Arus per Step 2</label>
                  <input type="number" class="form-control" placeholder="1" name="add_step_2a" id="add_step_2a">
                  <?= form_error('add_step_2a', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Arus per Step 3</label>
                  <input type="number" class="form-control" placeholder="1" name="add_step_3a" id="add_step_3a">
                  <?= form_error('add_step_3a', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Arus per Step 4</label>
                  <input type="number" class="form-control" placeholder="1"  name="add_step_4a" id="add_step_4a">
                  <?= form_error('add_step_4a', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Arus per Step 5</label>
                  <input type="number" class="form-control" placeholder="1"  name="add_step_5a" id="add_step_5a">
                  <?= form_error('add_step_5a', '<small class="text-danger">', '</small>'); ?>
                </div>
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
