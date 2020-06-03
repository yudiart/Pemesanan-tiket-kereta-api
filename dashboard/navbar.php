<!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <?php 
              $level = $_SESSION['level'];
                  if ($level === 'user') {
               ?>
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-cart" style="width:30px; font-size: 20px;"></i>
                <!-- Counter - Alerts -->
                <?php 
                $id = $_SESSION['user_id'];
                  $query = mysqli_query($conn,"SELECT * FROM t_order where id_user=$id");
                  $c = mysqli_num_rows($query);
                 ?>
                <span class="badge badge-danger badge-counter"><?php
                  if ($c) {
                    echo '+'.$c;
                    }else{
                      $c = '';
                    }
                ?></span>
              </a>
              <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Alerts Center
                  </h6>
                  <?php 
                        $sql =  mysqli_query($conn,"SELECT t_order.*, jadwal.*, payment.id as paid, payment.id_order, payment.payment_code as pacod
                                   FROM t_order
                                   JOIN jadwal ON jadwal.id  = t_order.id_jadwal
                                   INNER JOIN payment ON payment.id_order = t_order.id
                                   WHERE t_order.id_user= $id");
                  while($row = mysqli_fetch_array($sql)){ 
                      // var_dump($row);
                      $harga = $row['harga'];
                      $penumpang = $row['jml_penumpang'];
                      $total_harga = $harga * $penumpang;
                      $paid = $row['paid'];
                      $pacod = $row['pacod'];
                    ?>

                  <a class="dropdown-item d-flex align-items-center" href="payment.php?id=<?=$paid;?>&paymentUrl=<?=$pacod;?>">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">Order <?= date('j F Y',strtotime($row['tgl_order']));?></div>
                      <span class="font-weight-bold">Asal <?= $row['asal'];?> -> <?= $row['tujuan'];?></span><br/>
                      <span>Kelas <?=$row['kelas']?></span>
                      <p class="text-warning">Rp.<?= $row['harga'];?></p>
                    </div>
                  </a>
                <?php } ?>
                </div>
            </li>
            <?php }else{} ?>

           

            <div class="topbar-divider d-none d-sm-block"></div>
              <?php
                  $id = $_SESSION['user_id'];  
                  $q = mysqli_query($conn,"SELECT * from users where id_user=$id");
                    while($r = mysqli_fetch_array($q)){
               ?>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $r['email'];?></span>
                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>
                <?php } ?>
          </ul>

        </nav>
        <!-- End of Topbar -->