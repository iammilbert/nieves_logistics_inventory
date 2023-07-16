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
            <a class="dropdown-item" href="load.php">Register/Assigned Load</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_load.php">Load Assigned</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="active_drivers.php">Active Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
          </div>
        </div>


       <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkVehicles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            VEHICLES
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkVehicles">
            <a class="dropdown-item" href="vehicles.php">Register Vehicle</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_vehicle.php">Assigned Vehicle</a>
            <div class="dropdown-divider"></div>
          </div>
        </div>

        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLinkUsers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            COMPANY/USERS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkUsers">
            <a class="dropdown-item" href="register_user.php">Register Staff/Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="company_info.php">Company Info</a>

          </div>
        </div>


        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLinkReport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            REPORT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkReport">
            <a class="dropdown-item" href="registered_staff.php">Registered Staff</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_drivers.php">Registered Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_vehicles.php">Registered Vehicles</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_Load.php"> Registered Loads</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_Shippers.php">Registered Shippers</a>
            <div class="dropdown-divider"></div>
            <!--<a class="dropdown-item" href="registered_Admin.php">Registered Admin</a>-->
            <!--<div class="dropdown-divider"></div>-->
            <a class="dropdown-item" href="registered_Expenditures.php">Expenditures</a>
            <div class="dropdown-divider"></div>
            <!--<a class="dropdown-item" href="vehicle_income.php">Vehicles Income</a>-->
            <!--<div class="dropdown-divider"></div>-->
            <!--<a class="dropdown-item" href="income_Generated.php">Company Income Generated</a>-->
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
                PICKUPS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="load.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Register/Assigned Load</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assigned_load.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Load Assigned</p>
                </a>
              </li>
  
               <li class="nav-item">
                <a href="active_drivers.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Active Drivers</p>
                </a>
              </li>  
       
            <li class="nav-item">
                <a href="load_delivered.php" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Pickups Delivered</p>
                </a>
              </li>
            </ul>
          </li>



         <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                VEHICLES
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">         
              <li class="nav-item">
                <a href="vehicles.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Register vehicle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assigned_vehicle.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Vehicles Assigned</p>
                </a>
              </li>  
            </ul>
          </li>

   <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                COMPANY/USERS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="register_user.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Register Staff/Drivers</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="registered_users.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Registered Users</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="company_info.php" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Company Info.</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="inbox.php" class="nav-link">
                  <i class="fa fa-sms nav-icon"></i>
                  <p>Message Inbox</p>
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
                <a href="registered_staff.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="registered_drivers.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Drivers</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="registered_vehicles.php" class="nav-link">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Registered vehicles</p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="registered_Load.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Registered Loads</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="registered_Shippers.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Shippers</p>
                </a>
              <li class="nav-item">
                <a href="registered_Expenditures.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Expenditures</p>
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
                <label class="info-box-text">NEW STAFF</label>
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
          <div class="clearfix hidden-md-up"></div>

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
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

             <div class="info-box-content">
                <label class="info-box-text">TRACTORS</label>
                <?php 
                   $Tractor = "Tractor";
                   $sqltk = "SELECT COUNT(vehicles.id) AS sum FROM vehicles WHERE vehicleType = '".$Tractor."'"; 
                   $querytk = mysqli_query($conn, $sqltk) or die(mysqli_error($conn));
                ?>
                   <?php while ($rowtk = mysqli_fetch_assoc($querytk)): ?> 
                <span class="start_count"><?php echo  $rowtk['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->


  
         <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title bold">DRIVERS ON TRIP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table" style="font-size:13px;">
                  <thead>
                   <tr>
                    <th>RATE CON.</th>
                    <th>DRIVER NAME</th>
                    <th>DRIVER EMAIL</th>
                    <th>PHONE</th>
                    <th>STATUS</th>
                    <th>PICKUP DATE/TIME</th>


                  </tr>
                  </thead>
                  <tbody>
                <?php 
                  $sql = "SELECT loads.id, users.name, users.tel, loads.rateConfirmationID, users.licenseID, loads.totalLoadDropped, loads.totalLoadPicked, loads.pickedup_Date, loads.pickedupTime, loads.totalPickups, loads.totalDrops, loads.status, loads.id AS load_id, users.email FROM loads 
                  INNER JOIN users
                  ON loads.driver_id = users.id 
                  WHERE loads.totalPickups > 0 AND loads.totalDrops > loads.totalLoadDropped";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                      ?>
                      <tr>
                          <td><?php echo $row['rateConfirmationID']; ?></td>
                         <td><?php echo $row['name']; ?></td>
                         <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                         <td><a href="tel:<?php echo $row['tel']; ?>"><?php echo $row['tel']; ?></a></td>
    
                  <td><?php 
                      if($row["totalLoadDropped"] == 0 && $row["totalLoadPicked"] == 0)
                        echo "<small class='badge badge-primary'>Waiting for Pickup</small>";
                         elseif($row["totalLoadPicked"] > 0 && $row["totalPickups"] > $row["totalLoadPicked"])
                        echo "<small class='badge badge-info'>Driving</small>";
                       elseif($row["totalPickups"] > $row["totalLoadPicked"] && $row["totalLoadPicked"] != 0 || $row["totalDrops"] > $row["totalLoadDropped"] && $row["totalLoadDropped"] != 0)
                        echo "<small class='badge badge-primary'>Driving</small>";
                        elseif($row["totalLoadDropped"] == $row["totalDrops"] && $row["totalLoadPicked"] == $row["totalPickups"])  
                         echo "<small class='badge badge-success'>Delivered</small> ";
                        elseif($row["status"] == 4) 
                        echo "<small class='badge badge-warning'>Load Cancelled</small>";
                        elseif($row["status"] == 5) 
                        echo "<small class='badge badge-danger'>Not Delivered</small>";
                        elseif($row["status"] == 0) 
                        echo "<small class='badge badge-warning'>Pending</small>";
                      ?></td>

                         <td><?php echo $row['pickedup_Date']; ?> <?php $date = $row['pickedupTime']; 
                         $picked_Time = date('h:i:sa', strtotime($date)); 
                         echo $picked_Time; ?></td>
                      </tr>

                    <?php                       
              
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
