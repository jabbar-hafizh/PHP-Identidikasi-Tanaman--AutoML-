<?php 
	include "../koneksi.php";
    $namadep = $_POST['namadep'];
    $namabel = $_POST['namabel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 'mahasiswa';
    $username = $_POST['username'];
    $id = $_POST['id'];
    $query = "UPDATE users SET namadep='$namadep', namabel='$namabel', email='$email', password='$password', username='$username' WHERE id=$id" ;
    $conn->query($query);

 ?>