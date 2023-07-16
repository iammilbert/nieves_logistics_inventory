<?php 
include 'expiredSession.php';
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

      <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PICKUPS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicle_workload.php">Vehicles Workload</a>
          </div>
        </div>

           <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkPayout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PAY-OUT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkPayout">
            <a class="dropdown-item" href="due_payment.php">Due Payment</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="payrollPaid.php">Successful Payment</a>
          </div>
        </div>

        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLinkReport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            REPORT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkReport">
            <a class="dropdown-item" href="registered_Expenditures.php">Expenditures</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="payout_report.php">Payout</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicle_income.php">Vehicles Income</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="income_Generated.php">Company Income Generated</a>
          </div>
        </div>
      
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

      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row["name"]; ?></b>
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
                <a href="load_delivered.php" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Loads Delivered</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="vehicle_workload.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Vehicles Workload</p>
                </a>
              </li>  



           <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                PAYMENT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="due_payment.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Due Payment</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="payrollPaid.php" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Successful Payment</p>
                </a>
              </li>


               <li class="nav-item">
                <a href="paid_pickups.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Paid Loads</p>
                </a>
              </li>
            </ul>
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
                <a href="registered_Expenditures.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Expenditures</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="payout_report.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Pay-Out</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="vehicle_income.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Vehicles Income Generated</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="income_Generated.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Company Income Generated</p>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>

              <div class="info-box-content">
                <label class="info-box-text" style="font-size:15px;">VEHICLES INCOME</label>
               <?php 
                   $sql = "SELECT SUM(loads.netPay) AS sum, SUM(loads.rate) AS sum2 FROM loads WHERE loads.totalDrops = loads.totalLoadDropped AND loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops != 0 AND loads.totalPickups != 0"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                <span class="text-danger"><?php $final2 = $id_row["sum2"] - $id_row["sum"]; echo number_format($final2, 2, '.', ','); ?> <b class="text-green bold">USD</b></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <label class="info-box-text" >INCOME</label>

                <span class="text-primary"><?php $earns = $row_pay["sum2"] - $row_pay["sum"]; 
                        $final = $earns - $row1["sum"]; echo number_format($final, 2, '.', ','); ?> <b style="color:green; font-weight: bolder;">USD</b>

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

 <?php 
  $sql_sum = "SELECT SUM(staff_salaries.amount) AS sum_Staff FROM staff_salaries"; 
   $query_sum = mysqli_query($conn, $sql_sum) or die(mysqli_error($conn));
   $sum_row = mysqli_fetch_assoc($query_sum);
?>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <label class="info-box-text"> STAFF PAYOUT</label>                 
                <span class="text-green"> NGN <?php echo number_format($sum_row["sum_Staff"], 2, '.', ',');
                ?></span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /. end row -->
        
        
        
         <div class="row"> <!-- Start row -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <label >EMPLOYEES</label><br>
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
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-check"></i></span>

            <div class="info-box-content">
                <label class="info-box-text">TRAILERS</label>
                <?php 
                $Trailer = "Trailer";
                   $sqlt = "SELECT COUNT(vehicles.id) AS sum FROM vehicles WHERE vehicleType = '".$Trailer."'"; 
                   $queryt = mysqli_query($conn, $sqlt) or die(mysqli_error($conn));
                ?>
                   <?php while ($rowt = mysqli_fetch_assoc($queryt)): ?> 
                <span class="start_count"><?php echo  $rowt['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
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
        </div>
        <!-- /. end row -->



         <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title bold text-danger">DRIVERS DUE FOR PAYMENT</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table font-size-13">
                  <thead>
                     <tr>
                    <th>DRIVER'S ID</th>
                    <th>DRIVER'S NAME</th>
                     <th></th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                  $sql = "SELECT distinct loads.driver_id, users.name, users.id from loads 
                    INNER JOIN users 
                    ON loads.driver_id = users.id WHERE loads.payrollStatus = 1 AND loads.paymentStatus = 0";
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $row["driver_id"]; ?></td>
                    <td><small class="badge badge-info"><?php echo $row['name']?></small></td>
                    <td> 
                      <a href="due_payment.php" class="btn btn-primary btn-sm">Pay Driver</a>
                    </td>

                  </tr>

                  <?php 
                  include 'date_range_report.php';

                }
                ?>                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

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
