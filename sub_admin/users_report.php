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
            PICKUPS/DROPS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="active_drivers.php">Active Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="active_vehicle.php">Active Vehicles</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item active" href="drivers_assigned_to_load.php">Pick/Drop Load</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="next_pickups.php">Next Pickups</a>
          </div>
        </div>


       <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkLoad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            VEHICLES
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkLoad">
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
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkLoad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            LOADS
          </a>

   

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkLoad">
            <a class="dropdown-item" href="load.php">Register Load</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="assigned_load.php">Assigned Load</a>
            <div class="dropdown-divider"></div>
          </div>
        </div>

        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            USERS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item active" href="register_user.php">Registration Form</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="company_info.php">Company Information</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_staff.php">Staff Registered</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registered_drivers.php">Drivers Registered</a>
          </div>
        </div>


        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            REPORT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="users_reports.php">Registered USERS</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicles_report.php">Registered Vehicles</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="loads_report.php"> Registered Loads</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="shippers_report.php">Registered Shippers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="admin_report.php">Registered Admin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="expenditures_report.php">Expenditures</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="income_report.php">Income Generated</a>
          </div>
        </div>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item dropdown nav-link">
        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <span class='fa fa-bell'> </span><b style="color: red;"> 9</b> 
        </a>
        
          <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="navbarDropdown">
            
              <a class="dropdown-item pt-3 pb-3 alert alert-success" href="#">come</a>
          
          </div>
     
      </li>
         
   

         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fa fa-user-circle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false" style="font-size:23px;">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../logout.php" style="font-weight:bolder;"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
              <div class="dropdown-divider" ></div>
              <a class="dropdown-item" href="profile.php" style="font-weight:bolder;"><i class="fa fa-user"></i> Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="editProfile.php" style="font-weight:bolder;"><i class="fa fa-cog"></i> Edit Profile</a>
            </div>
          </li>
    </ul>
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
              <p style="font-size:17px; font-weight: bolder;">
                LOADS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="load.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Register Load</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assigned_load.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Load Assigned</p>
                </a>
              </li>
            </ul>
          </li>


              <li class="nav-item">
            <a href="#" class="nav-link">
              <p style="font-size:17px; font-weight: bolder;">
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
              <p style="font-size:17px; font-weight: bolder;">
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
              <p style="font: size 17px; font-weight: bolder;">
                PICKUPS/DROPS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
  
               <li class="nav-item">
                <a href="active_drivers.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Active Drivers</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="active_vehicle.php" class="nav-link">
                  <i class="fas fa-bus-alt nav-icon"></i>
                  <p>Active Vehicles</p>
                </a>
              </li>          

                <li class="nav-item">
                <a href="drivers_assigned_to_load.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Pick/Drop Load</p>
                </a>
              </li>

            <li class="nav-item">
                <a href="load_delivered.php" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Pickups Delivered</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="next_pickups.php" class="nav-link">
                  <i class="fas fa-forward nav-icon"></i>
                  <p>Next Pickups</p>
                </a>
              </li>
            </ul>
          </li>


               <li class="nav-item">
            <a href="#" class="nav-link">
              <p style="font-size:17px; font-weight: bolder;">
                USERS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="register_user.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Registration Form</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="company_info.php" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Company Info.</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="registered_staff.php" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Staff Registered</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="registered_drivers.php" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Registered Drivers</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p style="font-size:17px; font-weight: bolder;">
                REPORT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users_reports.php" class="nav-link active">
                  <i class="fas fa-wheelchair nav-icon"></i>
                  <p>Registered Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vehicles_report.php" class="nav-link">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Registered vehicles</p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="loads_report.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Registered Loads</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="shippers_report.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Registered Shippers</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="admin_report.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Registered Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="expenditures_report.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Expenditures</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="income_report.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Income Generated</p>
                </a>
              </li>
            </ul>
          </li>
          <hr>
          <?php include('../sideBarActiveTrucks.php'); ?>
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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><b style="color:red;">DRIVERS REPORT</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table" style="font-size:13.5px;">
                  <thead>
                   <tr>
                    <th>ID</th>
                    <th>DRIVER NAME</th>
                    <th>TELEPHONE</th>
                    <th>VEHICLE</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="index.php" style="font-weight:bolder;">40101</a></td>
                    <td>James</td>
                    <td>08137096228</td>
                    <td>Truck</td>
                        <td>
                          <a href="#" name="edit" class="btn btn-sm btn-primary"  title="View Report" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-eye"></i></a>
                        </td>
                  </tr>
                  <tr>
                    <td><a href="index.php" style="font-weight:bolder;">20101</a></td>
                    <td>Martinx</td>
                    <td>08137096228</td>
                    <td>Truck</td>
                    
                        <td>
                        <a href="#" name="edit" class="btn btn-sm btn-primary"  title="View Report" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-eye"></i></a>
                        </td>
                  </tr>
                  </tr>
                
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

        <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Driver Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary card-outline">
            <!-- form start -->
              <form id="quickForm">
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="driverName">Driver Name</label>
                      <input type="text" name="driverName" class="form-control" id="driverName" placeholder="Enter Driver Name">
                    </div>

                    <div class="form-group">
                        <label for="tel">Driver Vehicle</label>
                        <textarea placeholder="Enter Telephone Number" id="tel" name="tel" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="pickupDate">Pickup Date</label>
                      <input type="date" name="pickupDate" class="form-control" id="pickupDate" placeholder="Enter Pickup Date">
                    </div>

                      <div class="form-group">
                          <label for="truckModel">Drivers Name</label>
                          <select class="form-control select2">
                              <option selected disabled>- select -</option>
                              <option>Alaska</option>
                              <option>Delaware</option>
                              <option>Tennessee</option>
                              <option>Texas</option>
                              <option>Washington</option>
                          </select>
                      </div>
                </div>


                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="shipperTel">Shipper Telephone</label>
                        <input type="tel" name="shipperTel" class="form-control" id="shipperTel" placeholder="Enter Shipper Telephone">
                      </div>

                      <div class="form-group">
                        <label for="deliveryAddress">Delivery Address</label>
                        <textarea placeholder="Enter Delivery Address" id="pickupAddress" name="pickupAddress" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                      <label for="pickupDate">Delivery Date</label>
                      <input type="date" name="pickupDate" class="form-control" id="pickupDate" placeholder="Enter Pickup Date">
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light btn-primary">Submit</button>
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
              </div>
           
              </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

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
