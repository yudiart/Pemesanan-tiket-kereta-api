<?php 
require '../server/config.php';
require 'pages/header.php';


if (!isset($_SESSION['status'])) {
	header('Location: ../error.php');
}else if($_SESSION['level'] !== 'admin'){
	header('Location: ../error.php');
}else{

}

$data1 = mysqli_query($conn,'SELECT * FROM jadwal');
$data2 = mysqli_query($conn,'SELECT * FROM payment');
$data3 = mysqli_query($conn,'SELECT * FROM order');
?>

<div class="box-admin">
	<div class="container">
		<div class="title mt-5">
			<h1>Payment</h1>
		</div>
		
		<div class="table-payment">
			<table class="table">
				<thead>
					<tr>
					<th scope="col">No</th>
					<th scope="col">ID</th>
					<th scope="col">Payment Code</th>
					<th scope="col">Status</th>
					<th scope="col">Date</th>
					<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody class="body-payment">
					<?php 
						$i = 1;
						while($row = mysqli_fetch_array($data2)){
							if ($row['status'] === 'belum') {
								$a = 'color:red;';
							}else{
								$a = 'color:green;';
							}
					 ?>
					<tr>
						
						<th scope="row"><?=$i++?></th>
						<td><?=$row['id']?></td>
						<td><?= $row['payment_code']?></td>
						<td style="<?=$a;?>"><?=$row['status']?></td>
						<td><?=$row['date_created']?></td>
						<td>
							<?php if ($row['status'] === 'belum'): ?>
								<a href='payment.php?id=<?=$row['id']?>&order=<?=$row['id_order']?>' class="btn btn-success" name="btn-validasi">Validasi</a>
							<?php endif ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php require 'pages/templates/footer.php';?>
