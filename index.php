<?php 
// Start the session
	session_start();
	if(isset($_SESSION['status'])){
		if($_SESSION['status'] == 'admin'){
			header("Location: admin/grafik.php");
		}
		else if($_SESSION['status'] == 'dosen'){
			header("Location: dosen/tanaman-dosen.php");
		}
		else if($_SESSION['status'] == 'mahasiswa'){
			header("Location: mhs/caritanaman.php");
		}
	}


	include "koneksi.php";
	if(isset($_POST['submit'])){
		$login = mysqli_query($conn, "SELECT * FROM users WHERE username ='$_POST[username]' AND password = '$_POST[pass]'");
		$rowcount = mysqli_num_rows($login);
		if($rowcount>0){
			$buff=mysqli_fetch_assoc($login);
			
			$_SESSION['status'] = $buff['status'];
			
			if($buff['status'] == 'admin'){
				header("Location: admin/grafik.php");
			}
			else if($buff['status'] == 'dosen'){
				header("Location: dosen/tanaman-dosen.php");
			}
			else if($buff['status'] == 'mahasiswa'){
				header("Location: mhs/caritanaman.php");
			}
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="vendorr/login_v3/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/css/util.css">
	<link rel="stylesheet" type="text/css" href="vendorr/login_v3/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('vendorr/login_v3/images/plant.png');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower-alt zmdi-hc-lg"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendorr/login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorr/login_v3/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorr/login_v3/vendor/bootstrap/js/popper.js"></script>
	<script src="vendorr/login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorr/login_v3/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorr/login_v3/vendor/daterangepicker/moment.min.js"></script>
	<script src="vendorr/login_v3/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendorr/login_v3/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendorr/login_v3/js/main.js"></script>

</body>
</html>