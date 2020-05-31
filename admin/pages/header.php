<?php require '../server/config.php';
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem pemesanan tiket kereta api</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="index.php">Logo</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="jadwal.php">Tambah Jadwal <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<div class="form-inline my-2 my-lg-0">
				<?php  
					if(isset($_SESSION['status'])) {
						if ($_SESSION['level'] ==='admin') {
							echo '<a href="../logout.php" class="nav-link">Logout</a>';
						}else{
							echo '<a href="logout.php" class="nav-link">Logout</a>';			
						}
					} else {
					echo '<a href="login.php" class="nav-link">Login</a><a href="register.php" class="nav-link">Register</a>';
				} ?>
				
			</div>
		</div>
	</div>
</nav>
