<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> SIKAP </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('') ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('') ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('') ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('') ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?= base_url('') ?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?= base_url('') ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?= base_url('') ?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?= base_url('') ?>assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('') ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('') ?>assets/css/custom.min.css" rel="stylesheet">

    <script src="<?= base_url('') ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/nprogress/nprogress.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/iCheck/icheck.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/starrr/dist/starrr.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/DateJS/build/date.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url('') ?>assets/js/sweetalert.min.js"></script>
    <!-- <script src="<?= base_url('') ?>assets/js/custom.min.js"></script> -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/images/site.webmanifest') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style type="text/css" media="screen">
    .main-wrapper{
      min-height: 100vh;
    }
    .sidebar-footer a:hover{
      background: #172D44 !important;
    }
    .null-input{
      border: 1px solid red;
    }
  </style>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>SIKAP</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url('') ?>assets/images/person.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?= $this->session->userdata('name') ?></h2>
              </div>
              <!-- <div class="clearfix"></div> -->
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li <?= $this->session->userdata('menu') == 'siswa' ? 'class="current-page"' : ''?>><a href="<?= base_url('siswa') ?>"><i class="fa fa-bars"></i> Data Siswa</a></li>
                  <li <?= $this->session->userdata('menu') == 'nilaimk' ? 'class="current-page"' : ''?>><a href="<?= base_url('nilaimk') ?>"><i class="fa fa-edit"></i> Pleton</a></li>
                  <li <?= $this->session->userdata('menu') == 'presensi' ? 'class="current-page"' : ''?>><a href="<?= base_url('presensi') ?>"><i class="fa fa-clipboard"></i> Presensi</a></li>
                  <?php if ($this->session->userdata('role') == 1): ?>
                    <li <?= $this->session->userdata('menu') == 'users' ? 'class="current-page"' : ''?>><a href="<?= base_url('users') ?>" ><i class="fa fa-user"></i> Users</a></li>
                  <?php endif ?>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('main/logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">

                </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= isset($content_page) ? $content_page : '' ?></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 main-wrapper">
                <div class="x_panel">
                  <div class="x_content">
                    <?php $this->load->view($content_view, isset($content_data) ? $content_data : []); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  </body>
  <script src="<?= base_url('') ?>assets/js/custom.min.js"></script>
  <script type="text/javascript" charset="utf-8">
    <?php if($this->session->flashdata('msg')) { ?>
      Swal.fire({
        title : "<?= $this->session->flashdata('msg') ?>",
        icon : "<?= $this->session->flashdata('type') ?>"
      });
    <?php  } ?>
  </script>
</html>
