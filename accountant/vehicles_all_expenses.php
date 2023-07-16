<?php 
include 'expiredSession.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title class="center">Registered Vehicles </title>


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
<!-- Navbar -->
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
            <a class="dropdown-item active" href="vehicle_income.php">Vehicles Income</a>
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

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row4 = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="text-green bold"><?php echo $row4["name"]; ?></b>
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
                <a href="registered_Expenditures.php" class="nav-link active">
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
          <div class="col-sm-6 ml-auto">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="registered_Expenditures.php" class="text-danger">Back</a></li>
              <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <div class="row"> <!-- Start row -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">

              <div class="info-box-content">
               <label class="info-box-text">LAST MONTH</label>
                <?php 
                 $newDate = date('Y-m-d', strtotime('-1 month'));
                 $newDate2 = date('Y-m', strtotime('-1 month'));
                 $truck = "Truck";
                 $trailer = "Trailer";
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.dateSpent < '".$newDate."' AND expenses.vehicleType = '".$truck."' OR expenses.dateSpent < '".$newDate."' AND expenses.vehicleType = '".$trailer."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                   <span class="start_count"><b class="text-green">USD</b> <?php echo  $id_row['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <div class="info-box-content">
                <label class="info-box-text">TOTAL EXPENSES</label>
                <?php 
                  $truck = "Truck";
                 $trailer = "Trailer";
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.vehicleType = '".$truck."' OR expenses.vehicleType = '".$trailer."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row2 = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><b class="text-green">USD</b> <?php echo  $id_row2['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
            <div class="info-box-content">
               <label class="info-box-text">TODAY'S EXPENSES</label>
                <?php 
                $truck = "Truck";
                 $trailer = "Trailer";
                 $newDate3 = date('Y-m-d');
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.dateSpent = '".$newDate3."' AND expenses.vehicleType = '".$truck."' OR expenses.dateSpent = '".$newDate3."' AND expenses.vehicleType = '".$trailer."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($today_row = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count">
                <b class="text-green">USD</b> 
                <?php echo $today_row["sum"];
                
                ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->
        
        <div class="row"> <!-- Start row -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
              <div class="col">
                  <a href="vehicle_list.php" class="btn btn-primary"><i class="fa fa-eye"></i> EACH VEHICLE</a>
              </div>
              
              <div class="col">
                  <a href="vehicle_all_expenses_list.php" class="btn btn-primary"><i class="fa fa-eye"></i> ALL EXPENSES</a>
              </div>
              <!-- /.col -->
        </div>
        <!-- /. end row -->
        
        <p></p>
        
        
        
        
<?php 
   $truck = "Truck"; 
   $trailer = "Trailer";
 if (isset($_POST["generate"])) {
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];

            $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.vehicleType = '".$truck."' AND expenses.dateSpent BETWEEN '".$startDate."' AND '".$endDate."' OR expenses.vehicleType = '".$trailer."' AND expenses.dateSpent BETWEEN '".$startDate."' AND '".$endDate."'";   
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $row_exp = mysqli_fetch_assoc($query);
    }
    else{ 
        $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.vehicleType = '".$truck."' OR expenses.vehicleType = '".$trailer."'";  
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $row_exp = mysqli_fetch_assoc($query);
        } 
  ?>
        
     <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                  <h5 class="text-center text-danger bold">Specify Date Range</h5>
                     <form method="POST">
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
                                   echo date('jS F Y', $date); ?> - <?php $date2 = strtotime($endDate2); echo date('jS F Y', $date2); 
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
                        <h3><i class="fa fa-arrow-down text-danger"></i></h3>
                      </div>

                      <div class="form-group text-center">
                        <h3 class="font-size-50">
                      <?php
                        echo number_format($row_exp["sum"], 2, '.', ','); ?> <b class="bold text-green">USD</b></h3>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print"]
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
