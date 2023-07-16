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
  <strong><a class="navbar-brand" href="#"><?php echo $row2["name"]; ?></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link bold" href="index.php">HOME</a>
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

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item active" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> REPORT
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
        <a class="nav-link font-size-20" href="#"> <span class="sr-only">(current)</span></a>
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
      <div class="container-fluid">
        <div class="row mb-2 card-header">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- New row -->
          <div class="row">
          <div class="col card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title text-green">MY DUE PAYMENT</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table font-size-13">
                    <thead class="text-black">
                    <tr>
                      <th>RATE CON.</th>
                       <th>DATE DELIVERED</th>
                       <th>PAYMENT STATUS</th>
                      <th></th>
                    </tr>
                    </thead>
                </tbody>
                <?php

                  $sql = "SELECT * FROM loads WHERE loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops = loads.totalLoadDropped AND loads.driver_id = '".$myID."' AND loads.paymentStatus = 0 AND loads.pickedupTime != 0 AND loads.droppedTime != 0";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row_complete = mysqli_fetch_assoc($query)){
                    ?>
                      <tr>
                         <td><?php echo $row_complete['rateConfirmationID']; ?></td>
                      <td><?php echo $row_complete['dropped_Date']; ?> 
                        <?php 
                           $date = $row_complete['droppedTime']; 
                           $dropped_Time = date('h:i a', strtotime($date)); 
                           echo $dropped_Time; 
                         ?>
                       </td>

                    <td>  
                      <?php 
                         if($row_complete["paymentStatus"] == 1)
                        echo "<small class='badge badge-success'>PAID </small>";
                        elseif($row_complete["paymentStatus"] == 2)  
                         echo "<small class='badge badge-danger'>On-Hold</small> ";
                       else 
                          echo "<small class='badge badge-danger'>Pending</small>"; 
                      ?>
                    </td>


                        <td>   

                        <a href="load_Details.php?loadID=<?php echo $row_complete["id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                        </td>
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


<div class="footer fixed-bottom">
<!-- Footer -->
<footer class="bg-dark text-center text-white footer">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
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
