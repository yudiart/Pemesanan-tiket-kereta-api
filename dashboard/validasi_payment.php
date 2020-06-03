<?php 

	require '../server/config.php';

	
	$_idpayment = $_GET['id'];
	$order = $_GET['order'];

	
	$res = mysqli_query($conn,"UPDATE payment SET status='sudah' WHERE id='$_idpayment'");
	$result = mysqli_query($conn,"DELETE from t_order where id='$order' ");
	var_dump($result);
	if ($res === true) {
		header('location: index.php');
	}
 ?>