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
  <strong><a class="navbar-brand name bold" href="index.php"><?php echo $row2["name"];?> </a></strong>
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
        <a class="nav-link dropdown-toggle bold" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> REPORT
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
         <div class="row"><!-- New row -->
            <div class="col card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title bold text-danger">EDITING PROFILE</h3>
              </div>
              <div class="card-body">
              <form method="POST" method="POST" action="update_Profile.php">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      
                      <div class="form-group">
                        <label for="name">Staff Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Staff Name" required="name" value="<?php echo $row["name"]; ?>" />

                        <input type="hidden" name="myID" class="form-control" value="<?php echo $myID; ?>" />
                      </div>

                      <div class="form-group">
                        <label for="tel">TELEPHONE</label>
                        <input type="tel" name="tel" class="form-control" placeholder="Enter Staff Phone number" required="tel" value="<?php echo $row["tel"]; ?>" />
                      </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter Email" required="email" value="<?php echo $row["email"]; ?>" />
                        </div>

                  
            <?php 
                $sql2 = "SELECT SUM(wages.amountPaid) AS sum2 FROM wages WHERE wages.driver_id = '".$row["id"]."'";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
              ?>

                   <?php 
                $sql3 = "SELECT SUM(drivers_pay_roll.netPay) AS sum3 FROM drivers_pay_roll WHERE drivers_pay_roll.driver_id = '".$row["id"]."' AND drivers_pay_roll.paymentStatus = 0";
                $query3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($query3);
              ?>

                  <?php 
                $sql4 = "SELECT COUNT(pickups.id) AS sum4 FROM pickups WHERE pickups.driver_id = '".$row["id"]."'";
                $query4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_assoc($query4);
              ?>


                        <div class="form-group">
                            <label>Total Pickups</label>
                            <input type="text" name="pickups" class="form-control" value="<?php echo $row4["sum4"]; ?>" disabled>       
                        </div>

                        <div class="form-group">
                             <label>Current Balance</label>
                             <input type="text" name="balance" class="form-control" value="<?php echo number_format($row3["sum3"], 2, '.', ',');?>" disabled>         
                        </div>

                        <div class="form-group">
                            <label>Total Income</label>
                            <input type="text" name="balance" class="form-control" value="<?php echo number_format($row2["sum2"], 2, '.', ',');?>" disabled>          
                        </div>
                  
                    </div>

                  <div class="col-md-6">

                    
                         <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="form-control" placeholder="Enter Address"required="address" value="<?php echo $row["address"]; ?>" />
                        </div>

                        
                        <div class="form-group">
                          <label for="licenseID">License ID</label>
                          <input type="text" name="licenseID" class="form-control" id="licenseID" placeholder="Enter Staff License ID" value="<?php echo $row["licenseID"]; ?>" />
                        </div>


                         <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" name="password" class="form-control" id="password" placeholder="Enter password" value="<?php echo $row["password"]; ?>" />
                        </div>

        

                    <div class="form-group">
                      <label for="password">Account Number</label>
                      <input type="number" name="accountNumber" class="form-control" placeholder="Enter Account number" required="accountNumber" value="<?php echo $row["accountNumber"]; ?>" />
                    </div>


                            <div class="form-group">
                               <label>Enter Bank Name</label>
                               <input type="text" placeholder="Enter Bank Name" name="bankName" class="form-control" value="<?php echo $row["bankName"]; ?>">
                             </div>
  
                    <div class="form-group">
                      <label for="accountName">Account Name</label>
                      <input type="text" name="accountName" class="form-control" placeholder="Enter Account name" required="accountName" value="<?php echo $row["accountName"]; ?>" />
                    </div>

                    </div> 
                  </div>
                 
                </div>
             <!-- /.card-body -->
              <div class="modal-footer justify-content-between">
                <a href="profile.php" class="btn btn-danger">Back</a>
                <a href="editProfile_.php" class="btn btn-success">Change Profile Picture</a>
                 
                   <button type="submit" class="btn btn-outline-light btn-primary" name="update">Submit</button>
              </div>
              </form>
              </div>
             
            </div>
          </div>
        </div> <!-- end of new row -->
      </div>
    </section>


<!-- Footer -->
<footer class="bg-dark text-center text-white">
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
        $(document).ready(function () {

            $('.syncbtn').on('click', function () {

                $('#syncmodal').modal('show');

            });
        });
    </script>

</body>
</html>
