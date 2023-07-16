<?php 
include 'expiredSession.php';
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 

 $sql_company = "SELECT * FROM companyinfo"; 
 $query_company = mysqli_query($conn, $sql_company); 
 $row_company = mysqli_fetch_assoc($query_company);
?>
   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav bold">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PICKUPS/DROPS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="load.php">Load Registration</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_load.php">Pickups Assigned</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="assigned_vehicle.php">Vehicles Assigned</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="active_drivers.php">My Driver</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item active" href="load_delivered.php">Pickups Delivered</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="myPayroll.php">My Pay roll</a>
          </div>
        </div>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fa fa-user-circle font-size-23" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item bold" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
              <div class="dropdown-divider" ></div>
              <a class="dropdown-item bold" href="profile.php"><i class="fa fa-user"></i> Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item bold" href="editProfile.php"><i class="fa fa-cog"></i> Edit Profile</a>
            </div>
          </li>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row_company["name"]; ?></b></span>
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
            <a href="load.php" class="nav-link">
              <i class="fa fa-registered nav-icon"></i>
              <p class="font-size-17 bold">
                Load Registration
              </p>
            </a>
          </li>

           <li class="nav-item">
                <a href="assigned_load.php" class="nav-link active">
                    <i class="fa fa-tasks nav-icon"></i>
                    <p class="font-size-17 bold">
                      Loads Assigned
                    </p>   
                 </a>
            </li>

            <li class="nav-item">
                <a href="assigned_vehicle.php" class="nav-link">
                    <i class="fa fa-tasks nav-icon"></i>
                    <p class="font-size-17 bold">
                      Vehicles Assigned
                    </p>   
                 </a>
            </li>


            <li class="nav-item">
                <a href="active_drivers.php" class="nav-link">
                    <i class="fa fa-user nav-icon"></i>
                    <p class="font-size-17 bold">
                      My Drivers
                    </p>   
                 </a>
            </li>

            <li class="nav-item">
                <a href="load_delivered.php" class="nav-link">
                    <i class="fa fa-check nav-icon"></i>
                    <p class="font-size-17 bold">
                      Pickups Delivered
                    </p>   
                 </a>
            </li>

                   <li class="nav-item">
                <a href="myPayroll.php" class="nav-link">
                    <i class="fa fa-money-check nav-icon"></i>
                    <p class="font-size-17 bold">
                      My Pay Roll
                    </p>   
                 </a>
            </li>
            </ul>
          </li>

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
$myID = $_SESSION["Despatcher_id"];
  $sql_vehicle = "SELECT * FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$row["load_id"]."'"; 
    $query_vehicle = mysqli_query($conn, $sql_vehicle); 
    $row_vehicle = mysqli_fetch_assoc($query_vehicle);
?>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                     
                 <form method="POST" action="dropLoadForm_query.php">

                        <input type="hidden" class="form-control" name="dropped_Date" value="<?php echo date("Y-m-d");?>">
                              <input type="hidden" class="form-control" name="load_id" value="<?php echo $row["load_id"]; ?>">


                            <input type="hidden" class="form-control" name="droppedTime" value="<?php echo date("h:i:sa");?>">
                             <input type="hidden" name="dropID" value="<?php echo $dropID; ?>"> 

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
                                   <label for="layOver">Lay Over?</label>
                                </div>
                              </div>
                               <select id="selector" onchange="yesnoCheck(this);" class="form-control" style="height: 45px;" name="layover" required="layover"> 
                                  <option value="No" selected disabled>__Yes/No__</option> 
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
                                   <span><b>USD</b></span>
                                </div>
                              </div>                                       
                          </div>


                            <div class="form-group" style="display:none;" id="yes">
                               <label>LayOver Amount (USD)</label>
                               <input type="number" placeholder="Enter LayOver Charges" name="LayOverAmount" id="yes" class="form-control" type="number" min="0.00" step="0.01">
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
                        <select class="form-select form-control" onchange="YesNo(this);" required>
                            <option disabled selected>--Yes/No--</option>
                            <option value="Yes">Yes</option>
                             <option value="No">No</option>
                        </select>
                    </div>

                     <div class="form-group" style="display:none;" id="amount">
                         <label>Expenses Amount</label>
                          <input type="text" class="form-control" name="amount_Spent">
                           <input type="hidden" class="form-control" name="droppedBy" value="<?php echo $myID; ?>">
                      
                              <input type="hidden" class="form-control" name="truck" value="<?php echo $rowID["truck"]; ?>">
                               <input type="hidden" class="form-control" name="trailer" value="<?php echo $rowID["trailer"]; ?>">
                                <input type="hidden" class="form-control" name="tractor" value="<?php echo $rowID["tractor"]; ?>">

                     </div>

                    <div class="form-group" id="type" style="display:none;">
                      <label>Type of Expenses</label>
                        <select class="form-select select2 form-control" name="expenses_Type" onchange="otherCheck(this);">
                            <option disabled selected>--Select--</option>
                            <option value="Tax">Tax</option>
                            <option value="Lumper Fee">Lumper Fee</option>
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

                           <div class="input-group mb-3">
                             <label class="input-group-text">Comment</label>
                             <textarea class="form-control" name="comment"></textarea>
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

