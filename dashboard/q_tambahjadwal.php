<?php 
	require '../server/config.php';
 	$id = random_bytes(5);
 if (isset($_POST['btn-tambah'])) {
 	$_id = bin2hex($id);
	$asal = $_POST['asal'];
	$tujuan = $_POST['tujuan'];
	$kelas = $_POST['kelas'];
	$harga = $_POST['harga'];
	$limit = $_POST['limit'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];
	

	$sql = " INSERT INTO jadwal (id,asal,tujuan,kelas,harga,tanggal,waktu) VALUES ('$_id','$asal','$tujuan','$kelas','$harga','$tanggal','$waktu')";
	$sql2 = " INSERT INTO k_tujuan (id_jadwal,limit_penumpang) VALUES ('$_id','$limit')";
	$result = mysqli_query($conn,$sql2);
	$result = mysqli_query($conn,$sql);
	if($result === true){
		header("location:jadwal.php");
	}
}
 ?>