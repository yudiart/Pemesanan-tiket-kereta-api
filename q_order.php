<?php 
	require 'server/config.php';

 	session_start();   
 	$jadwal = $_GET['id']; 
	$user_id = $_SESSION['user_id'];
 	
 	
 if (isset($_POST['btn-order'])) {
 	
	 	$id_user = $user_id;
	 	$id_jadwal = $jadwal;
	 	$no_kk = mysqli_real_escape_string($conn,$_POST['no_kk']);
	 	$nama = mysqli_real_escape_string($conn,$_POST['nama']);
	 	$usia = mysqli_real_escape_string($conn,$_POST['usia']);
	 	$no_hp = mysqli_real_escape_string($conn,$_POST['no_hp']);
	 	$tgl_order = mysqli_real_escape_string($conn,$_POST['tgl_order']);
	 	$jml_penumpang = mysqli_real_escape_string($conn,$_POST['jml_penumpang']);
	 	$date = date('Y-m-d H:i:s');

		$sql = " INSERT INTO order (id_user, id_jadwal, nama, usia, no_kk, no_hp, tgl_order, jml_penumpang, date_created) VALUES ('$id_user', '$id_jadwal', '$nama', '$usia', '$no_kk', '$no_hp', '$tgl_order', '$jml_penumpang',  '$date')";
		
		$result = mysqli_query($conn,$sql);
		if($result === true){
			header("location:payment.php");
		}else{
			
			$message = "Gagal memasukan ke database";
			echo "<script type='text/javascript'>alert('$message');</script>";
				
						
				
		}
		
		
	}
 ?>
	