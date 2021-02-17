<?php 
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != 'mahasiswa'){
  header("Location: ../index.php");
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TANAMAN</title>

  <!-- Custom fonts for this template-->
  <link href="../vendorr/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../vendorr/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-seedling"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TANAMAN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      
      <!-- Heading -->
      <div class="sidebar-heading">
        Tanaman
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="caritanaman.php">
          <i class="fas fa-fw fa-seedling"></i>
          <span>Cari Tanaman</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link"href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Mahasiswa</span>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CARI Tanaman</h1>
          </div>
          <div class="row">
          <form action="identifikasi_proses.php" method="POST" enctype="multipart/form-data">
            <div class="form-group ">
             <input type="file" name="gambar_tanaman">
            </div>
            <button name="submit_identifikasi" type="submit" class=" btn col-md-3 btn-primary btn-user btn-block">
              Submit
            </button>


            <!-- <input type="file" name="gambar_tanaman"> <br>
            <button name="submit_identifikasi" type="submit">Submit</button>
             -->
          </form>
          </div>

          

          <br>
          <!-- Akses Object -->
          <?php if(isset($result)): ?>
            <h1><?= $result->object ?></h1>
          <?php endif ?>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendorr/sbadmin2/vendor/jquery/jquery.min.js"></script>
  <script src="../vendorr/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendorr/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../vendorr/sbadmin2/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendorr/sbadmin2/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../vendorr/sbadmin2/js/demo/chart-area-demo.js"></script>
  <script src="../vendorr/sbadmin2/js/demo/chart-pie-demo.js"></script>

</body>

</html>
