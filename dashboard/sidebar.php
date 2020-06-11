<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PT.KAI</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php 
        $level = $_SESSION['level'];
        if ($level !== 'admin') {?>
          <li class="nav-item">
            <a class="nav-link" href="order.php">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Order</span></a>
          </li>
       <?php }else{?>
          <li class="nav-item">
            <a class="nav-link" href="Kursi.php">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Kereta</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jadwal.php">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Tambah Jadwal</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="log_payment.php">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Log Payment</span></a>
          </li>
      <?php } ?>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="mdi mdi-logout"></i>
          <span>Logout</span></a>
      </li>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">