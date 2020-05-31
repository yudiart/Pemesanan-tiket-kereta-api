<?php 
	require 'server/config.php';
	require 'pages/templates/header.php';

	$_id = $_GET['id'];
	$_payment_code = $_GET['paymentUrl'];
	
	$sql = "SELECT payment.*, t_order.*, jadwal.*
			FROM  t_order
	    	JOIN payment ON payment.id_order  = t_order.id 
			JOIN jadwal ON jadwal.id  = t_order.id_jadwal
		    WHERE payment.id='$_id'";
	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_array($result)){
		$harga = $row['harga'];
		$penumpang = $row['jml_penumpang'];
		$total_harga = $harga * $penumpang;

	
 ?>


<div class="container">
	<div class="jumbotron-fluid mt-5">
		<div class="title text-center">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<h1 class="mb-5">Payment</h1>
						<table class="table table-bordered">
						  
						  <tbody class="text-left">
						  	<tr>
						      <th scope="row">Kode Pembayaran</th>
						      <td><?= $_payment_code;?></td>
						    </tr>
						    <tr>
						      <th scope="row">Harga</th>
						      <td><?=$row['harga']?></td>
						    </tr>
						    <tr>
						      <th scope="row">Jumlah Penumpang</th>
						      <td><?=$row['jml_penumpang'];?></td>
						    </tr>
						    <tr>
						        <td>
							      	<h3>Total</h3>
					  	    	</td>
						      <td><h3><?= $total_harga;?></h3></td>
						    </tr>
						  </tbody>
						</table>
						<a href="myorder.php" class="btn btn-primary">Back</a>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div><?php }?>

