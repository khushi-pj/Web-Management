

<style>
  .dropdown-container {
        display: none;
        background-color: #343a40;
        padding-left: 8px;
      }
  </style>
<?php include("header.php");?> 
<!-- Main sidebar container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Web Management</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username'];?> </a>
        </div>
      </div>
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">            
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
    </div>

      <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          
          </a>
        </li>
  
        <button class="dropdown-btn nav-item ">Services 
    <i class="fa fa-caret-down"></i>
  </button>

  <div class="dropdown-container">
    <ul style="list-style-type:none">
    <li><a  class="dropdown" href="all_service.php">All Services</a></li>
    <li><a  class="dropdown" href="add_service.php">Add New Service</a></li>
    </ul>
    
  </div>

  <button class="dropdown-btn nav-item ">Assign  
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <ul style="list-style-type:none">
    <li><a class="dropdown" href="all_assign_service.php">All Assigned Services</a></li>
    <li><a class="dropdown" href="assign_service.php">Assign New Service</a></li>
    </ul> 
  </div>
   
 
  <li class="nav-item">
          <a href="add_user.php" class="nav-link">
            <p>
              Add User
            </p>
          </a>
        </li>
      </ul>
    </nav>
      <!--/.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div> <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                 <!-- "SELECT COUNT(*) AS total FROM add_service_name"; -->
               
              <?php
              $selectquery = "SELECT * FROM add_service_name";
              $query =   mysqli_query($conn, $selectquery);
              $numrows = mysqli_num_rows($query);
                  ?>
                  <h3><?php echo $numrows; ?></h3>
                <p>Services</p>
              </div> 
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="all_service.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $today= date('Y-m-d');
                $NewDate=Date('Y-m-d', strtotime('+15 days'));
                
              $selectquery = "select * from assign_service where date_of_renewal between '$today' and '$NewDate'";
              $query =   mysqli_query($conn, $selectquery);
              $numrows = mysqli_num_rows($query);
              ?>
                <h3><?php echo $numrows; ?></h3>
                <p>Up coming renewals</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#reminder" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->               
          <div class="col-lg-3 col-6">               
            <!-- small box -->               
            <div class="small-box bg-danger">               
              <div class="inner">  
              <?php
              $today= date('Y-m-d'); 
              $selectquery = "select * from assign_service where date_of_renewal < '$today' ";
              $query =   mysqli_query($conn, $selectquery);
              $numrows = mysqli_num_rows($query);
              ?>             
                <h3><?php echo $numrows; ?></h3>               
                <p>Domains Expired</p>               
              </div>               
              <div class="icon">               
                <i class="ion ion-pie-graph"></i>               
              </div>               
                             
              <a href="#domain_expired" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
              $selectquery = "SELECT * FROM assign_service";
              $query =   mysqli_query($conn, $selectquery);
              $numrows = mysqli_num_rows($query);
                  ?>
                <h3><?php echo $numrows;?></h3>
                <p>Websites</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="all_assign_service.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
           

          <!-- /.col -->
        </div>

        <!-- /.row -->
        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            
              <div class="card-body" id="reminder">
              <h3>Reminder for Renewal</h3>
                <table id="example2" class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Website Name</th>
                    <th>Website URL</th>
                    <th>Assigned Service</th>
                    <th>Registrar</th>
                    <th>Date of Registration</th>
                    <th>Date of Renewal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $today= date('Y-m-d');
                    $NewDate=Date('Y-m-d', strtotime('+15 days'));

                  ?>

                  <?php
                  $selectquery = "select * from assign_service where date_of_renewal between '$today' and '$NewDate'";
                  
                  $query = mysqli_query($conn, $selectquery);
                  $nums = mysqli_num_rows($query);
                  $x=0;
                  while($res = mysqli_fetch_array($query)){ 
                    $x++;
                    ?>
                    <tr>
                    <td><?php echo $x;?>.</td>
                    <td><?php echo $res['website_name'];?></td>
                    <td><?php echo $res['website_url'];?></td>
                    <td><?php echo $res['assign_service'];?></td>
                    <td><?php echo $res['registrar'];?></td>
                    <td><?php $str = strtotime($res['date_of_registration']); echo date('d-m-Y',$str);?></td>
                    <td><?php $str = strtotime($res['date_of_renewal']); echo date('d-m-Y',$str);?></td>
                    <?php } ?>

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
                  </div>


                  <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            
              <div class="card-body" id="domain_expired">
              <h3>Domain Expired</h3>
                <table id="example2" class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Website Name</th>
                    <th>Website URL</th>
                    <th>Assigned Service</th>
                    <th>Registrar</th>
                    <th>Date of Registration</th>
                    <th>Date of Renewal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $today= date('Y-m-d');
                    $NewDate=Date('Y-m-d', strtotime('+15 days'));

                  ?>

                  <?php
                  $selectquery = "select * from assign_service where date_of_renewal < '$today' ";                  
                  $query = mysqli_query($conn, $selectquery);
                  $nums = mysqli_num_rows($query);
                  $x=0;
                  while($res = mysqli_fetch_array($query)){ 
                    $x++;
                    ?>
                    <tr>
                    <td><?php echo $x;?>.</td>
                    <td><?php echo $res['website_name'];?></td>
                    <td><?php echo $res['website_url'];?></td>
                    <td><?php echo $res['assign_service'];?></td>
                    <td><?php echo $res['registrar'];?></td>
                    <td><?php $str = strtotime($res['date_of_registration']); echo date('d-m-Y',$str);?></td>
                    <td><?php $str = strtotime($res['date_of_renewal']); echo date('d-m-Y',$str);?></td>
                    <?php } ?>
      
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
                  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->                     
 <?php include("footer.php")?>
 
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


