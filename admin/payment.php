<?php 

	require '../server/config.php';

	
	$_idpayment = $_GET['id'];
	$order = $_GET['order'];

	
	$res = mysqli_query($conn,"UPDATE payment SET status='sudah' WHERE id='$_idpayment'");
	$res2 = mysqli_query($conn,"DELETE FROM t_order where id='$order'");

	if ($res === true) {
		header('location: index.php');
	}
	
		

	

 ?>