<?php
require '../server/config.php';
require 'pages/header.php';
 
	$id = $_GET['id'];
	$data = mysqli_query($conn,"select * from jadwal where id='$id'");
	while($d = mysqli_fetch_assoc($data)){?>
		<div class="box-admin">
			<div class="container">
				<div class="col-sm-12">
					<div class="row mt-4">
						<h4>Edit Jadwal</h4>
						
					</div>
				</div>
				<form method="POST" action="q_edit.php">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Asal</label>
							<input type="hidden" class="form-control" value="<?= $d['id'];?>" name="id">
							<input type="text" class="form-control" value="<?= $d['asal'];?>" name="asal">
						</div>
						<div class="form-group">
							<label >Tujuan</label>
							<input type="text" class="form-control"  value="<?= $d['tujuan'];?>" name="tujuan">
						</div>
						<div class="form-group">
							<label >Kelas</label>
							<input type="text" class="form-control" value="<?= $d['kelas'];?>" name="kelas">
						</div>
						<div class="form-group">
							<label >Harga</label>
							<input type="text" class="form-control" value="<?= $d['harga'];?>" name="harga">
						</div>
						<div class="col-sm-10">
							<div class="row">
								<div class="form-group">
									<label>Tanggal berangkat</label>
									<input type="date" class="form-control" value="<?= $d['tanggal'];?>" name="tanggal">
								</div>
								<div class="form-group ml-4">
									<label >Waktu Keberangkatan</label>
									<input type="time" class="form-control" value="<?= $d['waktu'];?>" name="waktu">
								</div>
							</div>
						</div>
						<input type="submit" class="btn btn-primary" name="btn-edit" value="submit">
						<p>Lorem ipsum dolor sit amet <a href="jadwal.php">Back</a></p>
					</div>
				</form>
			</div>
		</div>
	<?php }?>
 <?php require 'pages/templates/footer.php';?>
