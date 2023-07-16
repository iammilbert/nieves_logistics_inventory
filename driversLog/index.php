<?php  
include('expiredSession.php');
?> 
      

<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav bold">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
<?php include 'singnout_edit_profile.php'; ?>

  </nav>
  <!-- /.navbar -->
<?php 

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

 <span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row["name"];?></span></b>
        </span>
    </a>

     <!-- Sidebar -->
     <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>                 

         

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                REPORT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="bol_form.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Register RC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="registered_RC.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>ALL RC </p>
                </a>
              </li>

                <li class="nav-item">
                <a href="registered_vehicles.php" class="nav-link">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Registered vehicles</p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="registered_drivers.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Registered Drivers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="registered_Expenditures.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Expenditures</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="driversTicketForm.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Upload Ticket</p>
                </a>
              </li>
              
                 <li class="nav-item">
                <a href="registered_Tickets.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Tickets Available</p>
                </a>
              </li>


            </ul>
          </li>
          <hr>
                 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<?php 
       $sql_pay = "SELECT SUM(loads.netPay) AS sum, SUM(loads.rate) AS sum2 FROM loads 
       INNER JOIN loads_assigned 
       ON loads_assigned.load_id = loads.id";
       $query_pay = mysqli_query($conn, $sql_pay);
       $row_pay = mysqli_fetch_assoc($query_pay);  
?>
<?php 
       $sql1 = "SELECT SUM(staff_salaries.amount) AS sum FROM staff_salaries"; 
       $query1 = mysqli_query($conn, $sql1);
       $row1 = mysqli_fetch_assoc($query1);  
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<p></p>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid  card card-primary card-outline">
        <!-- Small boxes (Stat box) -->
        <div class="row"> <!-- Start row -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <label >TRAILER</label><br>
               <?php 
                   $sql = "SELECT COUNT(users.id) AS sum FROM users"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><?php echo  $id_row['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-wheelchair"></i></span>

              <div class="info-box-content">
               <label class="info-box-text">DRIVERS</label>
                <?php 
                   $sql = "SELECT COUNT(users.id) AS sum FROM users WHERE role = 'Driver'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><?php echo  $id_row['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check"></i></span>

              <div class="info-box-content">
                <label class="info-box-text">TRUCKS</label>
                <?php 
                $Truck = "Truck";
                   $sql = "SELECT COUNT(vehicles.id) AS sum FROM vehicles WHERE vehicleType =  '".$Truck."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row2 = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><?php echo  $id_row2['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

               <div class="info-box-content">
                <label class="info-box-text">EXPENSES</label>
                <?php 
                   $sql_staff = "SELECT COUNT(users.id) AS sum_ FROM users WHERE role = ''"; 
                   $query_staff = mysqli_query($conn, $sql_staff) or die(mysqli_error($conn));
                ?>
                   <?php while ($staff_row = mysqli_fetch_assoc($query_staff)): ?> 
                <span class="start_count text-danger tahoma"><?php echo  $staff_row['sum_']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->
        
        
        
              
 <div class="row"> <!-- Start row -->
        <div class="col-md-3">
  
            <!-- /.info-box -->
        </div>
          <!-- /.col -->

<p></p>
          <div class="col-12 col-sm-6 col-md-6 text-center mt-10">
             
              <!-- /.info-box-content -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
  
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->  
        
    <div class="row"> <!-- Start row -->
            <div class="col-md-3">

              <p></p>
              <!-- /.info-box-content -->
            </div>
            
            <div class="col-md-3">
               <a href="driversTicketForm.php" class="btn btn-success">
                 <h5 class="info-box-text text-white">TICKETS <i class="fa fa-upload"></i></h5>  
               </a>
              <p></p>
              <!-- /.info-box-content -->
            </div>


          <div class="col-md-3">
               <a href="bol_form.php" class="btn btn-primary">
                 <h5 class="info-box-text text-white">DRIVERS LOG <i class="fa fa-upload"></i></h5>  

              </a>
              <p></p>
              <!-- /.info-box-content -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-md-3">
  
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('../footer.php'); ?>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function () {
    $("#NextLoad2").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
