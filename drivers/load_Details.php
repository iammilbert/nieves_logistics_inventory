<?php  
include 'expiredSession.php'; 
?> 

<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php 
$myID = $_SESSION["ID"];

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row4 = mysqli_fetch_assoc($query);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand" href="#"><span class="name"><?php $text = $row4["name"]; echo strtok($text, " ");?> INVENTORY</span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse bold" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php" >HOME</a>
      </li>
     
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> REPORT
        </a>
        <div class="dropdown-menu" aria-labelledby="workload">
          <a class="dropdown-item" href="load_report.php">Loads Report</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="payment_report.php">Payment Report</a>
            <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_cancel.php">Load Cancelled</a>
        </div>
      </li>


       <div class="nav-item" id="ex2">
          <span class="fa-stack has-badge" data-count="9">      
            <i class="fa fa-bell fa-stack-1x fa-inverse font-size-20"></i>
          </span>
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="#" > <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fa fa-user-circle font-size-23" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="editProfile.php"><i class="fa fa-cog"></i> Edit Profile</a>
        </div>
      </li>
    </ul>
    </div>
  </div>
</nav>

    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
<?php 
 $id = isset($_GET['loadID']) ? $_GET['loadID'] : '';
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
   $sql2 = "SELECT * FROM users WHERE id = '".$myID."' ";
   $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
   $row2 = mysqli_fetch_assoc($query2); 

   ?>
                    <div class="text-center bold">
                   <h1 class="bold text-success"><?php echo $row4["name"];?>.</h1>  
                   <h3 class="bold text-info">DBA LGTI LOGISTICS</h3> 
                  </div>

                  <div class="row font-size-13 bold">
                    <div class="col-md-4 text-center">
                       <span><b>Email</b>: <?php echo $row4["email"]; ?></span><br> 
                    <span><b>Phone</b>: <?php echo $row4["tel"]; ?></span> 
                    </div>
                    <div class="col-md-4 text-center">
                      <span><?php echo $row4["address"]; ?>, <?php echo $row4["city"]; ?> <?php echo $row4["state"]; ?> <?php echo $row4["zipCode"]; ?>, <?php echo $row4["address"]; ?> </span><br>
                    </div>
                    <div class="col-md-4 text-center" style="font-family: arial Black;">
                        <span><b class="font-size-19">Rate Confirmation</b><br> #:<?php echo $row["rateConfirmationID"]; ?>  </span> 
                    </div>      
                  </div>
  <?php
   $sql55 = "SELECT * FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$id."' ";
   $query55 = mysqli_query($conn, $sql55) or die(mysqli_error($conn));
   $row55 = mysqli_fetch_assoc($query55); 
   ?>
   
  
                    <div class="container">
                      <div class="row">
                        <label class="form-control bg-info font-size-13">DRIVER INFORMATYION</label>
                      <div class="col font-size-13">
                         <form class="form tahoma">
                          <div class="form-group">
                            <span><b>Name:</b> <?php echo $row2["name"]; ?></span><br>
                            <span><b>ID:LGTI-</b> <?php echo $row2["id"]; ?></span> <br>
                             <span><b>Phone :</b> <?php echo $row2["tel"]; ?></span>
                          </div>
                       </form>
                      </div>

                      <div class="col font-size-13">
                          <form class="form tahoma">
                            <div class="form-group">
                              <span><b>Bank Name:</b> <?php echo $row2["bankName"]; ?></span><br>
                              <span><b>Acount Name :</b><br> <?php echo $row2["accountName"]; ?></span><br>
                              
                            </div>

                          </form>
                      </div>
                        <div class="col font-size-13">
                          <form class="form tahoma">
                            <div class="form-group">
                              <span><b>Email:</b> <?php echo $row2["email"]; ?></span><br>
                                <span><b>Account Number :</b> <?php echo $row2["accountNumber"]; ?></span>
                              
                            </div>

                          </form>
                      </div>
                        <div class="col font-size-13">
                            <form class="form tahoma">
                          <div class="form-group">
                            <span><b>License ID #:</b> <?php echo $row2["licenseID"]; ?></span><br>
                            <span><b>Address :</b> <?php echo $row4["address"]; ?> <?php echo $row4["zipCode"]; ?></span>
                            
                          </div>
                       </form>
                        </div>
                    </div>
                  </div>

                  <div class="container">
                    <div class="row">

                      <div class="col">
                        <div class="row">
                           <label class="form-control bg-info font-size-13">LOAD INFORMATYION</label>
                          <div class="col">
                            <form class="form font-size-13 tahoma">
                              <div class="form-group">
                                <span><b>Shipper Name. :</b> <?php echo $row["shipperName"]; ?></span><br>
                                <span><b>Shipper Tel. :</b> <?php echo $row["shipperTel"]; ?></span><br>
                                <span><b>Shipper Email :</b> <?php echo $row["shipperEmail"]; ?></span>
                              </div>
                            <div class="form-group">
                              <span><b>Lay Over??:</b> <?php echo $row["layover"]; ?></span><br>
                              <span><b>Load Weight</b>  <?php echo $row["weight"]; ?></span><br>

                                     <?php 
                         if($row["paymentStatus"] == 0)
                        echo "<b>PAYMENT STATUS : </b> <span class='badge badge-primary' style='font-size: 13px;'>PENDING</span>";
                        elseif($row["paymentStatus"] == 1)  
                      echo "<b>PAYMENT STATUS :</b> <span class='badge badge-primary' style='font-size: 13px;'>PAID</span>";
                        elseif($row["paymentStatus"] == 2) 
                          echo "<b>PAYMENT STATUS  :</b> <span class='badge badge-primary' style='font-size: 13px;'>ON-HOLD</span>";
                      ?>
                              
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
                                    <th>LICENSE PLATE</th>
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
                                    <td><?php echo $row5["plateNumber"]; ?></td>

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
                                   <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                      $sql_pickup = "SELECT * FROM pickups WHERE pickups.load_id = '".$id."' ";
                                      $query_pickups = mysqli_query($conn, $sql_pickup) or die(mysqli_error($conn));
                                      while ($row_pickups = mysqli_fetch_assoc($query_pickups)){
                                    ?>
                                  <tr>
                                  
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
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                              </table>
                          </div>

                          <div class="col">
                                <table id="ActiveLoad" class="table font-size-13 tahoma">
                                  <h4 class="form-control bg-info bold">DROPS</h4>
                                   <thead class="bold">
                                  <tr>
                                    <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                  </tr>
                                  </thead>
                              <tbody>
                              <?php
                              $sql_drop = "SELECT * FROM drops WHERE drops.load_id = '".$id."' ";
                                      $query_drops = mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));
                                      while ($row_drops = mysqli_fetch_assoc($query_drops)){
                                    ?>
             
                                  <tr>
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
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                              </table>
                          </div>

                        </div>
                             
                  <div class="row">

                      <div class="col">
                           <table id="example3" class="table font-size-13 tahoma">
                                  <h4 class="form-control bg-info bold">PICKED UP DATE/TIME</h4>
                                   <thead class="bold">
                                  <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                  </tr>

                                   <tbody>
                              <?php
                              $sql_delivery = "SELECT * FROM pickups WHERE pickups.load_id = '".$id."' ";
                                      $query_delivery = mysqli_query($conn, $sql_delivery) or die(mysqli_error($conn));
                                      while ($row_delivery = mysqli_fetch_assoc($query_delivery)){
                                    ?>
             
                                  <tr>
                            
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
                                     
                                   } 
                                   ?>
                                
                                  </tbody>
                                  </thead>
                          </table>                  
                      </div>

          
                        <div class="col">
                           <table id="DriverAvailable3" class="table font-size-13 tahoma">
                                  <h4 class="form-control bg-info bold">DELIVERY DATE/TIME</h4>
                                   <thead class="bold">
                                  <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                  </tr>

                                   <tbody>
                              <?php
                              $sql_delivery2 = "SELECT * FROM drops WHERE drops.load_id = '".$id."' ";
                                      $query_delivery2 = mysqli_query($conn, $sql_delivery2) or die(mysqli_error($conn));
                                      while ($row_delivery2 = mysqli_fetch_assoc($query_delivery2)){
                                    ?>
             
                                  <tr>
                            
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
                       <textarea style='border:none;' type='text' class='form-control' name='comment' col='40'>{$row_reason['comment']}</textarea>
                       </div> ";
                     }


                     ?>                             
                      </div>
                    </div>

                  </div> <!-- end of  container -->
                   <div class="modal-footer">

                  <a href="load_Details_print.php?loadID=<?php echo $id; ?>" class="btn btn-warning no-print"><i class="fa fa-print"></i> Print</a> 
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


<!-- Footer -->
<footer class="bg-dark text-center text-white no-print">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
   <strong>Copyright &copy; 2022 - <?php echo date("Y");?> <a class="text-white" href="https://www.lgtilogistics.com"> LGTI Logistics</a></strong>.
    All rights reserved.
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $('#ActiveLoad').DataTable({
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
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
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
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example4').DataTable({
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
      $('#DriverAvailable3').DataTable({
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
