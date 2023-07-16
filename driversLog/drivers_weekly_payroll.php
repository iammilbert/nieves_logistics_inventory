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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"><!-- New container --> 

          <div class="row"><!-- New row --> 
            <div class="col"> <!-- New col --> 
              <div class="card card-danger"> <!-- New card --> 
                 <div class="card-header">
                <h3 class="card-title bold">WEEKLY PAYROLL</h3>
              </div>
                <div class="card-body"><!-- New body --> 
                  <table id="example2" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>S/N</th>
                    <th>RATE CON.</th>
                    <th>DRIVER'S NAME</th>
                    <th>LAY OVER</th>
                    <th>NET PAY</th>
                    <th>PAYMENT STATUS</th>
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

                    $sql = "SELECT drivers_pay_roll.load_id, drivers_pay_roll.driver_id, drivers_pay_roll.netPay, loads.rateConfirmationID, loads.id, loads.paymentStatus, loads.layover, loads.payrollStatus, users.id AS usersID, users.name FROM loads 

                    INNER JOIN drivers_pay_roll
                    ON drivers_pay_roll.load_id = loads.id 
                    INNER JOIN users 
                    ON drivers_pay_roll.driver_id = users.id WHERE loads.paymentStatus = 0 AND loads.driver_id = '".$id."' AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>

                    <td><?php echo $row['name']?></a></td> 
                    <td><small><?php echo  $row["layover"] ?> </small></td>

                    <td>$<?php echo $row['netPay']?></td>

              

                        <td>  
                      <?php 
                         if($row["paymentStatus"] == 1)
                        echo "<small class='badge badge-success'>PAID</small>";
                        elseif($row["paymentStatus"] == 2)  
                         echo "<small class='badge badge-danger'>On-Hold</small> ";
                       else 
                          echo "<small class='badge badge-danger'>Pending</small>"; 
                      ?>
                    </td>

                  </tr>

                  <?php 
                  $no++;

                }
              }

                ?>
                
                  </tbody>
                </table>                   
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div> <!-- /.col -->
        </div><!-- End row --> 

<?php 
  $sql_user = "SELECT * FROM users WHERE users.id = '".$_SESSION['id']."' ";
   $query_user = mysqli_query($conn, $sql_user); 
   $row_user = mysqli_fetch_assoc($query_user);
?>

<?php 
   if (isset($_POST['view'])) { 
    $startDate = $_POST['startDate']; 
    $endDate = $_POST['endDate']; 
    $id = $_POST['id'];

    $sql_sum = "SELECT SUM(drivers_pay_roll.netPay) AS sum, loads.dropped_Date, loads.rateConfirmationID, users.name,  drivers_pay_roll.load_id, drivers_pay_roll.driver_id FROM drivers_pay_roll  
    INNER JOIN loads 
    ON drivers_pay_roll.load_id = loads.id 
    INNER JOIN users 
    ON drivers_pay_roll.driver_id = users.id 
    WHERE drivers_pay_roll.driver_id = '".$id."' AND loads.paymentStatus = 0  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'"; 
    $query_sum = mysqli_query($conn, $sql_sum) or die(mysqli_error($conn)); 
    $id_row = mysqli_fetch_assoc($query_sum); 
  }
?>
                            

          <div class="row"> <!-- New row --> 

            <div class="col"><!-- New Col --> 
              <form class="form" ><!-- New Form --> 
                <div class="card-body"><!-- Card --> 

                  <div class="row"> 
                    <div class="col">
                      <div class="form-group">
                        <label>Verified Amount :</label>
                        <input type="text" name="totalAmount" class="form-control" value="<?php echo number_format($id_row['sum'], 2, '.', ',');?>" disabled>
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>Signature:</label>
                        <input type="text" name="end" class="form-control" value="<?php echo $row_user['name']; ?>" readonly>

                        
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
            <a style="color:white;" class="btn btn-lg btn-success" data-toggle="modal" data-target="#makePayment<?php echo $id_row["driver_id"]; ?>"><small><b>Make Payment</b></small></a>
                  </div>
                </div>
            </form>
          </div> 


<?php 

include 'makePayment.php';
?>

          <div class="col"> 
            <table id="example2" class="table font-size-14"> 
              <thead> 
                <tr> 
                  <th>RATE CON.</th> 
                  <th>NET PAY</th>
                </tr> 
              </thead> 

              <tbody>

                  <?php 

                    $no = 1; 

                    if (isset($_POST['view'])) {
                      $startDate = $_POST['startDate'];
                      $endDate = $_POST['endDate'];
                      $id = $_POST['id'];

                    $sql_summary = "SELECT drivers_pay_roll.load_id, drivers_pay_roll.driver_id, drivers_pay_roll.netPay, loads.rateConfirmationID, loads.id, loads.paymentStatus, loads.payrollStatus, users.id AS usersID, users.name FROM loads 

                    INNER JOIN drivers_pay_roll
                    ON drivers_pay_roll.load_id = loads.id 
                    INNER JOIN users 
                    ON drivers_pay_roll.driver_id = users.id WHERE loads.paymentStatus = 0 AND loads.driver_id = '".$id."' AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";
                  $query_summary = mysqli_query($conn, $sql_summary) or die(mysqli_error($conn));

                  while ($row_summary = mysqli_fetch_assoc($query_summary)){
                    ?>
                  <tr>
                    <td><?php echo $row_summary["rateConfirmationID"]; ?></td> 
                    <td><small class="badge badge-warning">$<?php echo $row_summary['netPay']?></small></td>

                  </tr>


                <?php 
                  $no++;
                }
              }
                ?>
                 <tr> 
                  <th>TOTAL AMOUNT</th> 
                  <th><small class="badge badge-info h1 font-size-19">$<?php echo number_format($id_row['sum'], 2, '.', ',');?></small></th>              
               </tr> 
                  </tbody>
                </table> 
              </div> 
            </div><!--/ End row --> 

             <div class="row"> <!-- New row --> 

            <div class="col"><!-- New Col --> 
              <form class="form" action="drivers_weekly_payroll.php" method="POST"><!-- New Form --> 
                <div class="card-body"><!-- Card --> 

                  <div class="row"> 
                    <div class="col">
                     
                    </div>

                    <div class="col">
                    
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

  // DropzoneJS Demo Code End
</script>
</body>
</html>




