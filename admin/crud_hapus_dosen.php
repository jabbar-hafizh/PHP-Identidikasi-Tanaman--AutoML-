<?php 
	include '../koneksi.php';
	// var_dump()
	$id = $_GET['id'];
	$query = "DELETE FROM users WHERE id=$id";
	$conn->query($query);

	header("location: kelola_dosen.php");
?>