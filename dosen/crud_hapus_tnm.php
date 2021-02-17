<?php 
	include '../koneksi.php';
	// var_dump()
	$id = $_GET['id'];
	$query = "DELETE FROM tbl_test WHERE id=$id";
	$conn->query($query);
	$query = "DELETE FROM manfaat_tanaman WHERE id_tanaman_fk=$id";
	$conn->query($query);

	header("location: tanaman-dosen.php");
?>