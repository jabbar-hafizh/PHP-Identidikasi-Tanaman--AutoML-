<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != 'mahasiswa'){
  header("Location: ../index.php");
}
  include '../koneksi.php';

  $url = 'https://us-central1-api-automl.cloudfunctions.net/apiweb3c';

  $filepath = "../test_upload_gambar/" . $_FILES["gambar_tanaman"]["name"];;

  $post_data = ['gambar_tanaman' => base64_encode(file_get_contents($_FILES['gambar_tanaman']['tmp_name']))];

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $url,
    CURLOPT_CONNECTTIMEOUT => 60,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $post_data,
  ));

  //  Response API
  $response = curl_exec($curl);
  curl_close($curl);

  //  Decode response
  $result = json_decode($response);

  $tanaman = $result->object;

  $cek_tanaman = mysqli_query($conn, "select * from tbl_test where nama_tanaman='$tanaman'");

  $cek = mysqli_num_rows($cek_tanaman);
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
            <h1 class="h3 mb-0 text-gray-800">Hasil</h1>
          </div>
          
          
           <?php if(isset($result)): ?>
                <h1><?= $result->object ?></h1>
                <?php if ($cek > 0):?>
                  <?php 
                  $data = mysqli_fetch_assoc($cek_tanaman);
                  if(move_uploaded_file($_FILES["gambar_tanaman"]["tmp_name"], $filepath)) 
                  {
                    echo "<img class =\"image\" src=".$filepath." />";
                  } 
                  else 
                  {
                    echo "Error !!";
                  }
                  ?>
                  <h3>Manfaat</h3>
                  <ul>
                  <?php 
                    $id = $data['id'];
                    $result = $conn->query("SELECT * FROM manfaat_tanaman WHERE id_tanaman_fk = '{$id}'");
                    while($rows = $result->fetch_assoc()): ?>
                      <li><?= $rows['manfaat']; ?></li> 
                    <?php endwhile; ?> 
                  </ul>
                  
                <?php else: ?>
                    <?php echo "Gambar tidak dapat diidentifikasi
                    <br/><br/>";  ?>
                <?php endif; ?>
                
                <form action="caritanaman.php" method="post">
                <input type="submit" class="tombol_login" value="Coba Lagi">
                <br/><br/>
                </form>
                
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
