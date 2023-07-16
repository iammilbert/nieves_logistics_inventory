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
    <ul class="navbar-nav" style="font-weight:bolder;">
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
$userID = $_SESSION["Despatcher_id"];
  $sql = "SELECT * FROM users WHERE users.id = '".$userID."'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<p></p>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title bold text-danger">EDITING DATA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <?php if (isset($_GET['error'])) { ?>
                        <div class="error"> <?php echo $_GET['error']; ?> </div>
                      <?php } ?>


                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } 
                    ?>


              <form method="POST" method="POST" action="update_Profile.php">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      
                      <div class="form-group">
                        <label for="name">Staff Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Staff Name" required="name" value="<?php echo $row["name"]; ?>" />

                        <input type="hidden" name="userID" class="form-control" value="<?php echo $userID; ?>" />
                      </div>

                      <div class="form-group">
                        <label for="tel">TELEPHONE</label>
                        <input type="tel" name="tel" class="form-control" placeholder="Enter Staff Phone number" required="tel" value="<?php echo $row["tel"]; ?>" />
                      </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter Email" required="email" value="<?php echo $row["email"]; ?>" />
                        </div>

                         <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="form-control" placeholder="Enter Address"required="address" value="<?php echo $row["address"]; ?>" />
                        </div>


                        <div class="form-group">
                          <label for="salary">SALARY (NGN)</label>
                          <input type="text" name="salary" class="form-control" placeholder="Enter salary" value="<?php echo $row["salary"]; ?>" />
                        </div>
                  
                    </div>

                  <div class="col-md-6">

                         <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" name="password" class="form-control" id="password" placeholder="Enter password" value="<?php echo $row["password"]; ?>" />
                        </div>

        

                    <div class="form-group">
                      <label for="password">Account Number</label>
                      <input type="number" name="accountNumber" class="form-control" placeholder="Enter Account number" required="accountNumber" value="<?php echo $row["accountNumber"]; ?>" />
                    </div>


                            <div class="form-group">
                               <label>Enter Bank Name</label>
                               <input type="text" placeholder="Enter Bank Name" name="bankName" class="form-control" value="<?php echo $row["bankName"]; ?>">
                             </div>
  
                    <div class="form-group">
                      <label for="accountName">Account Name</label>
                      <input type="text" name="accountName" class="form-control" placeholder="Enter Account name" required="accountName" value="<?php echo $row["accountName"]; ?>" />
                    </div>

                    </div> 
                  </div>
                 
                </div>
                 <!-- /.card-body -->
              <div class="modal-footer justify-content-between">
                <a href="profile.php" class="btn btn-danger">Back</a>
                <a href="editProfile_.php" class="btn btn-success">Change Profile Picture</a>
                 
                   <button type="submit" class="btn btn-outline-light btn-primary" name="update">Submit</button>
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
