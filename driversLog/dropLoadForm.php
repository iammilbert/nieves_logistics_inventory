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
<span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row["name"];?></span></b>
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

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="assigned_load.php" class="nav-link active">
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
                  <i class="fa fa-book nav-icon"></i>
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
 $dropID = isset($_GET['dropID']) ? $_GET['dropID'] : '';
  $sql = "SELECT loads.rateConfirmationID, drops.load_id FROM drops 
  INNER JOIN loads 
  ON drops.load_id = loads.id 
  WHERE drops.id = '".$dropID."'"; 
    $query = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($query);

?>
<?php 
$myID = $_SESSION["id"];
  $sql_vehicle = "SELECT * FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$row["load_id"]."'"; 
    $query_vehicle = mysqli_query($conn, $sql_vehicle); 
    $row_vehicle = mysqli_fetch_assoc($query_vehicle);

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
            <div class="col-md-2">
              
            </div>
          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><b class="text-danger">Drop Load </b><b>>></b> <?php echo $row["rateConfirmationID"]; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>
                     
                  <form method="POST" action="dropLoadForm_query.php">
                        <div class="input-group mb-3">
                             <label class="input-group-text">Date</label>
                              <input type="date" class="form-control" name="dropped_Date" required="dropped_Date" max="<?php echo date("Y-m-d");?>">
                               <input type="hidden" class="form-control" name="auto_date_dropped" value="<?php echo date("Y-m-d");?>">
                              <input type="hidden" class="form-control" name="load_id" value="<?php echo $row["load_id"]; ?>">
                        </div>
                         <div class="input-group mb-3">
                             <label class="input-group-text">Time</label>
                             <input type="time" class="form-control" name="droppedTime" required="droppedTime" max="<?php echo date("h:i:sa");?>">
                             <input type="hidden" name="dropID" value="<?php echo $dropID; ?>">   
                             
                             <input type="hidden" class="form-control" name="truck" value="<?php echo $row_vehicle["truck"]; ?>">
                               <input type="hidden" class="form-control" name="trailer" value="<?php echo $row_vehicle["trailer"]; ?>">
                                <input type="hidden" class="form-control" name="tractor" value="<?php echo $row_vehicle["tractor"]; ?>">

                        </div>

                        <script type="text/javascript">
                          function yesnoCheck(that) 
                          {
                            if (that.value == "Yes") 
                              {
                                  document.getElementById("yes").style.display = "block";
                              }
                              else
                              {
                                  document.getElementById("yes").style.display = "none";
                              }
                            if (that.value == "No")
                              {
                                  document.getElementById("no").style.display = "none";
                              }
                          }
                      </script>

                              <div class="input-group mb-3">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                   <label for="selector">Lay Over?</label>
                                </div>
                              </div>
                               <select id="selector" onchange="yesnoCheck(this);" class="form-control" style="height: 45px;" name="layover"> 
                                  <option value="select">__Yes/No__</option> 
                                  <option value="Yes">Yes</option> 
                                  <option value="No">No</option> 
                              </select>
                          </div>


                           <div id="no" class="input-group mb-3" style="display: none;">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                   <label for="no">Enter Amount:</label>
                                </div>
                              </div>

                                <input type="text" id="no" name="no" > 

                              <div class="input-group-append">
                                <div class="input-group-text">
                                   <span>$</span>
                                </div>
                              </div>                                       
                          </div>


                            <div class="form-group" style="display:none;" id="yes">
                               <label>LayOver Amount (USD)</label>
                               <input type="number" placeholder="Enter LayOver Charges" name="layOverAmount" id="yes" class="form-control" type="number" min="0.00" step="0.01">
                             </div>

                        
                          <div class="input-group mb-3">
                             <label class="input-group-text">Comment</label>
                             <textarea class="form-control" name="comment"></textarea>
                        </div>

   <?php 
  $sqlID = "SELECT * FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$row["load_id"]."'"; 
    $queryID = mysqli_query($conn, $sqlID); 
    $rowID = mysqli_fetch_assoc($queryID);
?>

                   
                       <script type="text/javascript">
                          function otherCheck(that) 
                          {
                            if (that.value == "Other") 
                              {
                                  document.getElementById("other").style.display = "block";
                                 
                              }
                              else
                              {
                                  document.getElementById("other").style.display = "none";
                              }

                          }
                      </script>

                         <script type="text/javascript">
                          function YesNo(that) 
                          {
                            if (that.value == "Yes") 
                              {
                                  document.getElementById("amount").style.display = "block";
                                   document.getElementById("type").style.display = "block";
                              }
                              else
                              {
                                   document.getElementById("amount").style.display = "none";
                                  document.getElementById("type").style.display = "none";
                              }
                          }
                      </script>

                          <div class="input-group mb-3">
                      <label class="input-group-text">Any Expenses ?</label>
                        <select class="form-select form-control" onchange="YesNo(this);">
                            <option disabled selected>--Yes/No--</option>
                            <option value="Yes">Yes</option>
                             <option value="No">No</option>
                        </select>
                    </div>

                     <div class="form-group" style="display:none;" id="amount">
                         <label>Expenses Amount</label>
                          <input type="text" class="form-control" name="amount_Spent">
                           <input type="hidden" class="form-control" name="droppedBy" value="<?php echo $myID; ?>">
                     </div>

                    <div class="form-group" id="type" style="display:none;">
                      <label>Type of Expenses</label>
                        <select class="form-select select2 form-control" name="expenses_Type" onchange="otherCheck(this);">
                            <option disabled selected>--Select--</option>
                            <option value="Tax">Tax</option>
                             <option value="Travel">Travel</option>
                            <option value="Insurance">Insurance</option>
                             <option value="Ultility">Ultility bill</option>
                            <option value="Delivery/Freight">Delivery/Freight</option>
                            <option value="Maintenance and Repairs">Maintenance and Repairs</option>
                            <option value="Gas">Gas</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    
                         <div class="form-group" style="display:none;" id="other" >
                          <label>Other Expenses</label>
                          <textarea name="expenses_Description" placeholder="Type the expenses here" class="form-control"></textarea>
                           <input type="hidden" class="form-control" name="status" value="3">
                        </div>
          
              <div class="modal-footer justify-content-between">

                <a class="btn btn-danger" href="dropLoadTable.php?load_id=<?php echo $rowID["load_id"]; ?>">Back</a>
                 
                   <button type="submit" class="btn btn-outline-light btn-primary" name="submit">Submit</button>
              </div>
              </form>
      
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

           <div class="col-md-2">
              
          </div>
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

