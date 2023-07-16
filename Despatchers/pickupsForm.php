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
              <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
              <div class="dropdown-divider" ></div>
              <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i> Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="editProfile.php"><i class="fa fa-cog"></i> Edit Profile</a>
            </div>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row["name"]; ?></b></span>
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
                <a href="drivers_assigned_to_load.php" class="nav-link">
                    <i class="fa fa-truck nav-icon"></i>
                    <p class="font-size-17 bold">
                      Pick/Drop Load
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
                      My Pay roll
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

<?php 
 $id = isset($_GET['loadID']) ? $_GET['loadID'] : '';
 $sql = "SELECT * FROM loads WHERE id = '".$id."'"; 
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ml-auto">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pickupsTable.php?loadID=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm">Back</a></li>
              <li class="breadcrumb-item active"><a href="index.php" class="btn btn-primary btn-sm">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
                <h3 class="card-title text-danger bold">Pickups Registration</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>
                     
              <form method="POST" action="pickups_query.php">
                <div class="card-body"> 

                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                          <label for="rateConfirmationID" class="input-group-text">Rate Con. </label>
                          <input type="text" class="form-control" name="rateConfirmationID" readonly value="<?php echo $row["rateConfirmationID"]; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="input-group mb-3">
                          <label for="rateConfirmationID" class="input-group-text">Total Pickups</label>
                            <?php 
                               $sql = "SELECT COUNT(pickups.id) AS sum FROM pickups WHERE pickups.load_id = '".$id."'"; 
                               $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            ?>
                            <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                          <input type="text" class="form-control" name="totalPickups" readonly value="<?php echo $id_row["sum"]; ?>">
                           <?php endwhile ?>
                        </div>
                    </div>
                  </div>
                      <div class="input-group mb-3">
                          <span for="name" class="input-group-text">Pickup name</span>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter Pickup name">
                        </div>
                   <div class="input-group mb-3">
                          <span for="state" class="input-group-text">Pickup State</span>
                          <input type="text" class="form-control" name="state" id="state" placeholder="Enter Pickup State">
                        </div>

                       <div class="input-group mb-3">
                          <span for="pickup" class="input-group-text">City</span>
                          <input type="location" class="form-control" name="city" id="city" placeholder="Enter Pickup City">
                        </div>

                        <div class="input-group mb-3">
                          <span for="address" class="input-group-text">Pickup Address</span>
                          <input type="location" class="form-control" name="address" id="address" placeholder="Enter Pickup address">
                        </div>

                         <div class="input-group mb-3">
                          <span for="stateZipCode" class="input-group-text">Zip Code</span>
                          <input type="zip" pattern="[0-9]*" maxlength="5" name="stateZipCode" id="stateZipCode" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                          <span for="date" class="input-group-text">Pickup Date</span>
                          <input type="date" class="form-control" name="date" id="date" placeholder="Enter Pickup date">
                          <input type="hidden" class="form-control" name="load_id" id="status" value="<?php echo $id; ?>">
                        </div>
                        <div class="input-group mb-3">
                          <span for="time" class="input-group-text">Pickup Time</span>
                          <input type="time" class="form-control" name="time" id="time" placeholder="Enter Pickup time">
                          <input type="hidden" class="form-control" name="totalPickups" id="totalPickups">
                        </div>
                      </div>
              <div class="modal-footer justify-content-between">
                <a href="load.php?reg=<?php echo $row["id"]; ?>" class="btn btn-danger">Back</a>
                  <button name="submit" class="btn btn-outline-light btn-primary">Submit</button>
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
