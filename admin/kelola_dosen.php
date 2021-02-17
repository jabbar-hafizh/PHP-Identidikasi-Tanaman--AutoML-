<?php 
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != 'admin'){
  header("Location: ../index.php");
}
if(isset($_POST['tambah'])) {
    include 'crud_tambah_dosen.php';
}
else if(isset($_POST['edit'])){
  include 'crud_edit_dosen.php';
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
        grafik
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="grafik.php">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Grafik</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading">
        Dosen
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="kelola_dosen.php">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Kelola Dosen</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading">
        Mahasiswa
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="kelola_mahasiswa.php">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Kelola Mahasiswa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tanaman
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="kelola_tanaman.php">
          <i class="fas fa-fw fa-seedling"></i>
          <span>Kelola Tanaman</span></a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Dosen</h1>
          </div>
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahDosenModal">Tambah data Dosen</button>

          <?php 
            include'../koneksi.php';
            $query = "SELECT * FROM users where status = 'dosen'" ;
            $result = $conn->query($query);
          ?>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php if ($result->num_rows > 0): ?>
              <?php $i=1; ?>
              <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td><?php echo $row['namadep'].' '.$row['namabel']; ?></td>
                <td><?php echo $row['email'] ?></td>
                <td>
                  <a href="#editDosenModal" class="badge badge-primary" data-toggle="modal" data-id-user="<?= $row['id']; ?>">edit</a>
                  <a href="crud_hapus_dosen.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">hapus</a>
                </td>
              </tr>
              <?php endwhile; ?> 
              <?php endif; ?> 
            </tbody>
          </table>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Wahyu.N & M.Samiaji TI.3.C UIN JKT 2019</span>
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

    
  <!-- Modal TAMBAH -->
  <div class="modal fade" id="tambahDosenModal" tabindex="-1" role="dialog" aria-labelledby="tambahDosenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDosenModalLabel">Tambah Dosen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="namadep" name="namadep" placeholder="Nama Depan" >
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="namabel" name="namabel" placeholder="Nama Belakang" >
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   <!-- Modal Edit -->
  <div class="modal fade" id="editDosenModal" tabindex="-1" role="dialog" aria-labelledby="editDosenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDosenModalLabel">Edit Dosen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" value="1">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="namadepedit" name="namadep" placeholder="Nama Depan">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="namabeledit" name="namabel" placeholder="Nama Belakang" >
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="usernameedit" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="email" class="form-control form-control-user" id="emailedit" name="email" placeholder="email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-user" id="passwordedit" name="password" placeholder="password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
        </div>
        </form>
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
  <script>
    $('#editDosenModal').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).data('id-user');
      $(e.currentTarget).find('input[name="id"]').val(id);
    });
  </script>

</body>

</html>
