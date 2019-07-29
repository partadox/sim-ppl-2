<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Penjadwalan</title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/logo.png">
  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
              <img class="logo-img" src="<?= base_url('assets/'); ?>img/logo.png" width="50" height="60" alt="logo">
            </div>
            <div class="sidebar-brand-text mx-2">SIM-PPL<sup>Admin</sup></div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
              <i class="fas fa-columns"></i>
              <span>Dashboard</span></a>
          </li>

          <!-- Heading -->
          <div class="sidebar-heading">
            Master Data
          </div>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Nav Item - Penjadwalan -->
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('calendar'); ?>">
              <i class="fas fa-clipboard-list"></i>
              <span>Penjadwalan</span></a>
          </li>

          <!-- Nav Item - Petugas -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/data_petugas'); ?>">
              <i class="fas fa-users"></i>
              <span>Data Petugas</span></a>
          </li>

          <!-- Nav Item - Peralatan -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeralatan" aria-expanded="true" aria-controls="collapsePeralatan">
              <i class="fas fa-toolbox"></i>
              <span> Data Peralatan</span>
            </a>
            <div id="collapsePeralatan" class="collapse" aria-labelledby="headingPeralatan" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/data_peralatan'); ?>">Semua Peralatan</a>
                <a class="collapse-item" href="<?= base_url('admin/data_peralatan_print'); ?>">Print Data Peralatan</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Suku Cadang -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCadang" aria-expanded="true" aria-controls="collapseCadang">
              <i class="fas fa-toolbox"></i>
              <span>Suku Cadang</span>
            </a>
            <div id="collapseCadang" class="collapse" aria-labelledby="headingCadang" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/data_skcadang'); ?>">Data Suku Cadang</a>
                <a class="collapse-item" href="<?= base_url('admin/data_skcadang_print'); ?>">Print Data Sk.Cadang</a>
                <a class="collapse-item" href="<?= base_url('admin/data_skcadang_keluar'); ?>">Data Sk.Cadang Keluar</a>
                <a class="collapse-item" href="<?= base_url('admin/data_skcadang_keluar_print'); ?>">Print Sk.Cadang Keluar</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Perawatan-->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerawatan" aria-expanded="true" aria-controls="collapsePerawatan">
              <i class="fas fa-wrench"></i>
              <span> Data Pemeliharaan</span>
            </a>
            <div id="collapsePerawatan" class="collapse" aria-labelledby="headingPerawatan" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/data_perawatan'); ?>">Laporan Pemeliharaan</a>
                <a class="collapse-item" href="<?= base_url('admin/data_perawatan_harian'); ?>">Pemeliharaan Harian</a>
                <a class="collapse-item" href="<?= base_url('admin/data_perawatan_mingguan'); ?>">Pemeliharaan Mingguan</a>
                <a class="collapse-item" href="<?= base_url('admin/data_perawatan_bulanan'); ?>">Pemeliharaan Bulanan</a>
              <!-- <a class="collapse-item" href="#">Ambil Peralatan</a> -->
              </div>
            </div>
          </li>

          <!-- Nav Item - Facility Logbook -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLogbook" aria-expanded="true" aria-controls="collapseLogbook">
              <i class="fas fa-book"></i>
              <span> Facility Logbook</span>
            </a>
            <div id="collapseLogbook" class="collapse" aria-labelledby="headingLogbook" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/data_facility_logbook'); ?>">Data</a>
                <a class="collapse-item" href="<?= base_url('admin/data_facility_logbook_print'); ?>">Print</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Laporan Kerusakan dan Perbaikan -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLKP" aria-expanded="true" aria-controls="collapseLKP">
              <i class="fas fa-tools"></i>
              <span> Laporan Kerusakan dan Perbaikan</span>
            </a>
            <div id="collapseLKP" class="collapse" aria-labelledby="headingLKP" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/data_laporan_kerusakan'); ?>">Data</a>
                <a class="collapse-item" href="<?= base_url('admin/data_laporan_kerusakan_print'); ?>">Print</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Meter Reading -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMeterReadomg" aria-expanded="true" aria-controls="collapseMeterReadomg">
              <i class="fas fa-tachometer-alt"></i>
              <span> Meter Reading</span>
            </a>
            <div id="collapseMeterReadomg" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/data_mr_ccr'); ?>">Data CCR</a>
                <a class="collapse-item" href="<?= base_url('admin/data_mr_ccr_print'); ?>">Print Data CCR</a>
                <a class="collapse-item" href="<?= base_url('admin/data_mr_ups'); ?>">Data UPS</a>
                <a class="collapse-item" href="<?= base_url('admin/data_mr_ups_print'); ?>">Print Data UPS</a>
                <a class="collapse-item" href="<?= base_url('admin/data_mr_genset'); ?>">Data Genset</a>
                <a class="collapse-item" href="<?= base_url('admin/data_mr_genset_print'); ?>">Print Data Genset</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Performa Lampu -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/performa_lampu'); ?>">
              <i class="fab fa-creative-commons-sampling"></i>
              <span>Grafik Performa Lampu</span></a>
          </li>

          <!-- Nav Item - Gambar Installasi -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/gambar_installasi'); ?>">
              <i class="far fa-images"></i>
              <span>Gambar Installasi</span></a>
          </li>

          <!-- Nav Item - SOP -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/sop'); ?>">
              <i class="fas fa-file-contract"></i>
              <span>SOP</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/profile/admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
      <div class="page-content-wrapper">
          <div class="page-content">
              <div class="alert notification" style="display: none;">
                  <button class="close" data-close="alert"></button>
                  <p></p>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="portlet light bordered">
                          <div class="portlet-body">
                              <div class="table-toolbar">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="btn-group">
                                              <button type="button" data-target="#create_modal" data-toggle="modal" class="btn btn-primary mb-3 add_calendar"> Buat Jadwal Baru
                                                  <i class="fa fa-plus"></i>
                                              </button>
                                              <br>
                                              <br>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card mb-3" >
                                  <div class="card-body">
                                    <b>*Jika ingin menambah jadwal baru harus pakai tombol (Buat jadwal Baru <i class="fa fa-plus"></i>). </b><br>
                                    <b>*Tanggal mulai dan tanggal selesai <u>harus didefinisikan</u>. </b><br>
                                    *Jika terjadi error, harus sering dilakukan refresh.<br>
                                    *Jika ingin melihat detail, klik pada label warnanya.<br>
                                  </div>
                                </div>
                              </div>
                              <!-- place -->
                              <div id="calendarIO"></div>
                              <!-- Modal -->
                              <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                          <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                              <input type="hidden" name="calendar_id" value="0">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Jadwal Baru</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                              <div class="form-group">
                                                 <div class="alert alert-danger" style="display: none;"></div>
                                             </div>
                                             <div class="form-group">
                                              <label class="control-label">Petugas<span class="required"> * </span></label>
                                              <input type="text" name="title" class="form-control" placeholder="Nama Petugas...">
                                            </div>

                                          <div class="form-group">
                                              <label class="control-label">Deskripsi Pekerjaan</label>
                                                  <input name="description" rows="3" class="form-control"  placeholder="Penjelasan pekerjaan yang dilakukan...">
                                          </div>

                                          <div class="form-group">
                                              <label for="color" class="control-label">Label Warna</label>

                                                  <select name="color" class="form-control">
                                                      <option value="">Pilih...</option>
                                                      <option style="color:#ffbfbf;" value="#ffbfbf">&#9724; Merah</option>
                                                      <option style="color:#bfe2ff;" value="#bfe2ff">&#9724; Biru</option>
                                                      <option style="color:#bfffda;" value="#bfffda">&#9724; Hijau</option>
                                                      <option style="color:#eeffab;" value="#eeffab">&#9724; Kuning</option>
                                                      <option style="color:#dde0d1;" value="#dde0d1">&#9724; Hitam</option>
                                                  </select>

                                          </div>

                                          <div class="form-group">
                                              <label class="control-label">Tanggal Mulai</label>
                                                  <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                      <input type="text" name="start_date" class="form-control mr-3" readonly>
                                                      <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                  </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label">Tanggal Selesai</label>
                                                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                    <input type="text" name="end_date" class="form-control mr-3" readonly>
                                                    <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                </div>
                                        </div>

                                      </div>
                                      <div class="modal-footer">
                                          <a href="javascript::void" class="btn default" data-dismiss="modal">Batal</a>
                                          <a class="btn btn-danger delete_calendar" style="display: none;">Hapus</a>
                                          <button type="submit" class="btn green">Tambah</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <!-- end place -->
                  </div>
              </div>

          </div>
      </div>
  </div>
  </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/moment.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/sb-admin-2.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>
<script type="text/javascript">
    var get_data        = '<?php echo $get_data; ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil(event);
                    editData(event);
                    deleteData(event);
                },
                events: JSON.parse(get_data)
            });
    });

    $(document).on('click', '.add_calendar', function(){
        $('#create_modal input[name=calendar_id]').val(0);
        $('#create_modal').modal('show');
    })

    $(document).on('submit', '#form_create', function(){

        var element = $(this);
        var eventData;
        $.ajax({
            url     : backend_url+'calendar/save',
            type    : element.attr('method'),
            data    : element.serialize(),
            dataType: 'JSON',
            beforeSend: function()
            {
                element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            success: function(data)
            {
                if(data.status)
                {
                    eventData = {
                        id          : data.id,
                        title       : $('#create_modal input[name=title]').val(),
                        description : $('#create_modal textarea[name=description]').val(),
                        start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        color       : $('#create_modal select[name=color]').val()
                    };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }
            });
        return false;
    })

    function editDropResize(event)
    {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if(event.end)
        {
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        }
        else
        {
            end = start;
        }

        $.ajax({
            url     : backend_url+'calendar/save',
            type    : 'POST',
            data    : 'calendar_id='+event.id+'&title='+event.title+'&start_date='+start+'&end_date='+end,
            dataType: 'JSON',
            beforeSend: function()
            {
            },
            success: function(data)
            {
                if(data.status)
                {
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                }
                else
                {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
            }
        });
    }

    function save()
    {
        $('#form_create').submit(function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {
                        eventData = {
                            id          : data.id,
                            title       : $('#create_modal input[name=title]').val(),
                            description : $('#create_modal textarea[name=description]').val(),
                            start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            color       : $('#create_modal select[name=color]').val()
                        };
                            $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('Wrong server, please save again');
                    }
                });
            return false;
        })
    }

    function deteil(event)
    {
        $('#create_modal input[name=calendar_id]').val(event.id);
        $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
        $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
        $('#create_modal input[name=title]').val(event.title);
        $('#create_modal input[name=description]').val(event.description);
        $('#create_modal select[name=color]').val(event.color);
        $('#create_modal .delete_calendar').show();
        $('#create_modal').modal('show');
    }

    function editData(event)
    {
        $('#form_create').submit(function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {
                        event.title         = $('#create_modal input[name=title]').val();
                        event.description   = $('#create_modal textarea[name=description]').val();
                        event.start         = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.end           = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.color         = $('#create_modal select[name=color]').val();
                        $('#calendarIO').fullCalendar('updateEvent', event);

                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }
            });
            return false;
        })
    }

    function deleteData(event)
    {
        $('#create_modal .delete_calendar').click(function(){
            $.ajax({
                url     : backend_url+'calendar/delete',
                type    : 'POST',
                data    : 'id='+event.id,
                dataType: 'JSON',
                beforeSend: function()
                {
                },
                success: function(data)
                {
                    if(data.status)
                    {
                        $('#calendarIO').fullCalendar('removeEvents',event._id);
                        $('#create_modal').modal('hide');
                        $('#form_create')[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        $('#form_create').find('.alert').css('display', 'block');
                        $('#form_create').find('.alert').html(data.notif);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $('#form_create').find('.alert').css('display', 'block');
                    $('#form_create').find('.alert').html('Wrong server, please save again');
                }
            });
        })
    }

</script>
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

<!-- Input waktu/date scripts full js-->
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
