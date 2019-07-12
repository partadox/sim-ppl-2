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
                  <th width="5%">Tanggal</th>
                  <th width="10%">Lokasi</th>
                  <th width="10%">Uraian</th>
                  <th width="10%">Tindakan</th>
                  <th width="10%">Jns Spare-Part</th>
                  <th width="10%">Jml Spare-Part</th>
                  <th width="10%">Keterangan</th>
                  <th width="10%">Petugas</th>
                  <th width="5%">Pemeriksa</th>
                  <th width="10%">Status</th>
                  <th width="10%">Tanggal Diperiksa</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>
              <tbody>
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
                    <td><?= $lkp['nama_pemeriksa']; ?> </td>
                    <td><?php if ($lkp['status_id'] == 1) {
    echo "<h2 class='badge badge-pill badge-danger'>Belum</h2>";
} else {
    echo "<h2 class='badge badge-pill badge-success'>Terperiksa</h2>";
}; ?> </td>
                    <td><?= $lkp['tanggal_periksa']; ?> </td>
                    <td>
                      <a href="javascript:;"
                      data-id="<?= $lkp['id'] ?>"
                      data-nama_pemeriksa="<?= $lkp['nama_pemeriksa'] ?>"
                      data-tanggal_periksa="<?= $lkp['tanggal_periksa'] ?>"
                      data-status_id="<?= $lkp['status_id'] ?>"
                      data-target="#lkp-modal-pemeriksa"
                      data-toggle="modal"
                      class="btn btn-success btn-sm" >Setujui</a>

                      <a href="javascript:;"
                      data-id="<?= $lkp['id'] ?>"
                      data-nama_pemeriksa="<?= $lkp['nama_pemeriksa'] ?>"
                      data-tanggal_periksa="<?= $lkp['tanggal_periksa'] ?>"
                      data-status_id="<?= $lkp['status_id'] ?>"
                      data-target="#lkp-cancel-modal"
                      data-toggle="modal"
                      class="btn btn-danger btn-sm mt-2" >Batalkan</a>
                    </td>
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
<!-- Modal Periksa -->
<!-- ============================================================== -->
<div class="modal fade" id="lkp-modal-pemeriksa" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Yakin anda sudah memeriksa laporan ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('pemeriksa/disetujui_laporan_kerusakan'); ?>" method="post">
      <div class="modal-body">
        <h6>Pilih "<i class="fas fa-check"></i>Diperiksa" jika anda yakin sudah memeriksa laporan ini.</h6>
        <input type="hidden" name="id" id="id">
        <input type="hidden" value="<?= $user['name']; ?>" id="accpemeriksa" name="accpemeriksa"></input>
        <input type="hidden" value="2" id="accstatus_id" name="accstatus_id"></input>
        <input type="hidden" value="<?= date('Y-m-d') ?>" id="acctanggal_periksa" name="acctanggal_periksa"></input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Diperiksa</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- END Modal Periksa-->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Modal Periksa -->
<!-- ============================================================== -->
<div class="modal fade" id="lkp-cancel-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Yakin anda membatalkan laporan ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('pemeriksa/disetujui_laporan_kerusakan'); ?>" method="post">
      <div class="modal-body">
        <h6>Pilih "<i class="fas fa-ban"></i> Batal Pemeriksaan" jika anda yakin membatalkan laporan ini.</h6>
        <input type="hidden" name="id" id="id">
        <input type="hidden" value="-" id="accpemeriksa" name="accpemeriksa"></input>
        <input type="hidden" value="1" id="accstatus_id" name="accstatus_id"></input>
        <input type="hidden" value="" id="acctanggal_periksa" name="acctanggal_periksa"></input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger"><i class="fas fa-ban"></i> Batal Pemeriksaan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- END Modal Periksa-->
<!-- ============================================================== -->
