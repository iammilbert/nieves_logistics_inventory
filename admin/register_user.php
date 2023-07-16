<?php  
include 'expiredSession.php';
?> 
<!-- truck signup -->
<?php 
if (isset($_POST['submit'])){
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $licenseID = $_POST["licenseID"];
    $accountNumber = $_POST["accountNumber"];
    $bankName = $_POST["bankName"];
    $accountName = $_POST["accountName"];

      $select = "SELECT * FROM users"; 
      $result = mysqli_query($conn, $select) or die(mysqli_error($conn));
      $rowError = mysqli_fetch_assoc($result);
        if ($rowError["email"]== $email AND $rowError["accountNumber"] != " ") {
            echo '<script> alert("Email already exist!");</script>';
        }  
        
        if ($rowError["tel"]== $tel AND $rowError["tel"] != " ") {
            echo '<script> alert("Phone number already exist!");</script>';
        }
        
         if ($rowError["accountNumber"]== $tel AND $rowError["accountNumber"] != " ") {
            echo '<script> alert("Account number already exist!");</script>';
        }
        
        else {
          $insert = "INSERT INTO users (name, tel, email, role, licenseID, password, address, accountNumber, bankName, accountName) VALUES('$name', '$tel', '$email', '$role', '$licenseID', '$password', '$address', '$accountNumber', '$bankName', '$accountName')"; 
          $query = mysqli_query($conn, $insert) or die(mysqli_error($conn)); 
         if ($query) { 
          $success = "Data Saved successfully!"; 
           echo '<script> alert("Registration successful");</script>';
        }else { 
           echo '<script> alert("Error Occur, Try again!");</script>';
            } 
          }    
      }
    
     
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
            <a class="dropdown-item" href="assigned_load.php">Load Assigned</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="active_drivers.php">Active Drivers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
          </div>
        </div>


       <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkVehicles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            VEHICLES
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkVehicles">
            <a class="dropdown-item" href="vehicles.php">Register Vehicle</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item active" href="assigned_vehicle.php">Assigned Vehicle</a>
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
            <a class="dropdown-item active" href="register_user.php">Register Staff/Drivers</a>
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
 $row_company = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row_company["name"];?></span></b>
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
              <p style="font: size 17px; font-weight: bolder;">
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


           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p style="font-size:17px; font-weight: bolder;">
                COMPANY/USERS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="register_user.php" class="nav-link active">
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
              <p style="font-size:17px; font-weight: bolder;">
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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><b style="color:red;">USERS REGISTRATIONS FORM</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <form method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      
                      <div class="form-group">
                        <label for="name">Staff Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Staff Name" required="name" value="<?php if(isset($name)){ echo $name; } ?>" />
                      </div>

                      <div class="form-group">
                        <label for="tel">TELEPHONE</label>
                        <input type="tel" name="tel" class="form-control" placeholder="Enter Staff Phone number" value="<?php if(isset($tel_error)){ echo $tel; } ?>" />
                      </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter Email" required="email" value="<?php if(isset($email_error)){ echo $email; } ?>" />
                        </div>

                         <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php if(isset($address)){ echo $address; } ?>" />
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                              <select class="form-control" name="role" required="role">
                              <option disabled>- select -</option>
                              <option value="Admin">Admin</option>
                              <option value="Sub_Admin">Sub Admin</option>
                              <option value="Driver">Driver</option>
                              <option value="Despatcher">Despatcher</option>
                              <option value="Accountant">Accountant</option>
                            </select>
                          </div>
                  
                    </div>

                  <div class="col-md-6">  
                        <div class="form-group">
                          <label for="licenseID">License ID</label>
                          <input type="text" name="licenseID" class="form-control" id="licenseID" placeholder="Enter Staff License ID"  value="<?php if(isset($licenseID)){ echo $licenseID; } ?>" />
                        </div>

        
                      <input type="hidden" name="password" class="form-control" placeholder="Enter Paasword" value="12345" />
 

                    <div class="form-group">
                      <label for="password">Account Number</label>
                      <input type="number" name="accountNumber" class="form-control" placeholder="Enter Account number" value="<?php if(isset($accountNumber_error)){ echo $accountNumber; } ?>" />
                    </div>

                      <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" name="bankName" class="form-control" value="<?php if(isset($accountNumber_error)){ echo $bankName; } ?>">
                      </div>
  
                    <div class="form-group">
                      <label for="accountName">Account Name</label>
                      <input type="text" name="accountName" class="form-control" placeholder="Enter Account name" value="<?php if(isset($accountNumber_error)){ echo $accountName; } ?>" />
                    </div>

                    </div> 
                  </div>
                 
                </div>
                <!-- /.card-body -->
              <div class="modal-footer">
                 <a href="index.php" class="btn btn-danger">Back</a>
                   <button type="submit" class="btn btn-outline-light btn-primary" name="submit">Submit</button>
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
