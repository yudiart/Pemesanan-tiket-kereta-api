<?php include '../server/config.php';
	session_start();
	if (!isset($_SESSION['status'])) {
	  header('Location: ../error.php');
	}else if(!isset($_SESSION['user_id'])){
	  header('Location: ../login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<title>Sistem pemesanan tiket kereta api</title>
	<!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/mdi/css/materialdesignicons.min.css">
  <!-- Custom styles for this template-->
  <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
  