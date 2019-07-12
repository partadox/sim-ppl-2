<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_ups')): ?>
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
    <button class="btn btn-primary mb-3" type="button" id="add_button" data-target="#perawatan-modal" data-toggle="modal"><i class="far fas fa-plus"></i> Tambah Data Meter Reading UPS</button>
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
                  <th class="tg-uys7" rowspan="3">#</th>
                  <th class="tg-uys7" rowspan="3">Nama UPS</th>
                  <th class="tg-uys7" rowspan="3">Tanggal</th>
                  <th class="tg-uys7" rowspan="3">Jam</th>
                  <th class="tg-uys7" colspan="6">Input UPS</th>
                  <th class="tg-uys7" colspan="2">Output UPS</th>
                  <th class="tg-uys7" colspan="2">Baterai</th>
                  <th class="tg-xldj" rowspan="3">Keterangan</th>
                  <th class="tg-xldj" rowspan="3">Pemeriksa</th>
                </tr>
                <tr>
                  <td class="tg-c3ow" colspan="3">Tegangan (Volt)</td>
                  <td class="tg-c3ow" colspan="3">Arus (Ampere)</td>
                  <td class="tg-uys7" rowspan="2">Tegangan</td>
                  <td class="tg-uys7" rowspan="2">Arus</td>
                  <td class="tg-uys7" rowspan="2">Tegangan</td>
                  <td class="tg-uys7" rowspan="2">Arus</td>
                </tr>
                <tr>
                  <td class="tg-c3ow">R</td>
                  <td class="tg-c3ow">S</td>
                  <td class="tg-c3ow">T</td>
                  <td class="tg-c3ow">R</td>
                  <td class="tg-c3ow">S</td>
                  <td class="tg-c3ow">T</td>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($laporan_ups as $ups) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ups['nama']; ?> </td>
                    <td><?= $ups['tanggal']; ?> </td>
                    <td><?= $ups['jam']; ?> </td>
                    <td><?= $ups['input_vr']; ?> </td>
                    <td><?= $ups['input_vs']; ?> </td>
                    <td><?= $ups['input_vt']; ?> </td>
                    <td><?= $ups['input_ar']; ?> </td>
                    <td><?= $ups['input_as']; ?> </td>
                    <td><?= $ups['input_at']; ?> </td>
                    <td><?= $ups['output_v']; ?> </td>
                    <td><?= $ups['output_a']; ?> </td>
                    <td><?= $ups['baterai_v']; ?> </td>
                    <td><?= $ups['baterai_a']; ?> </td>
                    <td><?= $ups['keterangan']; ?> </td>
                    <td><?= $ups['name']; ?> </td>
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
<!-- Modal Tambah Meter Reading UPS-->
<!-- ============================================================== -->
<div class="modal fade" id="perawatan-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Tambah Data Meter Reading UPS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('petugas/tambah_ups'); ?>" method="post">
      <div class="modal-body">
        <div class="row">
            <div class="col">
              <label>Petugas</label>
              <input type="text" class="form-control" id="nama_ptgs" name="nama_ptgs" value="<?= $user['name']; ?>" disabled>
              <input type="hidden" class="form-control" id="add_nama_petugas" name="add_nama_petugas" value="<?= $user['id']; ?>">
              <?= form_error('add_nama_petugas', '<small class="text-danger">', '</small>'); ?>
            </div>
              <div class="col">
                <label>Nama Alat UPS</label>
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
                <div class="form-group mt-3">
                  <label>Keterangan Meter Reading UPS</label>
                  <input type="text" class="form-control" id="add_keterangan" name="add_keterangan" placeholder="Keterangan Perbaikan">
                  <?= form_error('add_uraian', '<small class="text-danger">', '</small>'); ?>
                </div>
              <div class="row mt-4">
                <div class="col">
                  <label>Input Tegangan R (Volt)</label>
                  <input type="number" class="form-control" placeholder="1.0" step="0.01" min="0" max="30" name="add_input_vr" id="add_input_vr">
                  <?= form_error('add_input_vr', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Input Tegangan S (Volt)</label>
                  <input type="number" class="form-control" placeholder="1.0" step="0.01" min="0" max="30" name="add_input_vs" id="add_input_vs">
                  <?= form_error('add_input_vs', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Input Tegangan T (Volt)</label>
                  <input type="number" class="form-control" placeholder="1.0" step="0.01" min="0" max="30" name="add_input_vt" id="add_input_vt">
                  <?= form_error('add_input_vr', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <label>Input Arus R (Ampere)</label>
                  <input type="number" class="form-control" placeholder="1"  name="add_input_ar" id="add_input_ar">
                  <?= form_error('add_input_ar', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Input Arus S (Ampere)</label>
                  <input type="number" class="form-control" placeholder="1" name="add_input_as" id="add_input_as">
                  <?= form_error('add_input_as', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Input Arus T (Ampere)</label>
                  <input type="number" class="form-control" placeholder="1" name="add_input_at" id="add_input_at">
                  <?= form_error('add_input_at', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <label>Output Tegangan</label>
                  <input type="number" class="form-control" placeholder="1" name="add_output_v" id="add_output_v">
                  <?= form_error('add_output_v', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Output Arus</label>
                  <input type="number" class="form-control" placeholder="1" name="add_output_a" id="add_output_a">
                  <?= form_error('add_output_a', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Tegangan Baterai</label>
                  <input type="number" class="form-control" placeholder="1" name="add_bat_v" id="add_bat_v">
                  <?= form_error('add_bat_v', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col">
                  <label>Arus Baterai</label>
                  <input type="number" class="form-control" placeholder="1"  name="add_bat_a" id="add_bat_a">
                  <?= form_error('add_bat_a', '<small class="text-danger">', '</small>'); ?>
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
<!-- END Modal Tambah MR UPS-->
<!-- ============================================================== -->
