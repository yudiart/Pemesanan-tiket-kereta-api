<?php 
	require 'header.php';

	$_id = $_GET['id'];
	$_payment_code = $_GET['paymentUrl'];
	$level = $_SESSION['level'];
	if ($level !== 'user') {
		header('location: index.php');
	}
	
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

	include 'sidebar.php';
    include 'navbar.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Payment</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>          
          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
            	<div class="col-sm-8">
	            	<div class="jumbotron bg-white">
	            		<div class="jumbotron-fluid mt-5">
							<div class="title">
								<div class="col-sm-12">		
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
								</div>
								<div class="col-sm-12">
									<a href="order.php" class="btn btn-primary">Back</a>
								</div>
							</div>
						</div>
	            	</div>		
            	</div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->      <!-- End of Main Content -->

     
<?php }?>
<?php include 'footer.php'; ?>


