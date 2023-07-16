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
    <ul class="navbar-nav" style="font-weight:bolder;">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PICKUPS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item active" href="load.php">Register/Assigned Load</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_load.php">Load Assigned</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="active_drivers.php">Active Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
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
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkVehicles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            VEHICLES
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkVehicles">
            <a class="dropdown-item" href="vehicles.php">Register Vehicle</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_vehicle.php">Assigned Vehicle</a>
            <div class="dropdown-divider"></div>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicle_workload.php">Vehicles Workload</a>
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
            <a class="dropdown-item" href="registered_Admin.php">Registered Admin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_Expenditures.php">Expenditures</a>
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

<span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row["name"];?></span></b>
        </span>
    </a>

     <!-- Sidebar -->
     <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>                 

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p style="font: size 17px; font-weight: bolder;">
                PICKUPS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="load.php" class="nav-link active">
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
              <p style="font-size:17px; font-weight: bolder;">
                PAY-OUT
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
            </ul>
          </li>


         <li class="nav-item">
            <a href="#" class="nav-link">
              <p style="font-size:17px; font-weight: bolder;">
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

                <li class="nav-item">
                <a href="vehicle_workload.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Vehicles Workload</p>
                </a>
              </li>              
            </ul>
          </li>


                 <li class="nav-item">
            <a href="#" class="nav-link">
              <p style="font-size:17px; font-weight: bolder;">
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
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p style="font-size:17px; font-weight: bolder;">
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
              </li>
                 <li class="nav-item">
                <a href="registered_Admin.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Admin</p>
                </a>
              </li>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <p>

    </p>
    <!-- /.content-header -->
  
<?php 
$total = "";
 $id = isset($_GET['id']) ? $_GET['id'] : '';

 $sql = "SELECT * FROM loads WHERE id = '".$id."'"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
?>

<?php

   $sql2 = "SELECT loads_assigned.driver_id, loads.shipperName, loads_assigned.id, loads_assigned.load_id, loads.shipperTel, loads.shipperEmail, loads.shipperAddress, loads.rateConfirmationID, users.name, loads_assigned.status, users.licenseID, users.id AS driverID, users.email, users.address, users.tel, loads.rate FROM loads_assigned 
   INNER JOIN users
   ON loads_assigned.driver_id = users.id 
   INNER JOIN loads 
   ON loads_assigned.load_id = loads.id 
   WHERE loads_assigned.load_id = '".$id."' "; 
   $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
   $row2 = mysqli_fetch_assoc($query2); 

   ?>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card">
          
                <div class="card-body">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                           src="../dist/img/LGTILOGO.PNG"
                           alt="LGTI LOGO" style="width:140px;">
                    </div>


                  <div class="text-center">
                    <h3 style="font-weight:bolder; font-size:25px; color:rgb(15, 29, 123); letter-spacing:5px;">LGTI LOGITICS LIMITED</h3>                        
                  </div>

                  <div class="text-center">
                   <span><?php echo $row["shipperAddress"]; ?> </span>
                       
                  </div>

                  <div class="row">
                    <div class="col-md-4 text-center">
                       <span><b>Email</b>: <?php echo $row["shipperEmail"]; ?></span><br> 
                    <span><b>Phone</b>:<?php echo $row["shipperTel"]; ?></span> 
                    </div>
                    <div class="col-md-4 text-center">
                      <span style="font-size:15px;">P.O. Box 957 | Canada, 05958</span>
                    </div>
                    <div class="col-md-4 text-center" style="font-family: arial Black;">
                        <span><b style="font-size:23px;">Rate Confirmation</b><br> <b>RateCon</b> #: <?php echo $row["rateConfirmationID"]; ?> </span> 
                    </div>      
                  </div>
                

                    <div class="container">
                      <div class="row">
                        <label class="form-control bg-info" style="font-size:12px;">DRIVER INFORMATYION</label>
                      <div class="col">
                         <form class="form">
                          <div class="form-group">
                            <span style="font-size: 12px;"><b>Name:</b> <?php echo $row2["name"]; ?></span><br>
                            <span style="font-size: 12px;"><b>ID #:</b> <?php echo $row2["driverID"]; ?></span><br>
                            <span style="font-size: 12px;"><b>Address :</b> <?php echo $row2["address"]; ?></span>
                            
                          </div>
                       </form>
                      </div>

                      <div class="col">
                          <form class="form">
                            <div class="form-group">
                              <span style="font-size: 12px;"><b>Email:</b> <?php echo $row2["email"]; ?></span><br>
                              <span style="font-size: 12px;"><b>Phone :</b> <?php echo $row2["tel"]; ?></span>
                              
                            </div>

                          </form>
                      </div>
                        <div class="col">
                            <form class="form">
                          <div class="form-group">
                            <span style="font-size: 12px;"><b>License ID #:</b> <?php echo $row2["licenseID"]; ?></span><br>
                            <span style="font-size: 12px;"><b>Company :</b> LGTI LOGISTICS</span><br>
                            <span style="font-size: 12px;"><b>Address :</b> <?php echo $row2["address"]; ?></span>
                            
                          </div>
                       </form>
                        </div>
                    </div>
                  </div>

                 
                  <div class="container">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="row">
                           <label class="form-control bg-info" style="font-size:12px;">LOAD INFORMATYION</label>
                          <div class="col">
                            <form class="form">
                              <div class="form-group">
                                <span style="font-size: 12px;"><b>RATE CONFIRMATION #:</b> <?php echo $row["rateConfirmationID"]; ?></span><br>
                                <span style="font-size: 12px;"><b>Shipper Name. :</b> <?php echo $row["shipperName"]; ?></span><br>
                                <span style="font-size: 12px;"><b>Shipper Tel. :</b> <?php echo $row["shipperTel"]; ?></span><br>
                                
                              </div>
                           </form>
                          </div>

                          <div class="col">
                            <form class="form">
                            <div class="form-group">
                              <span style="font-size: 12px;"><b>Vehicle Type:</b>  <?php echo $row["vehicleType"]; ?></span><br>
                              <span style="font-size: 12px;"><b>Trailer number :</b>  <?php echo $row["trailerNumber"]; ?></span><br>
                              <span style="font-size: 12px;"><b>Truck Number :</b>  <?php echo $row["truckNumber"]; ?></span><br>
                              <span style="font-size: 12px;"><b>Load Assigned Date :</b> <?php echo $row["dateRegistered"]; ?></span>
                            </div>

                          </form>
                          </div>
                          
                        </div>

                      </div>

                      <div class="col-md-6">
                        <div class="row">
                        <label class="form-control bg-info" style="font-size:12px;">RATE DETAILS</label>
                          <div class="col-md-4">
                            <form class="form">
                                <div class="form-group">
                                  <span style="font-size: 12px;"><b>Drescription</b><br>  <?php echo $row["loadDescription"]; ?></span>
                                </div> 
                            </form>
                          </div>

                 
                          <div class="col-md-8 text-center">
                          <form class="form">
                                <div class="form-group">
                                  <span style="font-size: 12px;"><b>Total Rate</b><br>  <?php echo $row["rate"]; ?></span>
                                </div> 
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  

                  <div class="container">
                    <div class="row">
                      
                      <div class="col">
                        <div class="row">
                          <div class="col-md-6">
                             
                                <table id="DriverAvailable" class="table">
                                  <h4 class="form-control bg-info" style="font-size:12px; font-weight:bolder;">PICKUPS</h4>
                                   <thead style="font-size:11px; color:black;">
                                  <tr>
                                  
                                   <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                      <th>Address</th>
                              
                                  </tr>
                                  </thead>
                                  <tbody style="font-size:11px">
                                  <?php
                                 
                                      $sql_pickup = "SELECT pickups.name, pickups.address, pickups.city, pickups.state, pickups.time, pickups.date, pickups.stateZipCode, loads.id FROM pickups 
                                      INNER JOIN loads 
                                      ON pickups.load_id = loads.id 
                                      WHERE pickups.load_id = '".$id."' ";
                                      $query_pickups = mysqli_query($conn, $sql_pickup) or die(mysqli_error($conn));
                                      while ($row_pickups = mysqli_fetch_assoc($query_pickups)){
                                    ?>
             
                                  <tr>
                                  
                                     <td><?php echo $row_pickups['name']; ?></td> 
                                     <td><?php echo $row_pickups['date']; ?> <?php echo $row_pickups['time']; ?></td>
                                     <td><?php echo $row_pickups['city']; ?>, <?php echo $row_pickups['state']; ?> <?php echo $row_pickups['stateZipCode']; ?></td>
                                     <td><?php echo $row_pickups['address']; ?></td>  

                                  </tr>

                                     <?php 
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                              </table>
                          </div>
                          <div class="col-md-6">
        
                                <table id="DriverAvailable1" class="table">
                                  <h4 class="form-control bg-info" style="font-size:12px; font-weight: bolder;">DROPS</h4>
                                   <thead style="font-size:11px; color:black;">
                                  <tr>
                                    <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                      <th>Address</th>
                              
                                  </tr>
                                  </thead>
                                    <tbody style="font-size:11px">
                                  <?php
                                      $sql_drop = "SELECT drops.name, drops.address, drops.city, drops.state, drops.time, drops.date, drops.stateZipCode, loads.id FROM drops 
                                      INNER JOIN loads 
                                      ON drops.load_id = loads.id 
                                      WHERE drops.load_id = '".$id."' ";
                                      $query_drops = mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));
                                      while ($row_drops = mysqli_fetch_assoc($query_drops)){
                                    ?>
             
                                  <tr>
                                     <td><?php echo $row_drops['name']; ?></td> 
                                     <td><?php echo $row_drops['date']; ?> <?php echo $row_drops['time']; ?></td>
                                     <td><?php echo $row_drops['city']; ?>, <?php echo $row_drops['state']; ?> <?php echo $row_drops['stateZipCode']; ?></td>
                                     <td><?php echo $row_drops['address']; ?></td>  

                                  </tr>

                                     <?php 
                                   } 
                                   ?>
                                
                                  </tbody>
                              </table>
                          </div>
                        </div>
                             
                      </div>
                    </div>
                  </div>
                    
              </div>


                <!-- /.card-body -->
                <div style="clear:both;"></div>
              <div class="modal-footer">
                  <a href="load.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Back</a>
                  <a href="load_print.php?id=<?php echo $id; ?>" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
              </div>


      
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
<script src="../plugins/select2/js/select2.full.min.js"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap5'
    })
  })

  // DropzoneJS Demo Code End
</script>

<script>
  $(function () {
      $('#DriverAvailable1').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function () {
      $('#DriverAvailable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>