<?php 
	include "../koneksi.php";
    $nama = $_POST['nama'];
    $manfaat = [$_POST['manfaat1'],$_POST['manfaat2'],$_POST['manfaat3'],$_POST['manfaat4']];

    $query = "INSERT INTO tbl_test (id, nama_tanaman) VALUES ('','{$nama}')" ;
    $conn->query($query);

    $result = mysqli_query($conn, "select * from tbl_test where nama_tanaman='$nama'");
	$row = mysqli_fetch_assoc($result);
	$id = $row['id'];
	

	foreach ($manfaat as $m) {
		if($m != NULL){
			$query = "INSERT INTO manfaat_tanaman (id, id_tanaman_fk, manfaat) VALUES ('','{$id}','{$m}')" ;
		    $conn->query($query);
		}
	}
		

 ?>