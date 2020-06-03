<?php 
	require '../server/config.php';
 
 if (isset($_POST['btn-edit'])) {
 	$id = $_POST['id'];
	$asal = $_POST['asal'];
	$tujuan = $_POST['tujuan'];
	$kelas = $_POST['kelas'];
	$harga = $_POST['harga'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];

	$sql = mysqli_query($conn,"update jadwal set asal='$asal', tujuan='$tujuan', kelas='$kelas', harga='$harga', tanggal='$tanggal', waktu='$waktu' where id='$id'");
	if ($sql === true) {
		header("location:jadwal.php");
	}
}
 ?>