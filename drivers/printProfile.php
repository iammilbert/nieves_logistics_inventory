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
 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row2 = mysqli_fetch_assoc($query);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand" href="#"><span class="name bold"><?php echo $row2["name"];?></span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link bold" href="index.php">HOME</a>
      </li>
     
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item" href="due_payment.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="payment_report.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="payment_report.php">Loads Paid</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> PAY ROLL
        </a>
        <div class="dropdown-menu" aria-labelledby="workload">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
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
        <a class="nav-link" href="#"  style="font-weight:bolder;"> <span class="sr-only">(current)</span></a>
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

<?php 
$myID = $_SESSION["ID"];
  $sql = "SELECT * FROM users WHERE users.id = '".$myID."'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);
?>
  <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   <!-- Small boxes (Stat box) -->
            <div class="row">

          <div class="col-md-2">
            
          </div>
          <div class="col">
               <?php 
                $sql = "SELECT * FROM users WHERE users.id = '".$myID."'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>

              <?php 
                $sql1 = "SELECT COUNT(loads.id) AS sum FROM loads WHERE loads.driver_id = '".$myID."' AND loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops = loads.totalLoadDropped";
                $query1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($query1);
              ?>

               <?php 
                $sql2 = "SELECT SUM(wages.amountPaid) AS sum2 FROM wages WHERE wages.driver_id = '".$myID."'";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
              ?>

               <?php 
                $sql3 = "SELECT SUM(drivers_pay_roll.netPay) AS sum3 FROM drivers_pay_roll WHERE drivers_pay_roll.driver_id = '".$myID."' AND drivers_pay_roll.paymentStatus = 0";
                $query3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($query3);
              ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../picture/<?=$row['picture']?>"
                       alt="User profile picture" style="height: 89px;">
                </div>
                <h3 class="profile-username text-center"><b><?php echo $row["name"]; ?></b></h3>
                <p class="profile-username text-center font-size-13 bold"><i class="fas fa-map-marker-alt mr-1 text-danger"></i><?php echo $row["address"]; ?></p>

                <p class="text-muted text-center"><?php echo $row["role"]; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item"><b>Total Pickups</b> <a class="float-right"><?php echo $row1["sum"]; ?></a></li>
                      <li class="list-group-item"><b>Current Balance</b> <a class="float-right"><?php echo number_format($row3["sum3"], 2, '.', ','); ?> <b class="text-green">USD</b></a></li>

                   <li class="list-group-item"> 
                    <b>Total Income</b> <a class="float-right"><?php echo number_format($row2["sum2"], 2, '.', ','); ?> <b class="text-green">USD</b></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bank Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-building mr-1"></i> Bank Name</strong>

                <p class="text-muted">
                 <?php echo $row["bankName"]; ?>
                </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Account Number</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?php echo $row["accountNumber"]; ?></span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Account Name</strong>

                <p class="text-muted"><?php echo $row["accountName"]; ?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal-footer">
              <a href="printProfile.php" class="btn btn-sm btn-primary"> <i class="fa fa-print"></i> Print</a>
            </div>
           

            
          </div>
          <!-- /.col -->
        <div class="col-md-2">
          
        </div>
      </div>
      </div>
    </section>


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
</body>
</html>
