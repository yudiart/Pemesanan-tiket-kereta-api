<?php 
require '../server/config.php';
require 'header.php';
require 'sidebar.php';
require 'navbar.php';

 ?>
 
 	<div class="col-lg-8">
		<div class="col-sm-12">
			<div class="row mt-4">
				<h4>Tambah Jadwal</h4>
			</div>
		</div>
		<form method="POST" action="q_tambahjadwal.php">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Asal</label>
					<input type="text" class="form-control"  name="asal" placeholder="asal">
				</div>
				<div class="form-group">
					<label >Tujuan</label>
					<input type="text" class="form-control"   name="tujuan"  placeholder="tujuan">
				</div>
				<div class="form-group">
					<label >Kelas</label>
					<input type="text" class="form-control" name="kelas" placeholder="kelas">
				</div>
				<div class="form-group">
					<label >Harga</label>
					<input type="text" class="form-control" name="harga" placeholder="harga">
				</div>
				<div class="col-sm-10">
					<div class="row">
						<div class="form-group">
							<label>Tanggal berangkat</label>
							<input type="date" class="form-control"  name="tanggal">
						</div>
						<div class="form-group ml-4">
							<label >Waktu Keberangkatan</label>
							<input type="time" class="form-control" name="waktu">
						</div>
					</div>
				</div>
				<input type="submit" class="btn btn-primary" name="btn-tambah" value="submit">
				<p>Lorem ipsum dolor sit amet <a href="jadwal.php">Back</a></p>
			</div>
		</form>
	</div>
 
<?php require 'footer.php';?>