<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Sistem Informasi Pemeliharaan Perangkat Listrik <?= date('Y') ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Pilih 'Keluar' jika anda yakin.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
  </div>
</div>
</div>
</div>

</body>

</html>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: function() {
    return "<div style='font-size: 20px; text-align: center;' class='mb-1'><?= $bulan_print['teks']; ?></div> <div style='font-size: 20px; text-align: center;'class='mb-1'>Bandar Udara Budiarto Curug</div><div style='font-size: 14px; text-align: center;' class='mb-1'>Jl. Raya PLP Tromol Pos 08, Curug, Serdang Wetan, Tangerang, Banten 15810</div> <div><hr><width='100' height='75'></hr></div>";
  },
            customize: function(win)
            {
                var last = null;
                var current = null;
                var bod = [];

                var css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[4],
                    style = win.document.createElement('style');

                style.type = 'text/css';
                style.media = 'print';

                if (style.styleSheet)
                {
                  style.styleSheet.cssText = css;
                }
                else
                {
                  style.appendChild(win.document.createTextNode(css));
                }

                head.appendChild(style);
         }

            }
        ]
    } );
} );
</script>

<!-- Input waktu/date scripts full js-->
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>




<!-- Script Full Calendar -->

<!-- Get data for edit data petugas scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#karyawan-modal-edit').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#name').attr("value",div.data('name'));
            modal.find('#edit_nip').attr("value",div.data('nip'));
            modal.find('#edit_user_role').attr("value",div.data('role'));
            modal.find('#edit_alamat').attr("value",div.data('alamat'));
            modal.find('#edit_email').attr("value",div.data('email'));
            modal.find('#edit_phone').attr("value",div.data('phone'));
            modal.find('#edit_username').attr("value",div.data('username'));
            modal.find('#edit_password').attr("value",div.data('password'));
        });
    });
</script>

<!-- Get data for edit data peralatan scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#alat-modal-edit').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#add_kategori').attr("value",div.data('kategori'));
            modal.find('#add_nama').attr("value",div.data('nama'));
            modal.find('#add_merk').attr("value",div.data('merk'));
            modal.find('#add_tipe').attr("value",div.data('tipe'));
            modal.find('#add_data_teknis').attr("value",div.data('data_teknis'));
            modal.find('#add_tahun_install').attr("value",div.data('tahun_install'));
            modal.find('#add_jumlah').attr("value",div.data('jumlah'));
            modal.find('#add_kondisi').attr("value",div.data('kondisi'));
            modal.find('#add_keterangan').attr("value",div.data('keterangan'));
        });
    });
</script>

<!-- Get data for edit data suku cadang scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#skcadang-modal-edit').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#tanggal_br').attr("value",div.data('tanggal'));
            modal.find('#kode').attr("value",div.data('kode'));
            modal.find('#nama_skcadang').attr("value",div.data('nama_skcadang'));
            modal.find('#merk').attr("value",div.data('merk'));
            modal.find('#tipe').attr("value",div.data('tipe'));
            modal.find('#spesifikasi').attr("value",div.data('spesifikasi'));
            modal.find('#jumlah').attr("value",div.data('jumlah'));
            modal.find('#keterangan').attr("value",div.data('keterangan'));
        });
    });
</script>

<!-- Get data for PERAWATAN - ACC PEMERIKSA scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#perawatan-modal-pemeriksa').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#tanggal_periksa').attr("value",div.data('tanggal_periksa'));
            modal.find('#pemeriksa').attr("value",div.data('pemeriksa'));
            modal.find('#status_id').attr("value",div.data('status_id'));
        });
    });
</script>

<!-- Get data for PERAWATAN - CANCEL ACC PEMERIKSA scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#cancel-modal').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#tanggal_periksa').attr("value",div.data('tanggal_periksa'));
            modal.find('#pemeriksa').attr("value",div.data('pemeriksa'));
            modal.find('#status_id').attr("value",div.data('status_id'));
        });
    });
</script>

<!-- Get data for FL- ACC PEMERIKSA scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#fl-modal-pemeriksa').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#waktu_periksa').attr("value",div.data('waktu_periksa'));
            modal.find('#nama_pemeriksa').attr("value",div.data('nama_pemeriksa'));
            modal.find('#status_id').attr("value",div.data('status_id'));
        });
    });
</script>

<!-- Get data for FL - CANCEL ACC PEMERIKSA scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#fl-cancel-modal').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#waktu_periksa').attr("value",div.data('waktu_periksa'));
            modal.find('#nama_pemeriksa').attr("value",div.data('nama_pemeriksa'));
            modal.find('#status_id').attr("value",div.data('status_id'));
        });
    });
</script>

<!-- Get data for LKP- ACC PEMERIKSA scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#lkp-modal-pemeriksa').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#tanggal_periksa').attr("value",div.data('tanggal_periksa'));
            modal.find('#nama_pemeriksa').attr("value",div.data('nama_pemeriksa'));
            modal.find('#status_id').attr("value",div.data('status_id'));
        });
    });
</script>

<!-- Get data for LKP - CANCEL ACC PEMERIKSA scripts -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#lkp-cancel-modal').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#tanggal_periksa').attr("value",div.data('tanggal_periksa'));
            modal.find('#nama_pemeriksa').attr("value",div.data('nama_pemeriksa'));
            modal.find('#status_id').attr("value",div.data('status_id'));
        });
    });
</script>

<!-- Print -->
<script>
	$(document).ready(function(){
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input.datepicker({format: 'yyyy-mm-dd',container: container,todayHighlight: true,autoclose: true,})
								})
								function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
	</script>

  <!-- Print 2 -->
  <script>
  function printDiv() {
    var divToPrint = document.getElementById('table');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding:0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}
  </script>

<!-- Input Waktu -->
<script>
var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {

  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
</script>
