<?php 
	require '../server/config.php';
 
 if (isset($_POST['btn-tambah'])) {

	$asal = $_POST['asal'];
	$tujuan = $_POST['tujuan'];
	$kelas = $_POST['kelas'];
	$harga = $_POST['harga'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];
	

	$sql = " INSERT INTO jadwal (asal,tujuan,kelas,harga,tanggal,waktu) VALUES ('$asal','$tujuan','$kelas','$harga','$tanggal','$waktu')";
	$result = mysqli_query($conn,$sql);
	if($result === true){
		header("location:jadwal.php");
	}
}
 ?>