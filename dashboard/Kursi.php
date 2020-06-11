
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

$sql = "SELECT jadwal.asal,jadwal.tujuan,
               jadwal.id as j_id,
                k_tujuan.*
      FROM  k_tujuan
        JOIN jadwal ON jadwal.id  = k_tujuan.id_jadwal ";
 // $sql = "SELECT * FROM k_tujuan";
 $res = mysqli_query($conn,$sql);
 
?>
<div class="container-fluid">       
  <div class="col-sm-12">
    <div class="row mt-4">
      <h1>Kursi</h1>
    </div>
  </div>
  <div class="col-lg-9 bg-white mt-4" style="border-radius:10px;">
      <table class="table">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Asal</th>
                  <th>Tujuan</th>
                  <th>Jumlah Penumpang</th>
                  <th>Limit Penumpang</th>
                  <th>Sisa Kursi</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $i = 1;
              while ($data = mysqli_fetch_array($res)) {
            ?>
                  <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $data['asal']; ?></td>
                      <td><?= $data['tujuan']; ?></td>                      
                      <td><?= $data['jml_penumpang']; ?></td>
                      <td><?= $data['limit_penumpang']; ?></td>
                      <td><?= $data['limit_penumpang'] - $data['jml_penumpang']; ?></td>
                  </tr>
              <?php }
              ?>
          </tbody>
      </table>
    </div>  
  </div>
<?php require 'footer.php';?>
