<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_lkp')): ?>
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
            <input type="date" class="form-control" id="min" name="min"  data-date-format="DD MMMM YYYY">
            <input type="date" class="form-control" id="max" name="max"  data-date-format="DD MMMM YYYY">
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
  <script src="http://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables_themeroller.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
   <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
   <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table_jui.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
   <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
   <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
   <link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
   <script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.js" data-semver="1.9.4" data-require="datatables@*"></script>
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
          <div class="input-group input-daterange">

      <input type="date" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">

      <div class="input-group-addon">to</div>

      <input type="date" id="max-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">

    </div>
          <div class="table-responsive" id="table">
            <table  class="tg display"  id="my-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="5%">Tanggal</th>
                  <th width="10%">Lokasi</th>
                  <th width="10%">Uraian</th>
                  <th width="10%">Tindakan</th>
                  <th width="10%">Jns Spare-Part</th>
                  <th width="10%">Jml Spare-Part</th>
                  <th width="10%">Keterangan</th>
                  <th width="10%">Petugas</th>
                  <th width="10%">Kondisi</th>
                  <th width="10%">Pemeriksa</th>
                  <th width="10%">Status</th>
                </tr>
              </thead>
              <tbody>
                <h1><center><font size="4" class="mt-1" face="arial">BANDAR UDARA BUDIARTO CURUG</font></center></h1>
                <center><b><font size="3" class="mt-1" face="arial">Laporan Data Kerusakan Bulan </font></b></center><br>
                <center><b><font size="2" class="mt-1" face="arial">Jl. Raya PLP Tromol Pos 08, Curug, Serdang Wetan, Tangerang, Banten 15810<b></center><br>
                <hr><width="100" height="75"></hr>
                <?php $i = 1; ?>
                <?php foreach ($laporan_kerusakan as $lkp) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $lkp['tanggal']; ?> </td>
                    <td><?= $lkp['lokasi']; ?> </td>
                    <td><?= $lkp['uraian']; ?> </td>
                    <td><?= $lkp['tindakan']; ?> </td>
                    <td><?= $lkp['spare_part_nama']; ?> </td>
                    <td><?= $lkp['spare_part_jumlah']; ?> </td>
                    <td><?= $lkp['keterangan']; ?> </td>
                    <td><?= $lkp['name']; ?> </td>
                    <td><?= $lkp['kondisi']; ?> </td>
                    <td><?= $lkp['nama_pemeriksa']; ?> </td>
                    <td><?= $lkp['status']; ?></td>
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

<script type="text/javascript">
// Bootstrap datepicker
$('.input-daterange input').each(function() {
$(this).datepicker('clearDates');
});

// Set up your table
table = $('#my-table').DataTable({
paging: false,
info: false
});

// Extend dataTables search
$.fn.dataTable.ext.search.push(
function(settings, data, dataIndex) {
var min = $('#min-date').val();
var max = $('#max-date').val();
var createdAt = data[2] || 0; // Our date column in the table

if (
(min == "" || max == "") ||
(moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
) {
return true;
}
return false;
}
);

// Re-draw the table when the a date range filter changes
$('.date-range-filter').change(function() {
table.draw();
});

$('#my-table_filter').hide();
</script>
