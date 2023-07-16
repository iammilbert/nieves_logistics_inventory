<?php 
include 'expiredSession.php';
?>


<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>

<style type="text/css">
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
 </style>

  <script type="text/javascript">
  window.print();
</script>

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
            <a class="dropdown-item active" href="load_delivered.php">Loads Delivered</a>
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
 $row4 = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row4["name"];?></b>
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
       
            <li class="nav-item">
                <a href="load_delivered.php" class="nav-link active">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <p>

    </p>
    <!-- /.content-header -->
  
<?php 

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

 $sql5 = "SELECT vehicles.number, vehicles.model, vehicles_assigned.load_id, vehicles.vin, vehicles.vehicleType, vehicles_assigned.date_assigned FROM vehicles_assigned 
   INNER JOIN loads
   ON vehicles_assigned.load_id = loads.id 
   INNER JOIN vehicles
   ON vehicles_assigned.vehicle_id = vehicles.id 
   WHERE vehicles_assigned.load_id = '".$row["id"]."'"; 
   $query5 = mysqli_query($conn, $sql5) or die(mysqli_error($conn));
   $row5 = mysqli_fetch_assoc($query5); 

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
                      <img class="profile-user-img img-fluid"
                           src="../admin/uploadLogo/<?=$row4['logo']?>"
                           alt="LGTI LOGO" style="width:200px; height:100px;">
                    </div>


                  <div class="text-center">
                    <h3 class="name bold font-size-30"><?php echo $row4["name"];?></h3>                            
                  </div>

                  <div class="row">
                    <div class="col-md-4 text-center">
                       <span class="font-size-13"><b>Email</b>: <?php echo $row4["email"]; ?></span><br> 
                    <span class="font-size-13"><b>Phone</b>:<?php echo $row4["tel"]; ?></span> 
                    </div>
                    <div class="col-md-4 text-center">
                      <span class="font-size-13"><?php echo $row4["address"]; ?> </span><br>
                      <span class="font-size-13">P.O. Box 957 | Canada, 05958</span>
                    </div>
                    <div class="col-md-4 text-center" style="font-family: arial Black;">
                        <span><b class="font-size-19">Rate Confirmation</b><br> #:<?php echo $row["rateConfirmationID"]; ?> </span> 
                    </div>      
                  </div>
                

                    <div class="container">
                      <div class="row">
                        <label class="form-control bg-info font-size-13">DRIVER INFORMATYION</label>
                      <div class="col">
                         <form class="form">
                          <div class="form-group">
                            <span class="font-size-13"><b>Name:</b> <?php echo $row2["name"]; ?></span><br>
                            <span class="font-size-13"><b>ID #:</b> <?php echo $row2["driverID"]; ?></span><br>
                            <span class="font-size-13"><b>Date Assigned :</b> <?php echo $row["dateRegistered"]; ?></span>
                            
                          </div>
                       </form>
                      </div>

                      <div class="col">
                          <form class="form">
                            <div class="form-group">
                              <span class="font-size-13"><b>Email:</b> <?php echo $row2["email"]; ?></span><br>
                              <span class="font-size-13"><b>Phone :</b> <?php echo $row2["tel"]; ?></span>
                              
                            </div>

                          </form>
                      </div>
                        <div class="col">
                            <form class="form">
                          <div class="form-group">
                            <span class="font-size-13"><b>License ID #:</b> <?php echo $row2["licenseID"]; ?></span><br>
                            <span class="font-size-13"><b>Company :</b> LGTI LOGISTICS</span><br>
                            <span class="font-size-13"><b>Address :</b> <?php echo $row2["address"]; ?></span>
                            
                          </div>
                       </form>
                        </div>
                    </div>
                  </div>

                 
                  <div class="container">
                    <div class="row">

                      <div class="col">
                        <div class="row">
                           <label class="form-control bg-info font-size-13"> LOAD INFORMATYION</label>
                          <div class="col">
                            <form class="form">
                              <div class="form-group">
                                <span class="font-size-13"><b>RATE CON. #:</b> <?php echo $row["rateConfirmationID"]; ?></span><br>
                                <span class="font-size-13"><b>Shipper Name. :</b> <?php echo $row["shipperName"]; ?></span><br>
                                <span class="font-size-13"><b>Shipper Tel. :</b> <?php echo $row["shipperTel"]; ?></span><br>
                                <span class="font-size-13"><b>Shipper Email :</b> <?php echo $row["shipperEmail"]; ?></span>
                              </div>
                           </form>
                          </div>

                           <div class="col">
                            <form class="form">
                              <div class="form-group">
                                <span class="font-size-13"><b>VEHICLE TYPE :</b> <?php echo $row5["vehicleType"]; ?></span><br>
                                <span class="font-size-13"><b>MODEL :</b> <?php echo $row5["model"]; ?></span><br>
                                <span class="font-size-13"><b>NUMBER :</b> <?php echo $row5["number"]; ?></span><br>
                                <span class="font-size-13"><b>VIN :</b> <?php echo $row5["vin"]; ?></span>
                              </div>
                           </form>
                          </div>


                           <div class="col">
                            <form class="form">
                              <div class="form-group">
                                <span class="font-size-13"><b>LOAD DESCRIPTION:</b> <?php echo $row["loadDescription"]; ?></span><br>
                                <span class="font-size-13"><b>LOAD RATE :</b> <?php echo $row["rate"]; ?><sup style="color:green;">USD</sup></span><br>
                                 <span class="font-size-13"><b>LOAD WEIGHT:</b> <?php echo $row["weight"]; ?></span>
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
                             
                                <table id="DriverAvailable" class="table font-size-13">
                                  <h4 class="form-control bg-info font-size-13 bold">PICKUPS</h4>
                                   <thead class="font-size-11 text-black">
                                  <tr>
                                  
                                   <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                      <th>Address</th>
                              
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                 
                                      $sql_pickup = "SELECT pickups.name, pickups.address, pickups.city, pickups.state, pickups.pickedupTime, pickups.pickedup_Date, pickups.stateZipCode, loads.id FROM pickups 
                                      INNER JOIN loads 
                                      ON pickups.load_id = loads.id 
                                      WHERE pickups.load_id = '".$id."' ";
                                      $query_pickups = mysqli_query($conn, $sql_pickup) or die(mysqli_error($conn));
                                      while ($row_pickups = mysqli_fetch_assoc($query_pickups)){
                                    ?>
             
                                  <tr>
                                  
                                     <td><?php echo $row_pickups['name']; ?></td> 
                                     <td><?php echo $row_pickups['pickedup_Date']; ?> <?php echo $row_pickups['pickedupTime']; ?></td>
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
        
                                <table id="DriverAvailable1" class="table font-size-13">
                                  <h4 class="form-control bg-info font-size-13 bold">DROPS</h4>
                                   <thead class="font-size-11 text-black">
                                  <tr>
                                    <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                      <th>Address</th>
                              
                                  </tr>
                                  </thead>
                                    <tbody>
                                  <?php
                                      $sql_drop = "SELECT drops.name, drops.address, drops.city, drops.state, drops.droppedTime, drops.dropped_Date, drops.stateZipCode, loads.id FROM drops 
                                      INNER JOIN loads 
                                      ON drops.load_id = loads.id 
                                      WHERE drops.load_id = '".$id."' ";
                                      $query_drops = mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));
                                      while ($row_drops = mysqli_fetch_assoc($query_drops)){
                                    ?>
             
                                  <tr>
                                     <td><?php echo $row_drops['name']; ?></td> 
                                     <td><?php echo $row_drops['dropped_Date']; ?> <?php echo $row_drops['droppedTime']; ?></td>
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

              <div class="modal-footer">
                  <a href="load_delivered.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Back</a>

                  <a href="load_print.php?id=<?php echo $id; ?>" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
              </div>


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