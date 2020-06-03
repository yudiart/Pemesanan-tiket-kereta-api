<?php 
	include 'header.php';
	include 'sidebar.php';
	include 'navbar.php';
	$id = $_SESSION['user_id'];
	$level = $_SESSION['level'];

	if ($level !== 'user') {
		header('location: index.php');
	}
	$sql = "SELECT t_order.*, jadwal.*, payment.id as paid, payment.id_order, payment.payment_code as pacod
			FROM t_order
	    	JOIN jadwal ON jadwal.id  = t_order.id_jadwal
	    	INNER JOIN payment ON payment.id_order = t_order.id
				  WHERE t_order.id_user= $id";
	$result = mysqli_query($conn,$sql);
 ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>          
          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
            	<div class="col-sm-8">
	            	<div class="jumbotron bg-white">
	            		<div class="title mb-2">
	            			<div class="row">
							<h3>Order</h3>
							<a href="../index.php" class="btn btn-primary ml-2">Go Order</a>
	            			</div>
	            			
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
            	</div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->   
<?php include 'footer.php'; ?>