<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan_skcadang')): ?>
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
    <button class="btn btn-primary mb-3" type="button" id="add_button" data-target="#alat-modal" data-toggle="modal"><i class="far fas fa-plus"></i> Tambah Data Suku Cadang</button>
    <button class="btn btn-warning mb-3 ml-4" type="button" id="add_button" data-target="#ambil-modal" data-toggle="modal"><i class="far fas fa-minus"></i> Ambil Suku Cadang</button>
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
                  <th class="tg-0lax">#</th>
                  <th class="tg-0pky">Tanggal</th>
                  <th class="tg-0lax">Kode</th>
                  <th class="tg-0lax">Nama Sk. Cadang</th>
                  <th class="tg-0lax">Merk</th>
                  <th class="tg-0lax">Type</th>
                  <th class="tg-0lax">Spesifikasi</th>
                  <th class="tg-0lax">Jumlah</th>
                  <th class="tg-0lax">Keterangan</th>
                  <th class="tg-0lax">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($skcadang as $prt) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $prt['tanggal_br']; ?> </td>
                    <td><?= $prt['kode']; ?> </td>
                    <td><?= $prt['nama_skcadang']; ?> </td>
                    <td><?= $prt['merk']; ?> </td>
                    <td><?= $prt['tipe']; ?> </td>
                    <td><?= $prt['spesifikasi']; ?> </td>
                    <td><?= $prt['jumlah']; ?> </td>
                    <td><?= $prt['keterangan']; ?> </td>
                    <td>
                      <a href="javascript:;"
                          data-id="<?= $prt['id'] ?>"
                          data-tanggal="<?= $prt['tanggal_br'] ?>"
                          data-kode="<?= $prt['kode'] ?>"
                          data-nama_skcadang="<?= $prt['nama_skcadang'] ?>"
                          data-merk="<?= $prt['merk'] ?>"
                          data-tipe="<?= $prt['tipe'] ?>"
                          data-spesifikasi="<?= $prt['spesifikasi'] ?>"
                          data-jumlah="<?= $prt['jumlah'] ?>"
                          data-keterangan="<?= $prt['keterangan'] ?>"
                          data-target="#skcadang-modal-edit"
                          data-toggle="modal"
                      class="badge badge-warning">Edit</a>
                      <a href="<?= base_url(); ?>admin/hapus_skcadang/<?= $prt['id']; ?>" class="badge badge-danger" onclick="return confirm('Apa anda yakin menghapus data suku cadang ini?');">Hapus</a>
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
<!-- Modal Tambah Suku Cadang-->
<!-- ============================================================== -->
<div class="modal fade" id="alat-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Tambah Data Suku Cadang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/tambah_skcadang'); ?>" method="post">
      <div class="modal-body">
        <div class="row mt-3">
          <div class="col">
              <label>Tanggal Bulan/Hari/Tahun</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal"  data-date-format="DD MMMM YYYY">
              <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Kode Suku Cadang</label>
             <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Suku Cadang">
             <?= form_error('kode', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Nama Suku Cadang</label>
             <input type="text" class="form-control" id="nama_skcadang" name="nama_skcadang" placeholder="Nama Suku Cadang">
             <?= form_error('nama_skcadang', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
          <div class="row">
            <div class="col">
              <label class="mt-4">Merk</label>
              <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk Suku Cadang">
              <?= form_error('merk', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col">
              <label class="mt-4">Tipe</label>
              <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe Suku Cadang">
              <?= form_error('tipe', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
            <div class="row">
              <div class="col">
                <label class="mt-4">Spesifikasi</label>
                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi">
                <?= form_error('spesifikasi', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col">
                <label class="mt-4">Jumlah Total</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah">
                <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="mt-4">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Suku Cadang">
              <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
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
<!-- END Modal Tambah Suku Cadang -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Modal Edit Suku Cadang-->
<!-- ============================================================== -->
<div class="modal fade" id="skcadang-modal-edit" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Edit Data Suku Cadang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/edit_skcadang'); ?>" method="post">
      <div class="modal-body">
        <div class="row mt-3">
          <div class="col">
              <input type="hidden" name="id" id="id">
              <label>Tanggal Bulan/Hari/Tahun</label>
              <input type="date" class="form-control" id="tanggal_br" name="tanggal_br"  data-date-format="DD MMMM YYYY">
              <?= form_error('tanggal_br', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Kode Suku Cadang</label>
             <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Suku Cadang">
             <?= form_error('kode', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Nama Suku Cadang</label>
             <input type="text" class="form-control" id="nama_skcadang" name="nama_skcadang" placeholder="Nama Suku Cadang">
             <?= form_error('nama_skcadang', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
          <div class="row">
            <div class="col">
              <label class="mt-4">Merk</label>
              <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk Suku Cadang">
              <?= form_error('merk', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col">
              <label class="mt-4">Tipe</label>
              <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe Suku Cadang">
              <?= form_error('tipe', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
            <div class="row">
              <div class="col">
                <label class="mt-4">Spesifikasi</label>
                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi">
                <?= form_error('spesifikasi', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col">
                <label class="mt-4">Jumlah Total</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah">
                <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="mt-4">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Suku Cadang">
              <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
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
<!-- END Modal Edit Suku Cadang -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Modal Ambil Suku Cadang-->
<!-- ============================================================== -->
<div class="modal fade" id="ambil-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Ambil Data Suku Cadang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/ambil_skcadang'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label>Petugas Pengambil (Sesuai user login)</label>
          <input type="text" class="form-control" id="nama_ptgs" name="nama_ptgs" value="<?= $user['name']; ?>" disabled>
          <input type="hidden" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $user['id']; ?>">
        </div>
        <div class="row mt-3">
          <div class="col">
            <label>Suku Cadang</label>
            <select class="custom-select mr-sm-2" id="id_skcadang" name="id_skcadang">
              <?= form_error('id_skcadang', '<small class="text-danger">', '</small>'); ?>
              <option selected value="">-- Pilih --</option>
              <?php
                foreach ($option_skcadang as $opta) : ?>
                  echo '<option value="<?= $opta['id']; ?>"><?= $opta['nama_skcadang']; ?></option>';
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col">
              <label>Tanggal Bulan/Hari/Tahun</label>
              <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"  data-date-format="DD MMMM YYYY">
              <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Jumlah Diambil</label>
            <input type="number" class="form-control" id="jumlah_keluar" name="jumlah_keluar">
            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
            <div class="form-group">
              <label class="mt-4">Untuk Penggantian</label>
              <input type="text" class="form-control" id="utk_ganti" name="utk_ganti" placeholder="Untuk Penggantian">
              <?= form_error('utk_ganti', '<small class="text-danger">', '</small>'); ?>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Ambil Suku Cadang</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- END Modal Edit Suku Cadang -->
<!-- ============================================================== -->
