<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> | <?= $tentang['nama_aplikasi'] ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets/AdminLTE-3.2.0/") ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url("assets/img/") . $tentang["logo_aplikasi"] ?>" alt="<?= $tentang["nama_aplikasi"] ?>" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i> <?= strtoupper($_SESSION['data_login']['fullname']) ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?= base_url() . "users/edit/" . $_SESSION['data_login']['id'] ?>" class="dropdown-item">
              <i class="fas fa-user-edit"></i> Ubah Profil
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url("sign-out") ?>" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= base_url("assets/img/") . $tentang["logo_aplikasi"] ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Portal <?= ucfirst($_SESSION['data_login']['role']) ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url("assets/img/" . $_SESSION['data_login']['photo']) ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= strtoupper($_SESSION['data_login']['fullname']) ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url("/dashboard") ?>" class="nav-link <?= $title == "Dashboard" ? "active" : "" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <?php if ($_SESSION['data_login']['role'] == "superadmin") { ?>
              <li class="nav-item">
                <a href="<?= base_url("/data-prodi") ?>" class="nav-link <?= $title == "Data Prodi" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Prodi
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['data_login']['role'] == "superadmin") { ?>
              <li class="nav-item">
                <a href="<?= base_url("/data-matakuliah") ?>" class="nav-link <?= $title == "Data Matakuliah" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    Data Matakuliah
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['data_login']['role'] == "superadmin") { ?>
              <li class="nav-item">
                <a href="<?= base_url("/data-cpl") ?>" class="nav-link <?= $title == "Data CPL" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Data CPL
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['data_login']['role'] == "superadmin") { ?>
              <li class="nav-item">
                <a href="<?= base_url("/data-dosen") ?>" class="nav-link <?= $title == "Data Dosen" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Dosen
                  </p>
                </a>
              </li>
            <?php } ?>

            <li class="nav-item">
              <a href="<?= base_url("/data-mahasiswa") ?>" class="nav-link <?= $title == "Data Mahasiswa" ? "active" : "" ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Mahasiswa
                </p>
              </a>
            </li>

            <?php if ($_SESSION['data_login']['role'] == "superadmin") { ?>
              <li class="nav-item">
                <a href="<?= base_url("/users") ?>" class="nav-link <?= $title == "Data User/Hak Akses" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Data User/Hak Akses
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['data_login']['role'] == "superadmin") { ?>
              <li class="nav-item">
                <a href="<?= base_url("/tentang") ?>" class="nav-link <?= $title == "Tentang" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-globe"></i>
                  <p>
                    Tentang
                  </p>
                </a>
              </li>
            <?php } ?>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php $this->load->view($page) ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>Copyright &copy; <?= date("Y") ?> <a href="<?= base_url("/") ?>"><?= $tentang['nama_aplikasi'] ?></a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


  <!-- ChartJS -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/chart.js/Chart.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>dist/js/adminlte.js"></script>

  <!-- Summernote -->
  <script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/summernote/summernote-bs4.min.js"></script>

  <script>
    $(function() {
      $('.datatable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      $("#example1").DataTable({
        "responsive": true,
        "searching": false,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": [{
          extend: 'pdfHtml5',
          orientation: 'landscape',
          pageSize: 'A4',
          customize: function(doc) {
            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
            doc.styles.tableBodyEven.alignment = 'center';
            doc.styles.tableBodyOdd.alignment = 'center';
          },
          exportOptions: {
            columns: [0, 2, 3, 4, 5, 6]
          },
        }],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $('#summernote').summernote();

    <?php if ($this->session->flashdata('msg')) { ?>
      alert("<?= $this->session->flashdata('msg') ?>")
    <?php } ?>
  </script>

</body>

</html>