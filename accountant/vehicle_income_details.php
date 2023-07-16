<?php 
include 'expiredSession.php';
?>


<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
      <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="font-weight:bolder;">
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
            <a class="dropdown-item " href="payrollPaid.php">Successful Payment</a>
          </div>
        </div>

        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLinkReport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            REPORT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkReport">
            <a class="dropdown-item" href="registered_Expenditures.php">Expenditures</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item active" href="payout_report.php">Payout</a>
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

 $sql1 = "SELECT * FROM companyinfo"; 
 $query1 = mysqli_query($conn, $sql1); 
 $row1 = mysqli_fetch_assoc($query1);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="text-green bold"><?php echo $row1["name"]; ?></b>
        </span>
    </a>

       <!-- Sidebar -->
     <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="vehicle_income.php" class="nav-link active">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
     
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
              <h5 class="text-center"><b class="text-danger">Specify Date Range</b></h5>
                <form class="form" method="POST">
                  <div class="row">
                    <div class="col">
                      
                    </div>
                      <div class="col">
                        <div class="form-group">
                          <label>START</label>
                          <input type="date" name="startDate" class="form-control" required="startDate">
                        </div>
                      </div>

                     <div class="col">
                        <div class="form-group text-right">
                        <label>END</label>
                        <input type="date" name="endDate" class="form-control" required="endDate">
                      </div>
                    </div>
                    <div class="col"> 

                    </div>
                  </div>

                  <div class="row text-center">
                        <div class="col">
                        <div class="form-group">
                          <input type="submit" name="generate" class="btn btn-primary" value="Fetch Report">
                        </div>
                      </div>
                  </div>
                </form>
            <div class="card card-primary card-outline">
              <div class="card-body">
                <table id="example1" class="table font-size-13">
                  <thead>
                   <tr>
                    <th>RATE CON</th>
                    <th>RATE</th>
                    <th>EARNING</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                     $vehicleID  = isset($_GET['vehicleID']) ? $_GET['vehicleID'] : '';

                  if (isset($_POST["generate"])) {
                        $startDate = $_POST['startDate'];
                        $endDate = $_POST['endDate'];                  

                      $sql="SELECT loads.rateConfirmationID, loads.rate, loads.netPay, vehicles_assigned.status, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.load_id FROM vehicles_assigned
                      INNER JOIN loads 
                      ON vehicles_assigned.load_id = loads.id 
                      WHERE vehicles_assigned.truck = '".$vehicleID."' AND vehicles_assigned.dropped_Date BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.trailer = '".$vehicleID."' AND vehicles_assigned.dropped_Date BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.tractor = '".$vehicleID."' AND vehicles_assigned.dropped_Date BETWEEN '".$startDate."' AND '".$endDate."'";

                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row['rateConfirmationID']; ?></td>
                        <td><?php echo $row['rate']; ?></td>
                        <td class="bold"><?php $earns = $row["rate"] - $row["netPay"]; echo $earns; ?><sup class="text-green">USD</sup></td>
         

                      </tr>

                    <?php                      
              
                      }
                    }

                     else{
                      $sql="SELECT loads.rateConfirmationID, loads.rate, loads.netPay, vehicles_assigned.status, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.load_id FROM loads
                      INNER JOIN vehicles_assigned 
                      ON vehicles_assigned.load_id = loads.id WHERE vehicles_assigned.tractor = '".$vehicleID."' OR vehicles_assigned.trailer = '".$vehicleID."' OR vehicles_assigned.truck = '".$vehicleID."' ";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row2 = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row2['rateConfirmationID']; ?></td>
                        <td><?php echo $row2['rate']; ?></td>

                        <td class="bold"><?php $earns = $row2["rate"] - $row2["netPay"]; echo $earns; ?><sup class="text-green">USD</sup></td> 
                      </tr>

                    <?php                      
              
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

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="modal-header">   
              <?php  
                  $vehicleID  = isset($_GET['vehicleID']) ? $_GET['vehicleID'] : ''; 
                  $sql2 = "SELECT SUM(loads.netPay) AS sum, SUM(loads.rate) AS sum2, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor FROM loads 
                      INNER JOIN vehicles_assigned 
                      ON vehicles_assigned.load_id = loads.id WHERE vehicles_assigned.tractor = '".$vehicleID."' OR vehicles_assigned.trailer = '".$vehicleID."' OR vehicles_assigned.truck = '".$vehicleID."' ";
                      $query2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_assoc($query2);

                      $earnin = $row2["sum2"] - $row2["sum"];
                ?>      
              </div>
              <div class="card-body">
                 <p class="font-size-20 bold text-center text-danger"><b>GRAND TOTAL GENERATED TILL DATE</b> </p>
                    <p class="text-center font-size-20"><?php echo number_format($earnin, 2, '.', ','); ?><sup class="bold text-green">USD</sup></p>

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
  </div>
  <!-- /.content-wrapper -->

<?php include('../footer.php'); ?>
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

</body>
</html>
''