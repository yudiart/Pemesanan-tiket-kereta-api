<?php 
	include 'header.php';
  include 'sidebar.php';
  include 'navbar.php'; 
 ?>
 <?php if ($_SESSION['level'] === 'user') { ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>          
    <div class="row">
      <div class="col-lg-12 mb-4">
  		<?php 	
		$query = mysqli_query($conn,"SELECT * FROM users where id_user=$id");
		while($row = mysqli_fetch_array($query)){
      	 ?>

        <div class="col-md-4">
          <div class="card ">
	    	    <div class="card-title">
	    		    <div class="col-lg-12 text-left pt-4">
	    			    <h4>Account</h4>	
	    		    </div>				    		
	    	    </div>
	    	    <div class="dropdown-divider"></div>
    	      <div class="card-body">
	            <h2><?= $row['email'];?></h2>
	            <p>Level : <?=$row['level'];?> | Created : <?= date('j F Y',strtotime($row['date_created']));?></p>
	          </div>
          </div>
        </div>
      	<?php } ?>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
<?php 
  }else{
$data = mysqli_query($conn,'SELECT * FROM payment where status="belum"');
$data2 = mysqli_query($conn,'SELECT * FROM payment where status="sudah"');
$num = mysqli_num_rows($data2);
?>
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div> 
    <div class="col-lg-12 mb-4">
      <div class="row">
      <?php   
        $query = mysqli_query($conn,"SELECT * FROM users where id_user=$id");
        while($row = mysqli_fetch_array($query)){
      ?>

        <div class="col-md-4">
          <div class="card ">
            <div class="card-title">
              <div class="col-lg-12 text-left pt-4">
                <h4>Account</h4>  
              </div>                
            </div>
            <div class="dropdown-divider"></div>
            <div class="card-body">
              <h2><?= $row['email'];?></h2>
              <p>Level : <?=$row['level'];?> | Created : <?= date('j F Y',strtotime($row['date_created']));?></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-title">
              <div class="col-lg-12 text-left pt-4">
                <h4>Total Payment Success</h4>  
              </div>                
            </div>
            <div class="dropdown-divider"></div>
            <div class="card-body">
              <h2><?= $num;?></h2>
              <p class="">Successed</p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

    </div>
    <div class="col-lg-8">
      <div class="jumbotron bg-white" style="border-radius:10px;">
        <div class="title">
          <h3>Validasi Order</h3>
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
                while($row = mysqli_fetch_array($data)){
                  if ($row['status'] === 'belum') {
                    $a = 'btn btn-danger';
                  }else{
                    $a = 'btn btn-success';
                  }
               ?>
              <tr>            
                <th scope="row"><?=$i++?></th>
                <td><?=$row['id']?></td>
                <td><?= $row['payment_code']?></td>
                <td >
                  <?php if ($row['status'] === 'belum'){ ?>
                    <label class="<?=$a;?>"><?=$row['status']?></label>
                  <?php }else{ ?>
                    <label class="<?=$a;?>"><?=$row['status']?></label>
                  <?php } ?>
                </td>
                <td><?=$row['date_created']?></td>
                <td>
                  <?php if ($row['status'] === 'belum'){ ?>
                    <a href='validasi_payment.php?id=<?=$row['id']?>&order=<?=$row['id_order']?>' class="btn btn-warning text-white" name="btn-validasi">Validasi</a>
                  <?php }?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        
      </div>
    </div>
    
  </div>
</div>   
<?php } ?>
<?php include 'footer.php'; ?>