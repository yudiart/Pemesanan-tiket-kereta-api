<?php 
	require 'server/config.php';
	session_start();
	$id = $_SESSION['user_id'];
	$bytes = random_bytes(10);
	$_code = random_bytes(20);
	$id_payment = random_bytes(5);
	$id_jdwl = $_GET['id'];
	if(isset($_POST['btn-order'])){
		// Order
		$_id = bin2hex($bytes);
		$id_user = $id;
	 	$id_jadwal = $id_jdwl;
	 	$no_kk = $_POST['no_kk'];
	 	$nama = $_POST['nama'];
	 	$usia = $_POST['usia'];
	 	$no_hp = $_POST['no_hp'];
	 	$tgl_order = $_POST['tgl_order'];
	 	$jml_penumpang = $_POST['jml_penumpang'];
	 	$date = date('Y-m-d H:i:s');

	 	// Payment
	 	$_idpayment = bin2hex($id_payment);
		$_codepayment = 'KAI-'.bin2hex($_code);
		$status = 'belum';


		$sql = "INSERT INTO t_order (id,id_user,id_jadwal,nama,usia,no_kk,no_hp,tgl_order,jml_penumpang,date_created)
				VALUES
				('$_id','$id_user','$id_jadwal','$nama','$usia','$no_kk','$no_hp','$tgl_order','$jml_penumpang','$date')";
		$sql2 = "INSERT INTO payment (id,id_order,payment_code,status,date_created) VALUES ('$_idpayment','$_id','$_codepayment','$status','$date')";
		$res = mysqli_query($conn, $sql2);
		$result = mysqli_query($conn,$sql);
		if ($result === true) {
			header('location: dashboard/payment.php?id='.$_idpayment.'&paymentUrl='.$_codepayment);
		}else{
			$message = "Gagal memasukan ke database";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	
	require 'pages/templates/header.php';
	require 'pages/navbar/navbar.php';
 ?>
<div class="wrapper">
	<div class="jumbotron text-center bg-warning header">
		<div class="text-white">
			<h4>Sistem pemesanan tiket kereta api</h4>
			<p>Untuk memenuhi tugas perkuliahan.</p>
		</div>
	</div>
	<div class="container">
		<div class="jumbotron box-search bg-light">
			<div class="col-sm-12  overflow-auto">
				<div class="container">
					<div class="col-lg-12">
						<h2>Order Now!</h2>
						<p>isi data anda dengan lengkap!</p>
					</div>
					<div class="dropdown-divider"></div>
					<form method="post" action="">
						<div class="col-sm-12">
							<div class="form-group">
								<label>NIK</label>
								<input type="text" class="form-control"  name="no_kk" placeholder="32xxxxxxxx" required="required">
							</div>
							<div class="form-group">
								<label >Nama</label>
								<input type="text" class="form-control"   name="nama"  placeholder="Nama" required="required">
							</div>
							<div class="form-group">
								<label >Usia</label>
								<input type="text" class="form-control" name="usia" placeholder="Usia" required="required">
							</div>
							<div class="form-group">
								<label >No HP</label>
								<input type="text" class="form-control" name="no_hp" placeholder="0812345xxx" required="required">
							</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="form-group">
										<label>Tanggal Order</label>
										<input type="date" class="form-control"  name="tgl_order" required="required">
									
										<label >Jumlah Penumpang</label>
										<input type="text" class="form-control" name="jml_penumpang" placeholder="1" required="required">
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-primary" name="btn-order" value="submit">
							<p>Lorem ipsum dolor sit amet <a href="index.php">Back</a></p>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
		
</div>

	
?>

<?php include 'pages/templates/footer.php';?>