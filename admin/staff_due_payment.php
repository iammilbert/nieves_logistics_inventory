<?php  
include 'expiredSession.php';
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title class="center">Payment</title>


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
            <a class="dropdown-item" href="load.php">Register/Assigned Load</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_load.php">Load Assigned</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="active_drivers.php">Active Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
          </div>
        </div>

           <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkPayout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PAY-OUT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkPayout">
            <a class="dropdown-item active" href="due_payment.php">Due Payment</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="payrollPaid.php">Successful Payment</a>
          </div>
        </div>


       <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkVehicles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            VEHICLES
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkVehicles">
            <a class="dropdown-item" href="vehicles.php">Register Vehicle</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_vehicle.php">Assigned Vehicle</a>
            <div class="dropdown-divider"></div>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicle_workload.php">Vehicles Workload</a>
              <div class="dropdown-divider"></div>
          </div>
        </div>

        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLinkUsers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            COMPANY/USERS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkUsers">
            <a class="dropdown-item" href="register_user.php">Register Staff/Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="company_info.php">Company Info</a>

          </div>
        </div>


        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLinkReport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            REPORT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkReport">
            <a class="dropdown-item active" href="registered_staff.php">Registered Staff</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_drivers.php">Registered Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_vehicles.php">Registered Vehicles</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_Load.php"> Registered Loads</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_Shippers.php">Registered Shippers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_Admin.php">Registered Admin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_Expenditures.php">Expenditures</a>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="payout_report.php.php">Pay Out</a>
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
$myID = $_SESSION["id"];
 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

<span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row["name"];?></span></b>
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
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                PICKUPS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="load.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Register/Assigned Load</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assigned_load.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Load Assigned</p>
                </a>
              </li>
  
               <li class="nav-item">
                <a href="active_drivers.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Active Drivers</p>
                </a>
              </li>         
            <li class="nav-item">
                <a href="load_delivered.php" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Pickups Delivered</p>
                </a>
              </li>
            </ul>
          </li>


           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p class="font-size-17 bold">
                PAY-OUT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="due_payment.php" class="nav-link active">
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
            </ul>
          </li>


         <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                VEHICLES
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">         
              <li class="nav-item">
                <a href="vehicles.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Register vehicle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assigned_vehicle.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Vehicles Assigned</p>
                </a>
              </li>  

                <li class="nav-item">
                <a href="vehicle_workload.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Vehicles Workload</p>
                </a>
              </li>              
            </ul>
          </li>


            <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                COMPANY/USERS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="register_user.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Register Staff/Drivers</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="registered_users.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Registered Users</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="company_info.php" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Company Info.</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="inbox.php" class="nav-link">
                  <i class="fa fa-sms nav-icon"></i>
                  <p>Message Inbox</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                REPORT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="registered_staff.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="registered_drivers.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Drivers</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="registered_vehicles.php" class="nav-link">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Registered vehicles</p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="registered_Load.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Registered Loads</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="registered_Shippers.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Shippers</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="registered_Admin.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Admin</p>
                </a>
              </li>
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
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-danger bold">STAFF SALARIES</h3>
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
                    <th>ID</th>
                    <th>NAME</th>
                    <th>TELEPHONE</th>
                    <th>ROLE</th>
                    <th>SALARY </th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $months = date("Y-M");
                      $month = strtotime($months);

                  $sql="SELECT * FROM users WHERE users.role = 'Staff' AND users.lastPaymentMonth != '".$month."' || users.role = 'Despatcher' AND users.lastPaymentMonth != '".$month."' || users.role = 'Accountant' AND users.lastPaymentMonth != '".$month."' || users.role = 'Admin' AND users.lastPaymentMonth != '".$month."'";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                         <td><a class="deletebtn" name="delete font-size-15 bold"><?php echo $row['name']; ?></a></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><small class="badge badge-info"><?php echo $row['role']; ?></small></td>
                        <td><b>NGN</b> <?php echo number_format($row['salary'], 2, '.', ','); ?></td>

                           <td>  
                      <?php 
                       $mon =  $row["lastPaymentMonth"]; 
                       $month1 = strtotime($mon); 
                         if($month1 == $month && $row["payRollStatus"]==1 && $row["lastSalaryStatus"]==1)
                        echo "<button class='btn btn-sm btn-primary' type='button' disabled> <i class='fa fa-check text-danger font-size-20 bold'></i></button> 
                        <a class='btn btn-sm btn-info' href='staff_due_payment_details.php?staffId={$row["id"]}'><i class='fa fa-eye'></i></a>";
                        
                          elseif ($row["payRollStatus"] == 0 && $month1 != $month) {
                          echo "<a class='btn btn-sm btn-success' href='payRollForm.php?staffId={$row["id"]}'><i class='fa fa-edit'></i> Pay Roll</a>  ";

                          } 

                        elseif ($row["payRollStatus"]==1 && $month1 != $month) {
                          echo "<a class='btn btn-sm btn-success' href='staff_due_payment_details.php?staffId={$row["id"]}'>Proceed Payment</a> 

                          <a class='btn btn-sm btn-info' href='staff_due_payment_details.php?staffId={$row["id"]}'><i class='fa fa-eye'></i></a>
                          ";

                          }
                          
                          if($month1 == $month && $row["payRollStatus"]==0 && $row["lastSalaryStatus"]==1)
                        echo "<button class='btn btn-sm btn-primary' type='button' disabled> <i class='fa fa-check text-danger font-size-20 bold'></i></button> 
                        <a class='btn btn-sm btn-info' href='staff_due_payment_details.php?staffId={$row["id"]}'><i class='fa fa-eye'></i></a>";
                          
                          
                      ?>
                         
                      
                      
                    </td>

                      </tr>

                    <?php                      
                    include'staff_pay_modal.php';

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
              <div class="card-header">
                <h3 class="card-title text-green bold"><?php echo date("M-Y"); ?>, SUCCESSFUL PAYMENT</h3>
              </div>
              <div class="card-body">
                <table id="example3" class="table font-size-13">
                  <thead>
                   <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ROLE</th>
                    <th>PAYMENT FOR:</th>
                    <th>DATE/TIME PAID</th>
                    <th>STATUS</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
              
                      $sql="SELECT users.role, users.id, users.salary, staff_salaries.months, staff_salaries.datePaid, staff_salaries.timePaid, staff_salaries.paidBy, staff_salaries.staff_id, users.name, users.role FROM users 
                      INNER JOIN staff_salaries 
                      ON staff_salaries.staff_id = users.id 
                      WHERE users.role = 'Staff' AND staff_salaries.status = 1 OR users.role = 'Despatcher' AND staff_salaries.status = 1 OR users.role = 'Accountant' AND staff_salaries.status = 1 OR users.role = 'Admin' AND staff_salaries.status = 1";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                         <td><?php echo $row['name']; ?></td>
                         <td><?php echo $row['role']; ?></td>
                        <td><b><?php $months = new DateTime($row["months"]); echo $months->format('M-Y'); ?></b></td>
                        <td><?php echo $row['datePaid']; ?> <?php echo $row['timePaid']; ?></td>
                      <td><small class="badge badge-success">PAID</small></td>
                        
                        <td>

                          <a class="btn btn-sm btn-info" href="staff_due_payment_details.php?staffId=<?php echo $row["id"]; ?>"><i class="fa fa-eye"></i></a>

                         
                        </td> 

                      </tr>

                    <?php                      
                    include'staff_pay_modal.php';

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
    $("#example3").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example4').DataTable({
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
