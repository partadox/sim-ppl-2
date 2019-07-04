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
  <div id="printableArea">
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div style="overflow: hidden; padding-top: 56.25%; position: relative;">
          <iframe style="position: absolute;  top: 0; left: 0; border: 0; width: 100%; height: 100%;" src="https://docs.google.com/viewer?srcid=1rWjwooYcQYYkum_G9w8Lb9GT38TmcSIO&pid=explorer&efh=false&a=v&chrome=false&embedded=true"></iframe>
        </div>
        </div>
      </div>
    </div>
  </div>
