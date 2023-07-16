<?php  
include 'expiredSession.php'; 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loads Report</title>
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

<?php 
$myID = $_SESSION["ID"];

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row2 = mysqli_fetch_assoc($query);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand" href="#"><span class="name"><?php $text = $row2["name"]; echo strtok($text, " ");?> INVENTORY</span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse bold" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link bold" href="index.php" >HOME</a>
      </li>
     
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false"> PICKUPS
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
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> REPORT
        </a>
        <div class="dropdown-menu" aria-labelledby="workload">
          <a class="dropdown-item active" href="load_report.php">Loads Report</a>
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
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
<div class="content-header">
  </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="row"><!-- New row -->
            <div class="col card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title"><b class="text-danger">MY LOADS REPORT</b></h3><br>
              </div>
               <div class="card-header">
                <h3 class="card-title"><i class="fa fa-info text-danger"></i> Click on Disptacher Name to view Details.</h3>
              </div>
              <div class="card-body">
                  <table id="example1" class="table font-size-13">
                  <thead>
                  <tr>
                    <th>RATE CON.</th>
                    <th>BOL</th>
                    <th>PAYMENT STATUS</th>
                    <th>BROKER</th>
                    <th>DISPATCHER</th>
                     <th>DELIVERY STATUS</th>
                    <th></th>
                  </tr>
                  </thead>
                     <tbody>
                    <?php
                   $sql = "SELECT * FROM loads WHERE loads.driver_id = '".$myID."' AND loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops = loads.totalLoadDropped AND loads.pickedupTime != 0 AND loads.droppedTime != 0";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($query)){
                      ?>
                      <tr>
                    <td><?php echo $row['rateConfirmationID']; ?></td>
                      <td>  
                      <?php 
                         if($row["bolStatus"]== 1 ){
                        echo "<i><a href='downloads.php?file_id={$row['id']}' target='_blank'> Download BOL</a></i>";
                      }

                         elseif($row["bolStatus"]== 0 ){
                        echo "<small class='badge badge-danger'>Pending</small>";
                      }
                    ?>
                      </td> 

                        <td>  
                      <?php 
                         if($row["paymentStatus"]== 1 ){
                        echo "<small class='badge badge-danger'>Paid</small>";
                      }

                         elseif($row["paymentStatus"]== 0 ){
                        echo "<small class='badge badge-danger'>Pending</small>";
                      }
                    ?>
                      </td>

                         <td><small class="badge badge-success" data-toggle="modal" type="button" data-target="#broker<?php echo $row['id']?>"><?php echo $row['brokerName']?> </small></td>

                         <td class="bold"><small class="badge badge-info" data-toggle="modal" type="button" data-target="#dispatcher<?php echo $row['registeredBy']?>"><?php echo $row['registeredBy']?> </small></td>
                       
                             <td>  
                                <?php 
                                   if($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"] !=0 AND $row["droppedTime"] != 0)
                                  echo "<small class='badge badge-success'>Delivered</small>";

                                elseif($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"] ==0 AND $row["droppedTime"] == 0)
                                  echo "<small class='badge badge-danger'>Cancelled</small>";

                                elseif($row["totalLoadPicked"]== 0 AND $row["totalLoadDropped"]==0 AND $row["status"]== 1)
                                  echo "<small class='badge badge-info'>waiting fOr Pickup</small>"; 

                                elseif($row["totalLoadPicked"] > 0 AND $row["totalLoadDropped"]==0 AND $row["status"]== 1)
                                  echo "<small class='badge badge-primary'>Load Picked</small>"; 
                                ?>
                                </td>
                        <td>
                          <a class="btn btn-sm btn-info" href="load_Details.php?loadID=<?php echo $row["id"]; ?>"><i class="fa fa-eye"></i></a>
                        </td>
                    
                      </tr>

                    <?php 
                    include 'dispatcherInfo.php';
                    include 'brokerInfo.php';                    
                      }

                    ?>
              
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> <!-- end of new row -->
      </div>
    </section>
<div class="footer fixed-bottom">
<!-- Footer -->
<footer class="bg-dark text-center text-white footer">
  <!-- Copyright -->
  <div class="text-center p-3">
   <strong>Copyright &copy; 2022 - <?php echo date("Y");?> <a class="text-white" href="https://<?php echo $row2["website"]; ?>"> LGTI Logistics</a></strong>.
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
