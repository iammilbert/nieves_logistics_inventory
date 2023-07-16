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
            <a class="dropdown-item" href="load.php">Register/Assigned Load</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item active" href="assigned_load.php">Load Assigned</a>
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
            <a class="dropdown-item" href="due_payment.php">Due Payment</a>
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
            <a class="dropdown-item" href="registered_staff.php">Registered Staff</a>
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
            <a class="dropdown-item" href="vehicle_income.php">Vehicles Income</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="income_Generated.php">Company Income Generated</a>
          </div>
        </div>
      
    </ul>

    <!-- Right navbar links -->
<?php include 'singnout_edit_profile.php'; ?>

  </nav>

  <?php 
 $sql1 = "SELECT * FROM companyinfo"; 
 $query1 = mysqli_query($conn, $sql1); 
 $row1 = mysqli_fetch_assoc($query1);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

<span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row1["name"];?></span></b>
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


           <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                PAY-OUT
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
            </ul>
          </li>


         <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="vehicle_workload.php" class="nav-link active">
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
    <p></p>
<?php 
   if (isset($_POST['view'])) { 
    $startDate = $_POST['startDate']; 
    $endDate = $_POST['endDate']; 
    $id = $_POST['id']; 

          $sql_sum = "SELECT loads.driver_id, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.date_assigned, SUM(drivers_pay_roll.netPay) AS sum, users.name, SUM(loads.rate) AS sum2, COUNT(loads.id) AS count,  loads_assigned.assignedBy, loads.dropped_Date, loads.rateConfirmationID FROM loads 
  
            INNER JOIN vehicles_assigned
            ON vehicles_assigned.load_id = loads.id 

            INNER JOIN drivers_pay_roll 
            ON drivers_pay_roll.load_id = loads.id 

            INNER JOIN loads_assigned 
            ON loads_assigned.load_id = loads.id 

            INNER JOIN users 
            ON loads.driver_id = users.id 

            WHERE vehicles_assigned.truck = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.trailer = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.tractor = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";

    $query_sum = mysqli_query($conn, $sql_sum) or die(mysqli_error($conn)); 
    $id_row = mysqli_fetch_assoc($query_sum);

    } 
  
?>


<?php  

          $sql_sum_grand = "SELECT loads.driver_id, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.date_assigned, SUM(drivers_pay_roll.netPay) AS sum, SUM(loads.rate) AS sum2, users.name, loads_assigned.assignedBy, loads.rateConfirmationID FROM loads 
  
            INNER JOIN vehicles_assigned
            ON vehicles_assigned.load_id = loads.id 

            INNER JOIN drivers_pay_roll 
            ON drivers_pay_roll.load_id = loads.id 

            INNER JOIN loads_assigned 
            ON loads_assigned.load_id = loads.id 

            INNER JOIN users 
            ON loads.driver_id = users.id 

            WHERE vehicles_assigned.truck = '".$id."' AND loads.paymentStatus = 1 OR vehicles_assigned.trailer = '".$id."' AND loads.paymentStatus = 1 OR vehicles_assigned.tractor = '".$id."' AND loads.paymentStatus = 1";

    $query_grand = mysqli_query($conn, $sql_sum_grand) or die(mysqli_error($conn)); 
    $grand_row = mysqli_fetch_assoc($query_grand); 
  
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"><!-- New container --> 

          <div class="row"><!-- New row --> 
            <div class="col"> <!-- New col --> 
              <div class="card card"> <!-- New card --> 
                 <div class="card-header">
                  <h3 class="card-title"><b>VEHICLE <emp class="text-primary"><?php echo $id; ?></emp> REPORT FROM</b>  <small class="badge badge-warning"><?php $start = $_POST['startDate']; echo DateTime::createFromFormat('Y-m-d', $start)->format('l jS F Y');?></small> - <small class="badge badge-success"><?php $end = $_POST['endDate']; echo DateTime::createFromFormat('Y-m-d', $end)->format('l jS F Y'); ?></small></h3>
                </div>
                <div class="card-body"><!-- New body --> 
                  <table id="example2" class="table" style="font-size:14px;">
                   <thead>
                     <tr>
                    <th>S/N</th>
                    <th>RATE CON.</th>
                    <th>DRIVER'S NAME</th>
                    <th>RATES</th>
                    <th>DRIVER'S PAY</th>
                    <th>EARNING</th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $no = 1; 

                    if (isset($_POST['view'])) {
                      $startDate = $_POST['startDate'];
                      $endDate = $_POST['endDate'];
                      $id = $_POST['id'];

                    $sql = "SELECT loads.driver_id, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.date_assigned, drivers_pay_roll.netPay, users.name, loads.rate, loads_assigned.assignedBy, loads.dropped_Date, loads.rateConfirmationID FROM loads 
                    INNER JOIN vehicles_assigned
                    ON vehicles_assigned.load_id = loads.id 

                    INNER JOIN drivers_pay_roll
                    ON drivers_pay_roll.load_id = loads.id

                    INNER JOIN loads_assigned
                    ON loads_assigned.load_id = loads.id 

                    INNER JOIN users 
                    ON loads.driver_id = users.id 

                    WHERE vehicles_assigned.truck = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.trailer = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.tractor = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";

                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>

                    <td><?php echo $row['name']?> <small class="badge badge-info"><?php echo $row['driver_id']?></small></td> 

                    <td>$<?php echo $row['rate']?></td>
                    <td>$<?php echo $row['netPay']?></td>
                    <td style="font-weight:bolder;">
                    <?php  
                    $earn = $row["rate"] - $row["netPay"]; 
                    echo $earn; ?> <sup style="font-weight:bolder; color:green">USD</sup>
                      
                    </td>


                  </tr>

                  <?php 
                  $no++;

                }
              }

                ?>

                
                  </tbody>
                  
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  <th>SUM TOTAL</th> 
                  <th><h3 class="badge badge-success">$<?php $earning = $id_row["sum2"] - $id_row["sum"]; echo round($earning, 2);?><sup>USD</sup></h3></th>
                  </tr>
                </tfoot>
                </table>                   
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div> <!-- /.col -->
        </div><!-- End row --> 




             <div class="row"> <!-- New row --> 

            <div class="col"><!-- New Col --> 
              <form class="form" action="drivers_weekly_payroll.php" method="POST"><!-- New Form --> 
                <div class="card-body"><!-- Card --> 

                  <div class="row"> 
                    <div class="col-md-3">
                      
                    </div>
                  
                      <p></p>



                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                          <div class="form-group">
                             <label class="font-size-24 text-center text-danger"><b>GRAND TOTAL GENERATED</b></label>
                              <input style="text-align: right; border-style:none;" class="form-control font-size-30 bold text-center" type="text" name="grandTotal" value="<?php $grand = $grand_row["sum2"] - $grand_row["sum"]; echo number_format($grand, 2, '.', ',');?> USD" readonly>
                          </div>
                        </div>
            
                         </div>

                        <div class="input-group mb-3">
                        <a class="btn btn-danger btn-lg" href="vehicle_workload.php"> << Back</a>
                      </div>

                  </div>

                  <div class="col-md-3">
                      
                  </div>
                  </div>

                </div>

            </form>
          </div> 

            </div><!--/ End row --> 


          </div> <!-- /.container fluid -->
        </section><!-- /.content --> 
      </div><!-- /.content-wrapper -->

<?php include('../footer.php'); ?>
<script src="../plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      "header":true,
      "footer": true,
    });

 //Initialize Select2 Elements
    $('.select2').select2()

 //Initialize Select2 Elements
       $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
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




