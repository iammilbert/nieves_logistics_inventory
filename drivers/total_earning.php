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
  <strong><a class="navbar-brand" href="#"><span class="name bold"><?php echo $row2["name"]; ?></span></a></strong>
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
        <a class="nav-link dropdown-toggle bold" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item active" href="total_earning.php">Total Earning</a>
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
        <a class="nav-link bold" href="#"> <span class="sr-only">(current)</span></a>
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
          <div class="col">
              <h5 class="text-center bold text-green">MY PAYMENTS</h5>
                <form class="form" method="POST">
                  <div class="row">
                    <div class="col">
                      
                    </div>
                      <div class="col">
                        <div class="form-group">
                          <label>START</label>
                          <input type="date" name="startDate" class="form-control" placeholder="DD-MM-Y">
                        </div>
                      </div>

                     <div class="col">
                        <div class="form-group text-right">
                        <label>END</label>
                       <input type="date" name="endDate" class="form-control" placeholder="DD-MM-Y">
                      </div>
                    </div>
                    <div class="col"> 

                    </div>
                  </div>

                  <div class="row text-center">
                        <div class="col">
                        <div class="form-group">
                          <input type="submit" name="generate" class="btn btn-primary" value="Generate">
                        </div>
                      </div>
                  </div>
                </form>
            <div class="card card-primary card-outline">
              <div class="card-body">
                <table id="example1" class="table font-size-13">
                  <thead>
                   <tr>
                    <th>S/N</th>
                    <th>PAYMENT RANGE</th>
                    <th>AMOUNT PAID</th>
                    <th>DATE PAID</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;

                  if (isset($_POST["generate"])) {

                        $startDate = $_POST['startDate'];
                        $endDate = $_POST['endDate'];

                        $start = date('d-m-Y', strtotime($startDate));
                        $end = date('d-m-Y', strtotime($endDate));



                       $sql = "SELECT wages.amountPaid, wages.comment, wages.driver_id, wages.datePaid, wages.timePaid, wages.startDate, wages.endDate, users.id, users.name FROM wages 
                       INNER JOIN users 
                       ON wages.driver_id = users.id WHERE wages.datePaid BETWEEN '".$start."' AND '".$end."' AND wages.driver_id = '".$myID."' ";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                         <td><?php echo $row['startDate']; ?> - <?php echo $row['endDate']; ?></td>
                          <td><?php echo number_format($row['amountPaid'], 2, '.', ','); ?><sup style="color:green; font-weight: bolder;">USD</sup></td>
                         <td><small class="badge badge-info"><?php echo $row['datePaid']; ?> |
                        <?php 
                           $time = $row['timePaid']; 
                           $time_paid = date('h:i a', strtotime($time)); 
                           echo $time_paid; 
                         ?>
                       </td>
                        
                        <td>
                          <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#drivers_all_loads<?php echo $row["id"];?>"><i class="fa fa-eye"></i> Report</a>                         
                        </td>

                      </tr>

                    <?php     
               
                    include 'drivers_all_load_pay_modal_report.php';
                      }
                    }

                     else{

                      $sql = "SELECT wages.amountPaid, wages.comment, wages.driver_id, wages.datePaid, wages.timePaid, wages.startDate, wages.endDate, users.id, users.name FROM wages 
                       INNER JOIN users 
                       ON wages.driver_id = users.id WHERE wages.driver_id = '".$myID."' "; 
                       $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                         <td><?php echo $row['startDate']; ?> - <?php echo $row['endDate']; ?></a></td>
                          <td><?php echo number_format($row['amountPaid'], 2, '.', ','); ?><sup style="color:green; font-weight: bolder;">USD</sup></td>
                         <td><small class="badge badge-info"><?php echo $row['datePaid']; ?> |
                        <b style="color:darkblue;"><?php 
                           $time = $row['timePaid']; 
                           $time_paid = date('h:i a', strtotime($time)); 
                           echo $time_paid; 
                         ?></b></small>
                       </td>
                        
                        <td>
                          <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#drivers_all_loads<?php echo $row["id"];?>"><i class="fa fa-eye"></i> Report</a>                        
                        </td>

                      </tr>

                    <?php 
                    include 'drivers_all_load_pay_modal_report.php';

                    $no++;
                      }
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
