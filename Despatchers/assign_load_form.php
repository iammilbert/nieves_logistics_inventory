<?php 
include 'expiredSession.php';
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
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
            <a class="dropdown-item active" href="load.php">Load Registration</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_load.php">Pickups Assigned</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="assigned_vehicle.php">Vehicles Assigned</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="active_drivers.php">My Driver</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
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
      <span class="brand-text font-weight-light"><b class="name bold"><?php $text = $row["name"]; echo strtok($text, " ");?> INVENTORY</b></span>
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
            <a href="load.php" class="nav-link active">
              <i class="fa fa-registered nav-icon"></i>
              <p class="font-size-17 bold">
                Load Registration
              </p>
            </a>
          </li>

           <li class="nav-item">
                <a href="assigned_load.php" class="nav-link">
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
                      My Driver
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
 $despatcher = $_SESSION["Despatcher_id"];
 $id = isset($_GET['assign_id']) ? $_GET['assign_id'] : '';

 $sql = "SELECT * FROM loads WHERE id = '".$id."'"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

                <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-danger card-outline">
              <div class="card-header bg-info">
                <h3 class="card-title text-white">Asssigning Load to Driver</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 
                  <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>
                     
                <form method="POST" action="assign_load_query.php">
                <div class="card-body">

                  <div class="form-group text-center">
                    <label for="rateConfirmationID">RATE CONFIRMATION : </label>
                    <input type="hidden" name="load_id" value="<?php echo $row['id']?>" class="form-control" readonly/>
                    <input type="hidden" name="status" value="1" class="form-control"/>
                    <span>#<?php echo $row['rateConfirmationID'] ?></span>
                   
                    <input type="hidden" name="date_assigned" value="<?php echo date("Y-m-d"); ?>" class="form-control" readonly/>

                    <input type="hidden" name="assignedBy" value="<?php echo $userID; ?>" class="form-control" readonly/>
                  
                  </div>
                  
                  
           <?php 
              $sql = "SELECT * FROM users WHERE role = 'Driver'";
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            ?>
            <label>Driver Name</label>
            <div class="form-group">
               
                <select class="form-control select2" name="driver_id" required="driver_id" style="width:100%">
                  <option value="">--Choose-</option>
                  <?php while($row = mysqli_fetch_assoc($query)): ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
                </select>
            </div>


            <?php 
            $truck = "Truck";
              $sql1 = "SELECT * FROM vehicles WHERE vehicles.status = 0 AND vehicles.vehicleType = '".$truck."' OR vehicles.status > 2 AND vehicles.vehicleType = '".$truck."'";
              $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
            ?>
            
            <label>Truck</label>
            <div class="form-group">
               
                <select class="form-control select2" name="truck" style="width:100%">
                  <option value="N/A">--Choose--</option>
                  <?php while($row1 = mysqli_fetch_assoc($query1)): ?>
                  <option value="<?php echo $row1['number']; ?>"><?php echo $row1['number']; ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            
            
            
         <?php 
            $trailer = "Trailer";
              $sql2 = "SELECT * FROM vehicles WHERE vehicles.status = 0 AND vehicles.vehicleType = '".$trailer."' || vehicles.status > 2 AND vehicles.vehicleType = '".$trailer."'";
              $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
            ?>
            
            <label>Trailer</label>
            <div class="form-group">
               
                <select class="form-control select2" name="trailer" style="width:100%">
                 <option value="N/A">--Choose--</option>
                  <?php while($row2 = mysqli_fetch_assoc($query2)): ?>
                  <option value="<?php echo $row2['number']; ?>"><?php echo $row2['number']; ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            
            
            
             <?php 
            $tractor = "Tractor";
              $sql3 = "SELECT * FROM vehicles WHERE vehicles.status = 0 AND vehicles.vehicleType = '".$tractor."' || vehicles.status > 2 AND vehicles.vehicleType = '".$tractor."'";
              $query3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
            ?>
            
            <label>Tractor</label>
            <div class="form-group">
               
                <select class="form-control select2" name="tractor" style="width:100%">
                  <option value="N/A">--Choose--</option>
                  <?php while($row3 = mysqli_fetch_assoc($query2)): ?>
                  <option value="<?php echo $row3['number']; ?>"><?php echo $row3['number']; ?></option>
                <?php endwhile; ?>
                </select>
            </div>


        <?php 
        $Despatcher = "Despatcher";
              $sqlsub = "SELECT * FROM users WHERE role = '".$Despatcher."'";
              $querysub = mysqli_query($conn, $sqlsub) or die(mysqli_error($conn));
        ?>
            <label>Sub Dispatcher (Dispatchers representing Driver)</label>
            <div class="form-group">
               
                <select class="form-control select2" name="subDispatcher" style="width:100%">
                  <option value=""> -Choose-</option>
                  <?php while($rowsub = mysqli_fetch_assoc($querysub)): ?>
                  <option value="<?php echo $rowsub['id']; ?>"><?php echo $rowsub['name']; ?></option>
                <?php endwhile; ?>
                </select>
            </div>

                </div>
                <!-- /.card-body -->
              <div class="modal-footer">
                  <a href="load.php" class="btn btn-danger">Back</a>
                   <button name="assign" class="btn btn-outline-light btn-primary">Assign</button>
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
