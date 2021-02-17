<?php 
	include "../koneksi.php";
    $nama = $_POST['nama'];
    $manfaat = [$_POST['manfaat1'],$_POST['manfaat2'],$_POST['manfaat3'],$_POST['manfaat4']];
    
    $id = $_POST['id'];

    $query = "UPDATE tbl_test SET nama_tanaman='$nama' WHERE id=$id" ;
    $conn->query($query);

    $conn->query("DELETE FROM manfaat_tanaman WHERE id_tanaman_fk = '$id'");
    foreach ($manfaat as $m) {
		if($m != NULL){
			$query = "INSERT INTO manfaat_tanaman (id, id_tanaman_fk, manfaat) VALUES ('','{$id}','{$m}')" ;
		    $conn->query($query);
		}
	}

 ?>

