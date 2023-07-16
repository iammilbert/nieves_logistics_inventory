<?php 
include 'expiredSession.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOAD PAID RECEIPT</title>


  <link rel="shortcut icon" type="image/x-icon" href="../dist/img/LGTILOGO.PNG"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Custom CSs -->
    <link rel="stylesheet" href="../dist/css/style.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
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
 $sql4 = "SELECT * FROM companyinfo"; 
 $query4 = mysqli_query($conn, $sql4); 
 $row4 = mysqli_fetch_assoc($query4);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row4["name"]; ?></b>
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

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <p>

    </p>
    <!-- /.content-header -->
<?php 
 $id = isset($_GET['id']) ? $_GET['id'] : '';
 $sql = "SELECT * FROM loads WHERE loads.id = '".$id."'"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
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
<?php
   $sql2 = "SELECT * FROM users WHERE id = '".$row["driver_id"]."' ";
   $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
   $row2 = mysqli_fetch_assoc($query2); 

   ?>

   <!-- dispatcher Query -->
   <?php
   $sqlmy = "SELECT * FROM users WHERE id = '".$row["registeredBy"]."' ";
   $querymy = mysqli_query($conn, $sqlmy) or die(mysqli_error($conn));
   $rowmy = mysqli_fetch_assoc($querymy); 

   ?>
       
      
                   <div class="text-center bold">
                   <h1 class="bold text-success"><?php echo $row4["name"];?>.</h1>  
                   <h3 class="bold text-info">DBA LGTI LOGISTICS</h3> 
                  </div>

                  <div class="row font-size-15 bold">
                    <div class="col-md-4 text-center">
                       <span><b>Email</b>: <?php echo $row4["email"]; ?></span><br> 
                    <span><b>Phone</b>: <?php echo $row4["tel"]; ?></span> 
                    </div>
                    <div class="col-md-4 text-center">
                      <span><?php echo $row4["address"]; ?>, <?php echo $row4["city"]; ?> <?php echo $row4["state"]; ?> <?php echo $row4["zipCode"]; ?>, <?php echo $row4["address"]; ?> </span><br>
                    </div>
                    <div class="col-md-4 text-center" style="font-family: arial Black;">
                        <span><b style="font-size:25px">Rate Confirmation</b><br> <b style="font-size:20px">#:<?php echo $row["rateConfirmationID"]; ?> </b> </span> 
                    </div>      
                  </div>
  <?php
   $sql55 = "SELECT * FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$id."' ";
   $query55 = mysqli_query($conn, $sql55) or die(mysqli_error($conn));
   $row55 = mysqli_fetch_assoc($query55); 
   ?>
   
  
  <hr>
                    <div class="container">
                      <div class="row">
                      <div class="col font-size-13">
                         <label class="form-control bg-info font-size-13">DRIVER INFORMATYION</label>
                        <form class="form tahoma">
                          <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <span><b>Name:</b> <?php echo $row2["name"]; ?></span><br>
                              <span><b>ID:</b> LGTI-<?php echo $row2["id"]; ?></span> <br>
                               <span><b>Phone :</b> <?php echo $row2["tel"]; ?></span><br>
                               <span><b>Email:</b> <?php echo $row2["email"]; ?></span><br>
                            </div>
                          </div>

                          <div class="col">
                            <div class="form-group">
                                <span><b>License ID #:</b> <?php echo $row2["licenseID"]; ?></span><br>
                                <span><b>Address :</b> <?php echo $row4["address"]; ?> <?php echo $row4["zipCode"]; ?></span><br>
                     <?php 
                         if($row["paymentStatus"] == 0)
                        echo "<b>PAYMENT STATUS : </b> <span class='badge badge-primary' style='font-size: 13px;'>PENDING</span>";
                        elseif($row["paymentStatus"] == 1)  
                      echo "<b>PAYMENT STATUS :</b> <span class='badge badge-primary' style='font-size: 13px;'>PAID</span>";
                        elseif($row["paymentStatus"] == 2) 
                          echo "<b>PAYMENT STATUS  :</b> <span class='badge badge-primary' style='font-size: 13px;'>ON-HOLD</span>";
                      ?>
                            </div>
                          </div>
                        </div>
                       </form>
                      </div>

                      <div class="col font-size-13">
                         <label class="form-control bg-info font-size-13">DISPATCHER'S INFORMATION</label>
                          <form class="form tahoma">
                              <div class="form-group">
                                <span><b>Name: </b> <?php echo $rowmy["name"]; ?></span><br>
                                  <span><b>Email : </b> <?php echo $rowmy["email"]; ?></span><br>
                                  <span><b>Tel : </b> <?php echo $rowmy["tel"]; ?></span><br>
                                   <span><b>ID : </b> LGTI-<?php echo $rowmy["id"]; ?></span>
                                </div>
                          </form>
                      </div>       
                    </div>
                  </div>


                    <!-- Dispatcher Information -->
                    <div class="container">
                      <div class="row">
                        <div class="col font-size-13">
                           <label class="form-control bg-info font-size-13">SHIPPER'S INFORMATION</label>
                            <form class="form tahoma">
                          <div class="form-group">
                            <span><b>Shipper Email :</b> <?php echo $row["shipperEmail"]; ?></span><br>
                            <span><b>Shipper Address :</b> <?php echo $row["shipperAddress"]; ?></span><br>
                            
                          </div>
                       </form>
                        </div>

                        <div class="col font-size-13">
                           <label class="form-control bg-info font-size-13">BROKER'S INFORMATION</label>
                            <form class="form tahoma">
                            <div class="form-group">
                              <span><b>Name: </b>  <?php echo $row["brokerName"]; ?></span><br>
                               <span><b>Email: </b>  <?php echo $row["brokerEmail"]; ?></span><br>
                               <span><b>Tel. Number: </b>  <?php echo $row["brokerNumber"]; ?></span><br>
                            </div>
                       </form>
                        </div>
                    </div>
                  </div>
                    <!-- Dispatcher Information -->

                  <div class="container">
                    <div class="row">

                      <div class="col">
                        <div class="row">
                           <label class="form-control bg-info font-size-13">LOAD INFORMATION</label>
                          <div class="col">
                            <form class="form font-size-13 tahoma">
                            <div class="form-group">
                              <span><b>Load Description:</b> <?php echo $row["loadDescription"]; ?></span><br>
                              <span><b>Rate:</b>  <?php echo $row["rate"]; ?> <b>USD</b></span><br>
                              <span><b>Lay Over Amount: </b> <?php echo $row["layOverAmount"]; ?></span><br>
                              <span><b>Load Weight: </b>  <?php echo $row["weight"]; ?></span><br>
                              <span><b>Rate Confirmation ID. #: </b>  <?php echo $row["rateConfirmationID"]; ?></span><br>
                              <span><b>Lumper Fee</b>  </span>
                              
                            </div>
                           </form>
                          </div>

                          <div class="col">
                          
                            <table class="table font-size-11 tahoma" style="font-size:10px;">
                                   <thead class="bold">
                                  <tr>
                                   <th>VEHICLES</th>
                                   <th>NUMBER</th>
                                    <th>VIN</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                   $sql5 = "SELECT * FROM vehicles WHERE vehicles.number = '".$row55["truck"]."' OR vehicles.number = '".$row55["trailer"]."' OR vehicles.number = '".$row55["tractor"]."' ";
                                   $query5 = mysqli_query($conn, $sql5) or die(mysqli_error($conn));
                                      while ($row5 = mysqli_fetch_assoc($query5)){
                                    ?>
                                  <tr>
                                    <td><?php echo $row5["vehicleType"]; ?></td>
                                    <td><?php echo $row5["number"]; ?></td>
                                    <td><?php echo $row5["vin"]; ?></td>

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

                  <div class="container">

                    <div class="row">

                          <div class="col">
                                <table id="example2" class="table font-size-13 tahoma">
                                  <h4 class="form-control bg-info bold">PICKUPS</h4>
                                   <thead class="bold">
                                  <tr>
                                    <th></th>
                                   <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $no =1;
                                      $sql_pickup = "SELECT * FROM pickups WHERE pickups.load_id = '".$id."' ";
                                      $query_pickups = mysqli_query($conn, $sql_pickup) or die(mysqli_error($conn));
                                      while ($row_pickups = mysqli_fetch_assoc($query_pickups)){
                                    ?>
                                  <tr>
                                  <td><b>P<?php echo $no; ?></b></td> 
                                     <td><?php echo $row_pickups['name']; ?></td> 
                                        <td><?php echo $row_pickups['date']; ?> 
                                          <?php 
                                             $time = $row_pickups['time']; 
                                             $pickedup_Time = date('h:i a', strtotime($time)); 
                                             echo $pickedup_Time; 
                                           ?>
                                         </td>
                                     <td><?php echo $row_pickups['city']; ?>, <?php echo $row_pickups['state']; ?> <?php echo $row_pickups['stateZipCode']; ?></td>
                                

                                  </tr>

                                     <?php 
                                     $no++;
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                              </table>
                          </div>

                          <div class="col">
                                <table class="table font-size-13 tahoma">
                                  <h4 class="form-control bg-info bold">DROPS</h4>
                                   <thead class="bold">
                                  <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                  </tr>
                                  </thead>
                              <tbody>
                              <?php
                              $no = 1;
                              $sql_drop = "SELECT * FROM drops WHERE drops.load_id = '".$id."' ";
                                      $query_drops = mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));
                                      while ($row_drops = mysqli_fetch_assoc($query_drops)){
                                    ?>
             
                                  <tr>
                                    <td><b>D <?php echo $no; ?></b></td> 
                                     <td><?php echo $row_drops['name']; ?></td> 
                                        <td><?php echo $row_drops['date']; ?> 
                                          <?php 
                                             $time = $row_drops['time']; 
                                             $dropped_Time = date('h:i a', strtotime($time)); 
                                             echo $dropped_Time; 
                                           ?>
                                         </td>
                                     <td><?php echo $row_drops['city']; ?>, <?php echo $row_drops['state']; ?> <?php echo $row_drops['stateZipCode']; ?></td>
                                      
 

                                  </tr>

                                     <?php 
                                     $no++;
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                              </table>
                          </div>

                        </div>
                             
                  <div class="row">

                      <div class="col">
                           <table id="example3" class="table font-size-13 tahoma">
                                  <h4 class="form-control bg-info bold">DATE/TIME PICKED</h4>
                                   <thead class="bold">
                                  <tr>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                  </tr>

                                   <tbody>
                              <?php
                                  $no = 1;
                              $sql_delivery = "SELECT * FROM pickups WHERE pickups.load_id = '".$id."' ";
                                      $query_delivery = mysqli_query($conn, $sql_delivery) or die(mysqli_error($conn));
                                      while ($row_delivery = mysqli_fetch_assoc($query_delivery)){
                                    ?>
             
                                  <tr>

                                        <td><b>Pickedup <?php echo $no; ?></b></td>
                                        <td><?php echo $row_delivery['pickedup_Date']; ?> </td>

                                      <td>
                                          <?php 
                                             $time = $row_delivery['pickedupTime']; 
                                             $pick_Time = date('h:i a', strtotime($time)); 
                                             echo $pick_Time; 
                                           ?>
                                         </td>

                                           <td>  
                                    <?php 
                                      if($row_delivery["pickedStatus"] == 2)
                                      echo "<small class='badge badge-success'>Picked</small>";
                                      elseif($row_delivery["pickedStatus"] == 4)
                                        echo "<small class='badge badge-danger'>Cancelled</small>";
                                       else 
                                        echo "<small class='badge badge-warning'>Pending</small>"; 
                                    ?>
                                    <td> 
                                      </tr>

                                     <?php 
                                         $no++;
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                                  </thead>
                          </table>                  
                      </div>

          
                        <div class="col">
                           <table id="DriverAvailable3" class="table font-size-13 tahoma">
                                  <h4 class="form-control bg-info bold">DATE/TIME DELIVERED</h4>
                                   <thead class="bold">
                                  <tr>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                  </tr>

                                   <tbody>
                              <?php
                              $no = 1;
                              $sql_delivery2 = "SELECT * FROM drops WHERE drops.load_id = '".$id."' ";
                                      $query_delivery2 = mysqli_query($conn, $sql_delivery2) or die(mysqli_error($conn));
                                      while ($row_delivery2 = mysqli_fetch_assoc($query_delivery2)){
                                    ?>
             
                                  <tr>
                                      <td><b>Stopped <?php echo $no; ?></b></td> 
                                        <td><?php echo $row_delivery2['dropped_Date']; ?> 
                                         </td>

                                         <td>
                                          <?php 
                                             $time = $row_delivery2['droppedTime']; 
                                             $pick_Time = date('h:i a', strtotime($time)); 
                                             echo $pick_Time; 
                                           ?>
                                         </td>

                                          <td>  
                                    <?php 
                                       if($row_delivery2["status"] == 3)
                                      echo "<small class='badge badge-success'>Dropped</small>";
                                     elseif($row_delivery2["status"] == 4)
                                      echo "<small class='badge badge-danger'>Cancelled</small>";
                                      else 
                                        echo "<small class='badge badge-warning'>Pending</small>"; 
                                    ?>
                                    <td>
                                      </tr>

                                     <?php 
                                     $no++;
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                                  </thead>
                          </table>                  
                      </div>
                      
                    </div>

                <div class="row">
                    <div class="col">
                      <?php 
                       $sql_reason = "SELECT * FROM pickups WHERE load_id = '".$id."'";
                       $query_reason = mysqli_query($conn, $sql_reason);
                       $row_reason = mysqli_fetch_assoc($query_reason);

                       if ($row_reason["pickedStatus"]==4) {
                         echo "<div class='form-group'> 
                         <label>Reasons For Cancellation</label>
                         <textarea style='border:none;' type='text' class='form-control' name='comment' col='40' readonly>{$row_reason['comment']}</textarea>
                         </div> ";
                       }

                       ?>                             
                        </div>
                    </div>
                  </div> <!-- end of  container -->
<p></p>
                  <div class="container">
                      <div class="row">
                        <div class="col-md-4 text-center" style="padding-top: 80px;">
                           <span><u><?php echo $rowmy["name"]; ?></u></span><br>
                           <span><b>LGTI Dispatcher</b></span>
                        </div>

      <?php 
          $sqlseal = "SELECT loads_assigned.totalLoadPicked, loads.dropped_Date, loads_assigned.driver_id, loads.rateConfirmationID, loads_assigned.totalLoadDropped, loads.totalPickups, loads.id, loads.bol, loads.bolStatus, loads.paymentStatus, loads.payrollStatus, loads.pickedupTime, loads.droppedTime, loads.totalDrops, loads.status FROM loads 
            INNER JOIN loads_assigned
            ON loads_assigned.load_id = loads.id WHERE loads.id = '".$id."'";
            $queryseal = mysqli_query($conn, $sqlseal) or die(mysqli_error($conn));
            $rowseal = mysqli_fetch_assoc($queryseal); 
      ?>

                        <div class="col-md-4">
                          <div class="text-center">
                        <?php

                          if($rowseal["totalPickups"]==$rowseal["totalLoadPicked"] AND $rowseal["totalDrops"]== $rowseal["totalLoadDropped"] AND $rowseal["pickedupTime"] != null){
                              echo "<img class='profile-user-img img-fluid img-circle'
                                   src='../images/success.png'
                                   alt='User profile picture' style='height: 120px; width: 130px;'>"; 
                            }

                           elseif($rowseal["status"]==4){
                              echo "<img class='profile-user-img img-fluid img-circle'
                                   src='../images/cancelled.png'
                                   alt='User profile picture' style='height: 120px; width: 130px;'>";
                            }
                        ?>
                          </div>
                        </div>
 
                        <div class="col-md-4 text-center" style="padding-top: 80px;">
                           <span><u><?php echo $row4["ceo"]; ?></u></span><br>
                           <span><b>LGTI President</b></span>
                        </div>
                    </div>
                  </div>
                   <div class="modal-footer">

                  <a href="load_delivered_receipt_print.php?id=<?php echo $id; ?>" class="btn btn-warning no-print"><i class="fa fa-print"></i> Print</a> 
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
      "lengthChange": false,
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
      $('#drops').DataTable({
      "paging": false,
      "lengthChange": false,
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
      $('#vehicles').DataTable({
      "paging": false,
      "lengthChange": false,
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
      $('#pickups').DataTable({
      "paging": false,
      "lengthChange": false,
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
      $('#DriverAvailable2').DataTable({
      "paging": false,
      "lengthChange": false,
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