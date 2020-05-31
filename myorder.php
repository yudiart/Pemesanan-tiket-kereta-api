<?php 
	require 'server/config.php';
	session_start();
	$id = $_SESSION['user_id'];
	require 'pages/templates/header.php';
	require 'pages/navbar/navbar.php';

	$sql = "SELECT t_order.*, jadwal.*, payment.id as paid, payment.id_order, payment.payment_code as pacod
			FROM t_order
	    	JOIN jadwal ON jadwal.id  = t_order.id_jadwal
	    	INNER JOIN payment ON payment.id_order = t_order.id
				  WHERE t_order.id_user= $id";
	$result = mysqli_query($conn,$sql);

 ?>

 
<div class="container mt-5">
	<div class="title">
		<h3>Order</h3>
	</div>
	<table class="table">
		<thead>
			<tr>
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">NIK</th>
			<th scope="col">Tgl Order</th>
			<th scope="col">Penumpang</th>
			<th scope="col">Asal</th>
			<th scope="col">Tujuan</th>
			<th>Harga</th>
			<th>total</th>
			<th>Bayar</th>
			</tr>
		</thead>
		<tbody class="body-payment">
			<?php 
				$i = 1;
				while($row = mysqli_fetch_array($result)){
					$harga = $row['harga'];
					$penumpang = $row['jml_penumpang'];
					$total_harga = $harga * $penumpang;
					$paid = $row['paid'];
					$pacod = $row['pacod'];
					
			 ?>
			<tr>
				
				<th scope="row"><?=$i++?></th>
				
				<td><?=$row['nama']?></td>
				<td><?=$row['no_kk']?></td>
				<td><?=$row['tgl_order']?></td>
				<td><?= $row['jml_penumpang']?></td>
				<td style="<?=$a;?>"><?=$row['asal']?></td>
				<td><?=$row['tujuan']?></td>
				<td><?=$harga;?></td>
				<td><?=$total_harga;?></td>
				<td>
					<a href="payment.php?id=<?=$paid;?>&paymentUrl=<?=$pacod;?>" class="btn btn-primary">Bayar</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	

