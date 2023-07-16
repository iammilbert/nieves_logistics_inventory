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
            <a class="dropdown-item" href="payout_report.php">Payout</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicle_income.php">Vehicles Income</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item active" href="income_Generated.php">Company Income Generated</a>
          </div>
        </div>
      
    </ul>

    <!-- Right navbar links -->
<?php include 'singnout_edit_profile.php'; ?>

  </nav>
  <!-- /.navbar -->
<?php 

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row["name"];?></b>
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
                <a href="vehicle_income.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Vehicles Income Generated</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="income_Generated.php" class="nav-link active">
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
<?php 
 if (isset($_POST["generate"])) {
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];

            $sql = "SELECT SUM(loads.netPay) AS sum, SUM(loads.rate) AS sum2 FROM loads  
            INNER JOIN loads_assigned 
            ON loads_assigned.load_id = loads.id WHERE loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $row = mysqli_fetch_assoc($query);
    }
    else{

      $sql = "SELECT SUM(loads.netPay) AS sum, SUM(loads.rate) AS sum2 FROM loads 
            INNER JOIN loads_assigned 
            ON loads_assigned.load_id = loads.id";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $row = mysqli_fetch_assoc($query); 
        } 
  ?>
  
  
  
  
<?php 

            $sqls = "SELECT SUM(loads.netPay) AS sums, SUM(loads.rate) AS sums2 FROM loads";
            $querys = mysqli_query($conn, $sqls) or die(mysqli_error($conn));
            $rows = mysqli_fetch_assoc($querys);

if (isset($_POST["update"])) {
  $months = $_POST['[months']; 

  $sql_ = "SELECT SUM(staff_salaries.amount) AS _sum FROM staff_salaries WHERE staff_salaries.months = '".$months."'";
       $query_ = mysqli_query($conn, $sql_);
       $row_ = mysqli_fetch_assoc($query_); 
       
}
else{
      $sql_ = "SELECT SUM(staff_salaries.amount) AS _sum FROM staff_salaries";
       $query_ = mysqli_query($conn, $sql_);
       $row_ = mysqli_fetch_assoc($query_);
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
     
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- New row -->
          <div class="row">
          <div class="col">
              <h5 class="text-center text-danger bold">Specify Date Range</h5>
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
                          <input type="submit" name="generate" class="btn btn-primary" value="Get Report">
                        </div>

                        <div class="form-group">
                          <span class="bold">
                            <?php if (isset($_POST["generate"])) {
                           $startDate2 = $_POST["startDate"];
                           $endDate2 = $_POST["endDate"];
                           $date = strtotime($startDate2); 
                           echo date('l jS F Y', $date); ?> - <?php $date2 = strtotime($endDate2); echo date('l jS F Y', $date2); 
                         }
                           ?>
    
                          </span>
                        </div>
                      </div>
                  </div>
                </form>
            <div class="card card-primary card-outline">        
              <div class="card-body">
                <form class="form">

                  <div class="row">
                    <div class="col">
                      <div class="form-group text-center">
                        <h1><u>Company Income Genereated</u></h1>
                      </div>

                      <div class="form-group text-center">
                        <h1><i class="fa fa-arrow-down text-danger"></i></h1>
                      </div>

                      <div class="form-group text-center">
                        <h1 class="font-size-50">
                      <?php
                        $earns = $row["sum2"] - $row["sum"]; 
                        echo number_format($earns, 2, '.', ','); ?> <sup class="bold text-green">USD</sup></h1>
                      </div>
                    </div>
                  </div>
                </form>
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
            <div class="card card-danger card-outline">
              <div class="card-header bg-info">
                <h1 class="card-title text-white bold">Income Generated After Salaries And Expenses</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body" action="income_Generated.php">
                <form method="POST">
                <div class="row">
                  <div class="col">
                    
                  </div>

                  <div class="col">
                    <div class="input-group mb-3">
                        <label for="month" class="input-group-text">Month</label>
                        <input type="month" class="form-control" name="months">
                        <input type="submit" name="update" class="btn btn-primary bg-info input-group-text" value="Fetch">
                    </div>
                  </div>

                  <div class="col">
                    
                  </div>

                </div>

                  <div class="row">
                    <div class="col">
                      <div class="form-group text-center">
                        <h1><u>After Salaries And Expenses</u></h1>
                      </div>

                      <div class="form-group text-center">
                        <h1><i class="fa fa-arrow-down text-danger"></i></h1>
                      </div>

                      <div class="form-group text-center">
                        <h1 class="font-size-50">
                          <?php
                          $earnss = $rows["sums2"] - $rows["sums"];
                        $final = $earnss - $row_["_sum"]; echo number_format($final, 2, '.', ','); ?> <sup class="bold text-green">USD</sup></h1>
                      </div>
                    </div>
                  </div>

            </form> 
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