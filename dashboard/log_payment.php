<?php 
	include 'header.php';
  $id = $_SESSION['user_id'];
  $level = $_SESSION['level'];
  if ($level !== 'admin') {
    header('location: 403.php');
  }
  include 'sidebar.php';
  include 'navbar.php'; 

  $data = mysqli_query($conn,"SELECT * FROM payment where status='sudah'");
 ?>
  <div class="col-lg-8">
      <div class="jumbotron bg-white" style="border-radius:10px;">
        <div class="title">
          <h3>Log Payment</h3>
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
                    <a href='payment.php?id=<?=$row['id']?>&order=<?=$row['id_order']?>' class="btn btn-warning text-white" name="btn-validasi">Validasi</a>
                  <?php }?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        
      </div>
    </div>
    
  </div>
<?php 


include 'footer.php'; ?>