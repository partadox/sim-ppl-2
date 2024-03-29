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
                  <th width="10%">Tanggal (yyyy-mm-dd)</th>
                  <th width="10%">Nama Alat</th>
                  <th width="10%">Petugas</th>
                  <th width="20%">Kegiatan</th>
                  <th width="15%">Keterangan</th>
                  <th width="10%">Petugas Pemeriksa</th>
                  <th width="10%">Tanggal Diperiksa</th>
                  <th width="10%">Status</th>
                  <th width="5%">Action</th>
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
                    <td><?= $prwt['pemeriksa']; ?> </td>
                    <td><?= $prwt['tanggal_periksa']; ?> </td>
                    <td><?php if ($prwt['status_id'] == 1) {
    echo "<h2 class='badge badge-pill badge-danger'>Belum Diperiksa</h2>";
} else {
    echo "<h2 class='badge badge-pill badge-success'>Sudah Diperiksa</h2>";
}; ?> </td>
                  <td>
                    <a href="javascript:;"
                    data-id="<?= $prwt['id'] ?>"
                    data-pemeriksa="<?= $prwt['pemeriksa'] ?>"
                    data-tanggal_periksa="<?= $prwt['tanggal_periksa'] ?>"
                    data-status_id="<?= $prwt['status_id'] ?>"
                    data-target="#perawatan-modal-pemeriksa"
                    data-toggle="modal"
                    class="btn btn-success btn-sm" >Setujui</a>

                    <a href="javascript:;"
                    data-id="<?= $prwt['id'] ?>"
                    data-pemeriksa="<?= $prwt['pemeriksa'] ?>"
                    data-tanggal_periksa="<?= $prwt['tanggal_periksa'] ?>"
                    data-status_id="<?= $prwt['status_id'] ?>"
                    data-target="#cancel-modal"
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
<div class="modal fade" id="perawatan-modal-pemeriksa" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Yakin anda sudah memeriksa laporan ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('pemeriksa/disetujui'); ?>" method="post">
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
<div class="modal fade" id="cancel-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Yakin anda membatalkan laporan ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('pemeriksa/disetujui'); ?>" method="post">
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
