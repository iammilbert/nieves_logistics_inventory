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
 $row2 = mysqli_fetch_assoc($query);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand" href="#"><span class="name"><?php echo $row2["name"]; ?></span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link bold" href="index.php">HOME</a>
      </li>
     
    <li class="nav-item dropdown bold">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown bold">
        <a class="nav-link dropdown-toggle bold" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> REPORT
        </a>
        <div class="dropdown-menu bold" aria-labelledby="workload">
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
        <a class="nav-link bold" href="#"> <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown bold ">
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

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
        <div class="row"> <!-- Start row -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Loads Assigned</span>
                <?php 
                   $sql = "SELECT COUNT(loads.id) AS sum FROM loads WHERE loads.totalDrops > loads.totalLoadDropped AND loads.driver_id = '".$myID."' || loads.totalPickups > loads.totalLoadPicked AND loads.driver_id = '".$myID."' "; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                <span class="info-box-number text-info"><?php echo  $id_row['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-warehouse"></i></span>

              <div class="info-box-content">
                <span class="info-box-text bold">Load Delivered</span>
                <?php 
                  $sql_load = "SELECT COUNT(loads.id) AS load_sum FROM loads WHERE loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops = loads.totalLoadDropped AND loads.driver_id = '".$myID."' AND loads.pickedupTime != 0 AND loads.droppedTime != 0";
                   $query_load = mysqli_query($conn, $sql_load) or die(mysqli_error($conn));
                ?>
                   <?php while ($load_row = mysqli_fetch_assoc($query_load)): ?> 
                <span class="info-box-number text-danger"><?php echo  $load_row['load_sum']; ?></span>
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
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text bold">Current Balance</span>
               <?php 
                   $sql_netPay = "SELECT SUM(loads.netPay) AS netPay_sum FROM loads WHERE loads.totalDrops = loads.totalLoadDropped AND loads.totalPickups = loads.totalLoadPicked AND loads.paymentStatus = 0 AND loads.driver_id = '".$myID."' "; 
                   $query_netPay = mysqli_query($conn, $sql_netPay) or die(mysqli_error($conn));
                ?>
                   <?php while ($netPay_row = mysqli_fetch_assoc($query_netPay)): ?> 
                <span class="info-box-number text-green"><?php echo number_format($netPay_row["netPay_sum"], 2, '.', ','); ?><b style="color: green;"> USD</b></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-money-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text bold">Total Cashout</span>
               <?php 
                   $sql_netPay = "SELECT SUM(loads.netPay) AS netPay_sum FROM loads WHERE loads.totalDrops = loads.totalLoadDropped AND loads.totalPickups = loads.totalLoadPicked AND loads.paymentStatus = 1 AND loads.driver_id = '".$myID."' "; 
                   $query_netPay = mysqli_query($conn, $sql_netPay) or die(mysqli_error($conn));
                ?>
                   <?php while ($netPay_row = mysqli_fetch_assoc($query_netPay)): ?> 
                <span class="info-box-number start_count"><?php echo number_format($netPay_row["netPay_sum"], 2, '.', ','); ?><b style="color: green;"> USD</b></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->

         <div class="row"><!-- New row -->

            <div class="col card-body">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title bold text-danger">MY CURRENT LOAD</h3>
              </div>
          <div class="card-body">

                       <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>

               <table id="example1" class="table font-size-13">
                  <thead>
                  <tr> 
                    <th>RATE CON.</th>
                    <th class="text-center">REG. PICKUPS <i class="fa fa-minus"></i> REG. DROPS</th>
                    <th class="text-center">PICKED <i class="fa fa-minus"></i> DROPPEDS</th>
                    <th>STATUS</th>
                    <th></th>
                  </tr>
                  </thead>
                     <tbody>
                    <?php

                  $sql = "SELECT loads_assigned.driver_id, loads.brokerName, loads_assigned.id, loads_assigned.load_id, loads.brokerNumber, loads.shipperEmail, loads.shipperAddress, loads.totalPickups, loads.totalDrops, loads.totalLoadPicked, loads.totalLoadDropped, loads_assigned.id AS loadAssignedID, loads.rateConfirmationID, users.name, loads_assigned.status, users.licenseID, loads.rate FROM loads
                    INNER JOIN users
                  ON loads.driver_id = users.id
                   INNER JOIN loads_assigned
                  ON loads_assigned.load_id = loads.id WHERE loads.totalLoadDropped < loads.totalDrops AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalPickups > loads.totalLoadPicked AND loads.totalDrops > loads.totalLoadDropped AND loads_assigned.driver_id = '".$myID."'";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                      ?>
                      <tr>
                         <td><?php echo $row['rateConfirmationID']; ?></td>
                           <td class="text-center"><?php echo $row['totalPickups']; ?> <i class="fa fa-minus"></i> <?php echo $row['totalDrops']; ?></td> 
                         
                         <td class="text-center"><?php echo $row["totalLoadPicked"]; ?> <i class="fa fa-minus"></i> <?php echo $row["totalLoadDropped"]; ?></td> 

                                               
                       <td><?php 
                      if($row["totalLoadDropped"] == 0 && $row["totalLoadPicked"] == 0)
                        echo "<small class='badge badge-primary'>Waiting for Pickup</small>";
                         elseif($row["totalLoadPicked"] > 0 && $row["totalPickups"] > $row["totalLoadPicked"])
                        echo "<small class='badge badge-info'>Active</small>";
                       elseif($row["totalPickups"] > $row["totalLoadPicked"] || $row["totalDrops"] > $row["totalLoadDropped"])
                        echo "<small class='badge badge-primary'>Active</small>";
                        elseif($row["totalLoadDropped"] == $row["totalDrops"] && $row["totalLoadPicked"] == $row["totalPickups"])  
                         echo "<small class='badge badge-success'>Delivered</small> ";
                        elseif($row["status"] == 4) 
                        echo "<small class='badge badge-warning'>Cancelled</small>";
                        elseif($row["status"] == 5) 
                        echo "<small class='badge badge-danger'>Not Delivered</small>";
                        elseif($row["status"] == 0) 
                        echo "<small class='badge badge-warning'>Pending</small>";
                      ?></td>

                  <td>
                    <?php  

                    if($row["totalLoadPicked"] > 0 && $row["totalPickups"] > $row["totalLoadPicked"])  

                       echo "<a class='btn btn-sm btn-primary' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><small><i class='fa fa-plus'></i> Pick/Drop</small></a>";


                    elseif($row['status']== 4)  

                        echo "<a href=load_delivered_receipt.php?id=".$row['load_id']." class='btn btn-sm btn-primary'><i class='fa fa-eye'></i></</a>";

                      elseif($row["totalPickups"] > $row["totalLoadPicked"] || $row["totalDrops"] > $row["totalLoadDropped"])  

                        echo "<a title='pick/drop load' class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><i class='fa fa-plus' style='color:white;'> Pick/Drop</i></a>";


                      elseif($row['status']== 5 )  

                       echo "<a href=load_delivered_receipt.php?id=".$row['load_id']." class='btn btn-sm btn-info'><i class='fa fa-eye'></i></</a>"; 

                      elseif($row["totalLoadDropped"] == 0 && $row["totalLoadPicked"] == 0)  

                        echo "<a class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><small><i class='fa fa-plus'></i> Pick/Drop</small></a>"; 


                      elseif($row["totalLoadDropped"] == $row["totalDrops"] && $row["totalLoadPicked"] == $row["totalPickups"])  

                        echo "<a title='view picked/dropped load' class='btn btn-sm btn-info' data-toggle='modal' data-target='#delivered_modal{$row["load_id"]}'><i class='fa fa-eye'></i></a>"; 


                    ?> 

                     <a href="load_Details.php?loadID=<?php echo $row["load_id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                        </td>

                      </tr>

                    <?php   
                       include 'pickLoad_dropLoad.php'; 
                       include 'pickLoad_dropLoad_delivered.php';                
              
                      }
                      

                    ?>
              
                  </tbody>
                </table>
              </div>
             
            </div>
          </div>
        </div> <!-- end of new row -->
        </div> <!-- end of new row -->
        
                 
      </div>
    </section>




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
      "responsive": true, "lengthChange": true, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print"]
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

</body>
</html>
