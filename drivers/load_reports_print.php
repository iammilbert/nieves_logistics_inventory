<?php  
include 'expiredSession.php'; 
?> 

<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

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

<?php 
$myID = $_SESSION["ID"];

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row4 = mysqli_fetch_assoc($query);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand" href="index.php"><span class="name bold"><?php echo $row4["name"]; ?></span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"  style="font-weight:bolder;">HOME</a>
      </li>
     
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> REPORT
        </a>
        <div class="dropdown-menu" aria-labelledby="workload">
          <a class="dropdown-item active" href="load_report.php">Loads Report</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="payment_report.php">Payment Report</a>
        </div>
      </li>


       <div class="nav-item" id="ex2">
          <span class="fa-stack has-badge" data-count="9">      
            <i class="fa fa-bell fa-stack-1x fa-inverse font-size-20"></i>
          </span>
      </div>


      <li class="nav-item active">
        <a class="nav-link" href="#"  style="font-weight:bolder;"> <span class="sr-only">(current)</span></a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fa fa-user-circle font-size-23" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item bold" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item bold" href="profile.php"><i class="fa fa-user"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item bold" href="editProfile.php"><i class="fa fa-cog"></i> Edit Profile</a>
        </div>
      </li>
    </ul>
    </div>
  </div>
</nav>
 <!-- Content Wrapper. Contains page content -->
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

                    <div class="text-center">
                      <img class="profile-user-img img-fluid"
                           src="../admin/uploadLogo/<?=$row4['logo']?>"
                           alt="LGTI LOGO" style="width:150px; height:80px;">
                    </div>


                  <div class="text-center">
                   <h3 class="name bold font-size-30"><?php echo $row4["name"];?></h3>     
                  </div>

                  <div class="row">
                    <div class="col-md-4 text-center">
                       <span><b class="font-size-13">Email</b>: <?php echo $row4["email"]; ?></span><br> 
                    <span><b class="font-size-13">Phone</b>:<?php echo $id; ?></span> 
                    </div>
                    <div class="col-md-4 text-center">
                      <span><?php echo $row4["address"]; ?> </span><br>
                      <span>P.O. Box 957 | Canada, 05958</span>
                    </div>
                    <div class="col-md-4 text-center" style="font-family: arial Black;">
                        <span><b class="font-size-19">Rate Confirmation</b><br> #:<?php echo $row["rateConfirmationID"]; ?>  </span> 
                    </div>      
                  </div>

       <?php 
 $sql_expenses = "SELECT * FROM drops WHERE drops.load_id = '".$row["id"]."'"; 
 $query_expenses = mysqli_query($conn, $sql_expenses); 
 $row_expenses = mysqli_fetch_assoc($query_expenses);
?>


  <?php 
  $select_pay_roll = "SELECT * FROM drivers_pay_roll WHERE drivers_pay_roll.load_id = '".$row["id"]."'"; 
  $query_pay_roll = mysqli_query($conn, $select_pay_roll) or die(mysqli_error($conn)); 
  $id_row = mysqli_fetch_assoc($query_pay_roll);
?>
                
  <?php
   $sql2 = "SELECT * FROM users WHERE id = '".$myID."' ";
   $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
   $row2 = mysqli_fetch_assoc($query2); 

   ?>


  <?php

   $sql5 = "SELECT vehicles.vehicleType, vehicles.vin, vehicles.model, vehicles.number FROM vehicles_assigned 
   INNER JOIN vehicles 
   ON vehicles_assigned.vehicle_id = vehicles.id WHERE vehicles_assigned.load_id = '".$id."' ";
   $query5 = mysqli_query($conn, $sql5) or die(mysqli_error($conn));
   $row5 = mysqli_fetch_assoc($query5); 

   ?>





                    <div class="container">
                      <div class="row">
                        <label class="form-control bg-info font-size-13">DRIVER INFORMATYION</label>
                      <div class="col">
                         <form class="form">
                          <div class="form-group">
                            <span class="font-size-13"><b>Name:</b> <?php echo $row2["name"]; ?></span><br>
                            <span class="font-size-13"><b>ID #:</b> <?php echo $row2["id"]; ?></span> <br>
                             <span class="font-size-13"><b>Phone :</b> <?php echo $row2["tel"]; ?></span>
                          </div>
                       </form>
                      </div>

                      <div class="col">
                          <form class="form">
                            <div class="form-group">
                              <span class="font-size-13"><b>Bank Name:</b> <?php echo $row2["bankName"]; ?></span><br>
                              <span class="font-size-13"><b>Acount Name :</b> <?php echo $row2["accountName"]; ?></span><br>
                              <span class="font-size-13"><b>Account Number #:</b> <?php echo $row2["accountNumber"]; ?></span>
                              
                            </div>

                          </form>
                      </div>
                        <div class="col">
                          <form class="form">
                            <div class="form-group">
                              <span class="font-size-13"><b>Email:</b> <?php echo $row2["email"]; ?></span><br>
                              <span class="font-size-13"><b>Role :</b> <?php echo $row2["role"]; ?></span>
                              
                            </div>

                          </form>
                      </div>
                        <div class="col">
                            <form class="form">
                          <div class="form-group">
                            <span class="font-size-13"><b>License ID #:</b> <?php echo $row2["licenseID"]; ?></span><br>
                            
                            <span class="font-size-13"><b>Address :</b> <?php echo $row2["address"]; ?> <?php echo $row4["zipCode"]; ?></span>
                            
                          </div>
                       </form>
                        </div>
                    </div>
                  </div>
              <div class="container">
                    <div class="row">
                           <label class="form-control bg-info font-size-13">LOAD INFORMATYION</label>
                          <div class="col">
                            <form class="form">
                              <div class="form-group">
                                <span class="font-size-13"><b>RATE CONFIRMATION #:</b> <?php echo $row["rateConfirmationID"]; ?></span><br>
                                <span class="font-size-13"><b>Shipper Name. :</b> <?php echo $row["shipperName"]; ?></span><br>
                                <span class="font-size-13"><b>Shipper Tel. :</b> <?php echo $row["shipperTel"]; ?></span><br>
                                <span class="font-size-13"><b>Shipper Email :</b> <?php echo $row["shipperEmail"]; ?></span>
                              </div>
                           </form>
                          </div>

                          <div class="col">
                            <form class="form">
                            <div class="form-group">
                              <span class="font-size-13"><b>Vehicle Type:</b>  <?php echo $row5["vehicleType"]; ?></span><br>
                              <span class="font-size-13"><b>Number :</b>  <?php echo $row5["number"]; ?></span><br>
                              <span class="font-size-13"><b>Model :</b>  <?php echo $row5["model"]; ?></span><br>
                              <span class="font-size-13"><b>VIN :</b>  <?php echo $row5["vin"]; ?></span>
                              
                            </div>

                          </form>
                          </div>

                          <div class="col">
                            <form class="form">
                            <div class="form-group">
                               <span><b>Load Weight</b>  <?php echo $row["weight"]; ?></span><br>
                              <span><b>Number :</b>  <?php echo $row5["number"]; ?></span><br>
                              <span><b>Model :</b>  <?php echo $row5["model"]; ?></span><br>
                              <span><b>VIN :</b>  <?php echo $row5["vin"]; ?></span><br>

                              <span class="font-size-13"><b>Lay-Over :</b>  <?php echo $row_expenses["layover"]; ?></span><br>
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
                          
                        </div>

                      </div>
                  </div>

                  

                <div class="container">
                    <div class="row">
                      
                      <div class="col">
                        <div class="row">
                          <div class="col-md-6">
                             
                                <table id="DriverAvailable2" class="table font-size-13">
                                  <h4 class="form-control bg-info bold font-size-13">PICKUPS</h4>
                                   <thead class="font-size-11 text-black">
                                  <tr>
                                  
                                   <th>Name</th>
                                    <th>Date/Time</th>
                                    <th>City/State Zip</th>
                                    <th>Status</th>
                              
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
                                  <td>  
                                           <?php 
                                       if($row_pickups["pickedStatus"] == 2)
                                      echo "<small class='badge badge-success'>Picked</small>";
                                     elseif($row_pickups["pickedStatus"] == 4)
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
                                      <th>Status</th>
                              
                                  </tr>
                                  </thead>
                              <tbody>
                                  <?php
                                 $sql_drops = "SELECT * FROM drops WHERE drops.load_id = '".$id."' ";
                                      $query_drops = mysqli_query($conn, $sql_drops) or die(mysqli_error($conn));
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
                                       <td>  
                               <?php 
                                       if($row_drops["status"] == 3)
                                      echo "<small class='badge badge-success'>Delivered</small>";
                                     elseif($row_drops["status"] == 4)
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
                              </table>
                          </div>
                        </div>
                      </div>
                    </div>
                <!-- /.card-body -->
              <div class="modal-footer" style="padding-bottom: 50px;">
                  <a href="load_reports_print.php?loadID=<?php echo $id; ?>" class="btn btn-warning no-print"><i class="fa fa-print no-print"></i> Print</a>
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

<div class="footer fixed-bottom">
<!-- Footer -->
<footer class="bg-dark text-center text-white footer">
  <!-- Copyright -->
  <div class="text-center p-3">
   <strong>Copyright &copy; 2022 - <?php echo date("Y");?> <a class="text-white" href="https://www.lgtilogistics.com"> LGTI Logistics</a></strong>.
    All rights reserved.
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</div>

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
</body>
</html>
