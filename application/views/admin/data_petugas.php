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
    <button class="btn btn-primary mb-3" type="button" id="add_button" data-target="#karyawan-modal" data-toggle="modal"><i class="far fas fa-plus"></i> Tambah Data Petugas</button>
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
                  <th width="15%">Nama</th>
                  <th width="10%">NIP</th>
                  <th width="10%">Level</th>
                  <th width="10%">Username</th>
                  <th width="10%">Telepon</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($petugas as $ptgs) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ptgs['name']; ?> </td>
                    <td><?= $ptgs['nip']; ?> </td>
                    <td><?= $ptgs['role']; ?> </td>
                    <td><?= $ptgs['username']; ?> </td>
                    <td><?= $ptgs['phone']; ?> </td>
                    <td>
                      <a href="javascript:;"
                          data-id="<?= $ptgs['id'] ?>"
                          data-name="<?= $ptgs['name'] ?>"
                          data-nip="<?= $ptgs['nip'] ?>"
                          data-role="<?= $ptgs['role'] ?>"
                          data-email="<?= $ptgs['email'] ?>"
                          data-phone="<?= $ptgs['phone'] ?>"
                          data-alamat="<?= $ptgs['alamat'] ?>"
                          data-username="<?= $ptgs['username'] ?>"
                          data-password="<?= $ptgs['password'] ?>"
                          data-target="#karyawan-modal-edit"
                          data-toggle="modal"
                          class="badge badge-success">Detail</a>
                      <a href="<?= base_url(); ?>admin/hapus_petugas/<?= $ptgs['id']; ?>" class="badge badge-danger" onclick="return confirm('Apa anda yakin menghapus data petugas ini?');">Hapus</a>
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
<!-- Modal Tambah Karyawan -->
<!-- ============================================================== -->
<div class="modal fade" id="karyawan-modal" tabindex="-1" role="dialog" aria-labelledby="ModalPetugas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalPetugas">Tambah Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/tambah_petugas'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Petugas</label>
            <input type="text" class="form-control" id="add_name" name="add_name" placeholder="Nama Petugas">
            <?= form_error('add_name', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <div class="col">
            <label>Nomor Induk Pegawai</label>
            <input type="text" class="form-control" id="add_nip" name="add_nip" placeholder="Nomor Induk Pegawai">
            <?= form_error('add_nip', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col">
            <label>Pilih User Role</label>
            <select class="custom-select mr-sm-2" id="add_user_role" name="add_user_role">
              <?= form_error('add_user_role', '<small class="text-danger">', '</small>'); ?>
              <option selected>Pilih Role...</option>
              <option value="1">Admin</option>
              <option value="2">Petugas</option>
              <option value="3">Pemeriksa</option>
            </select>
          </div>
        </div>
          <div class="form-group mt-2">
            <label>E-mail</label>
            <input type="email" class="form-control" id="add_email" name="add_email" placeholder="E-mail">
            <?= form_error('add_email', '<small class="text-danger">', '</small>'); ?>
          </div>
         <div class="form-group">
           <label>Kontak</label>
           <input type="text" class="form-control" id="add_phone" name="add_phone" placeholder="Nomor Telepon">
           <?= form_error('add_phone', '<small class="text-danger">', '</small>'); ?>
         </div>
         <div class="form-group">
           <label>Alamat</label>
           <input type="text" class="form-control" id="add_alamat" name="add_alamat" placeholder="Alamat">
           <?= form_error('add_alamat', '<small class="text-danger">', '</small>'); ?>
         </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" id="add_username" name="add_username" placeholder="Username">
            <?= form_error('add_username', '<small class="text-danger">', '</small>'); ?>
          </div>
         <div class="form-group">
           <label>Password</label>
           <input type="text" class="form-control" id="add_password" name="add_password" placeholder="Password">
           <?= form_error('add_password', '<small class="text-danger">', '</small>'); ?>
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
<!-- END Modal Tambah Karyawan -->
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
