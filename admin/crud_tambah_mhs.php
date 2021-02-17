<?php 
	include "../koneksi.php";
    $namadep = $_POST['namadep'];
    $namabel = $_POST['namabel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 'mahasiswa';
    $username = $_POST['username'];

    $query = "INSERT INTO users (id, namadep, namabel, email, password, status, username) VALUES ('','{$namadep}','{$namabel}','{$email}','{$password}','{$status}','{$username}')" ;
    $conn->query($query);

 ?>