
<?php 
	include 'header.php';
	$id = $_SESSION['user_id'];
	$level = $_SESSION['level'];
	if ($level !== 'admin') {
		header('location: index.php');
	}
  	include 'sidebar.php';
  	include 'navbar.php'; 


if (!isset($_SESSION['status'])) {
	header('Location: ../error.php');
}else if($_SESSION['level'] !== 'admin'){
	header('Location: ../error.php');
}else{

}

if (isset($_POST['cari'])) {
        $cari = $_POST['keyword'];
        $QueryString = "SELECT jadwal.kode, jadwal.asal, jadwal.tujuan, jadwal.kelas, jadwal.harga, jadwal.tanggal, jadwal.waktu FROM jadwal WHERE
    	jadwal.kode LIKE '%$cari%' or jadwal.asal LIKE '%$cari%' or jadwal.tujuan LIKE '%$cari%' or jadwal.kelas LIKE '%$cari%' or jadwal.harga LIKE '%$cari%' or jadwal.tanggal LIKE '%$cari%' or jadwal.waktu LIKE '%$cari%'";
        $SQL = mysqli_query($conn, $QueryString);
    } else {
        $SQL = mysqli_query($conn, "select * from jadwal");
    }


?>
<div class="container-fluid">				
	<div class="col-sm-12">
		<div class="row mt-4">
			<h1>Jadwal Kereta Api</h1>
			<p class="mt-2 ml-3"><a href="tambahjadwal.php" class="btn btn-primary">tambah data</a></p>	
		</div>
	</div>
	<div class="col-lg-9 bg-white mt-4" style="border-radius:10px;">
	    <table class="table">
	        <thead>
	            <tr>
	                <th>No</th>
	                <th>asal</th>
	                <th>Tujuan</th>
	                <th>Kelas</th>
	                <th>Harga</th>
	                <th>Tanggal Berangkat</th>
	                <th>Waktu Keberangkatan</th>
	                
	                <th colspan="2">Action</th>
	  
	            </tr>
	        </thead>
	        <tbody>
	            <?php
	            $i = 1;
	            while ($data = mysqli_fetch_array($SQL) and extract($data)) {
	            		$jam = substr($waktu,0,2);
						$time = (int)$jam;
						if ($time > 12) {
							$date = ' PM';
						}else if($time <12){
							$date = ' AM';
						}else{}
    				?>
	                <tr>
	                    <td><?= $i++ ?></td>
	                    <td><?= $asal ?></td>
	                    <td><?= $tujuan ?></td>
	                    <td><?= $kelas ?></td>
	                    <td><?= $harga ?></td>
	                    <td><?= $tanggal ?></td>
	                    <td><?= $waktu.$date; ?></td>
                		<td><a href='edit.php?id=<?= $id?>' class="btn btn-warning">Edit</a></td>
                		<td><a href='delete.php?id=<?= $id?>' class="btn btn-danger">Delete</a></td>			                    
	                </tr>
	            <?php }
	            ?>
	        </tbody>
    	</table>
		</div>	
	</div>



<?php require 'footer.php';?>
