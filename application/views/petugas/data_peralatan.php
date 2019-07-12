<!-- Begin Page Content -->
<div class="container-fluid dashboard-content">
  <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($pesan = $this->session->flashdata('pesan')): ?>
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
    <button class="btn btn-primary mb-3" type="button" id="add_button" data-target="#alat-modal" data-toggle="modal"><i class="far fas fa-plus"></i> Tambah Data Peralatan</button>
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
                  <th width="10%">Nama</th>
                  <th width="10%">Kategori</th>
                  <th width="10%">Merk</th>
                  <th width="10%">Tipe</th>
                  <th width="10%">Data Teknis</th>
                  <th width="10%">Tahun Instalasi</th>
                  <th width="10%">Jumlah</th>
                  <th width="10%">Kondisi</th>
                  <th width="10%">Keterangan</th>
                  <th width="5%">Action</th>
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
                    <td>
                      <a href="javascript:;"
                          data-id="<?= $prt['id'] ?>"
                          data-kategori="<?= $prt['kategori'] ?>"
                          data-nama="<?= $prt['nama'] ?>"
                          data-merk="<?= $prt['merk'] ?>"
                          data-tipe="<?= $prt['tipe'] ?>"
                          data-data_teknis="<?= $prt['data_teknis'] ?>"
                          data-tahun_install="<?= $prt['tahun_install'] ?>"
                          data-jumlah="<?= $prt['jumlah'] ?>"
                          data-kondisi="<?= $prt['kondisi'] ?>"
                          data-keterangan="<?= $prt['keterangan'] ?>"
                          data-target="#alat-modal-edit"
                          data-toggle="modal"
                      class="badge badge-warning">Edit</a>
                      <a href="<?= base_url(); ?>petugas/hapus_peralatan/<?= $prt['id']; ?>" class="badge badge-danger" onclick="return confirm('Apa anda yakin menghapus data peralatan ini?');">Hapus</a>
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
<!-- Modal Tambah Peralatan -->
<!-- ============================================================== -->
<div class="modal fade" id="alat-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Tambah Data Peralatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('petugas/tambah_peralatan'); ?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <label>Pilih Kategori Alat</label>
            <select class="custom-select mr-sm-2" id="add_kategori" name="add_kategori">
              <?= form_error('add_kategori', '<small class="text-danger">', '</small>'); ?>
              <option selected>Pilih Kategori...</option>
              <option value="1">Visual AID</option>
              <option value="2">Non Visual</option>
            </select>
          </div>
          <div class="col">
            <label>Nama Peralatan</label>
            <input type="text" class="form-control" id="add_nama" name="add_nama" placeholder="Nama Alat">
            <?= form_error('add_nama', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
          <div class="row">
            <div class="col">
              <label class="mt-4">Merk</label>
              <input type="text" class="form-control" id="add_merk" name="add_merk" placeholder="Merk Alat">
              <?= form_error('add_merk', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col">
              <label class="mt-4">Tipe</label>
              <input type="text" class="form-control" id="add_tipe" name="add_tipe" placeholder="Tipe Alat">
              <?= form_error('add_tipe', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
            <div class="row">
              <div class="col">
                <label class="mt-4">Tahun Instalasi</label>
                <select class="form-control" id="add_tahun_install" name="add_tahun_install" >
                  <?php
                   for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                     <option value="<?=$year;?>"><?=$year;?></option>
                   <?php endfor; ?>
                </select>
                <?= form_error('add_tahun_install', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col">
                <label class="mt-4">Jumlah</label>
                <input type="number" class="form-control" id="add_jumlah" name="add_jumlah">
                <?= form_error('add_jumlah', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="mt-4">Data Teknis</label>
                <input type="text" class="form-control" id="add_data_teknis" name="add_data_teknis" placeholder="Data Teknis Alat">
                <?= form_error('add_data_teknis', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col">
                <label class="mt-4">Kondisi</label>
                <input type="text" class="form-control" id="add_kondisi" name="add_kondisi" placeholder="Kondisi Alat">
                <?= form_error('add_kondisi', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="mt-4">Keterangan</label>
              <input type="text" class="form-control" id="add_keterangan" name="add_keterangan" placeholder="Keterangan Alat">
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
<!-- END Modal Tambah Peralatan -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Modal Edit Peralatan -->
<!-- ============================================================== -->
<div class="modal fade" id="alat-modal-edit" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Edit Data Peralatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('petugas/edit_peralatan'); ?>" method="post">
      <div class="modal-body">
        <input type="hidden" name="id" id="id">
        <div class="row">
          <div class="col">
            <label>Pilih Kategori Alat (Visual AID=1/Non=2)</label>
            <input class="custom-select mr-sm-2" id="add_kategori" name="add_kategori">
              <?= form_error('add_kategori', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Nama Peralatan</label>
            <input type="text" class="form-control" id="add_nama" name="add_nama" placeholder="Nama Alat">
            <?= form_error('add_nama', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
          <div class="row">
            <div class="col">
              <label class="mt-4">Merk</label>
              <input type="text" class="form-control" id="add_merk" name="add_merk" placeholder="Merk Alat">
              <?= form_error('add_merk', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col">
              <label class="mt-4">Tipe</label>
              <input type="text" class="form-control" id="add_tipe" name="add_tipe" placeholder="Tipe Alat">
              <?= form_error('add_tipe', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
            <div class="row">
              <div class="col">
                <label class="mt-4">Tahun Instalasi</label>
                <input class="form-control" id="add_tahun_install" name="add_tahun_install">
                <?= form_error('add_tahun_install', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col">
                <label class="mt-4">Jumlah</label>
                <input type="number" class="form-control" id="add_jumlah" name="add_jumlah">
                <?= form_error('add_jumlah', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="mt-4">Data Teknis</label>
                <input type="text" class="form-control" id="add_data_teknis" name="add_data_teknis" placeholder="Data Teknis Alat">
                <?= form_error('add_data_teknis', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col">
                <label class="mt-4">Kondisi</label>
                <input type="text" class="form-control" id="add_kondisi" name="add_kondisi" placeholder="Kondisi Alat">
                <?= form_error('add_kondisi', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="mt-4">Keterangan</label>
              <input type="text" class="form-control" id="add_keterangan" name="add_keterangan" placeholder="Keterangan Alat">
              <?= form_error('add_keterangan', '<small class="text-danger">', '</small>'); ?>
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
<!-- END Modal Edit Peralatan -->
<!-- ============================================================== -->
