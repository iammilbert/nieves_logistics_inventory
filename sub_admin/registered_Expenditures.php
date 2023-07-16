<?php 
include 'expiredSession.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title class="center">Expenditures</title>

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
            <a class="dropdown-item" href="assigned_vehicle.php">Assigned Vehicle</a>
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
            <!--<a class="dropdown-item" href="registered_Admin.php">Registered Admin</a>-->
            <!--<div class="dropdown-divider"></div>-->
            <a class="dropdown-item" href="registered_Expenditures.php">Expenditures</a>
            <div class="dropdown-divider"></div>
            <!--<a class="dropdown-item" href="vehicle_income.php">Vehicles Income</a>-->
            <!--<div class="dropdown-divider"></div>-->
            <!--<a class="dropdown-item" href="income_Generated.php">Company Income Generated</a>-->
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
 $row4 = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

 <span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row4["name"];?></span></b>
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

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
              <li class="nav-item">
                <a href="registered_Expenditures.php" class="nav-link active">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Expenditures</p>
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
        
 
    <hr>
      <div class="container-fluid card card-primary card-outline">
               <div class="row"> <!-- Start row -->
              
            <div class="container-fluid">
                <div class="row"> <!-- Start row -->
                          <div class="card-header">
                            <h3 class="card-title text-danger bold font-size-30">COMPANY EXPENSES</h3>
                          </div>
                </div>
                <!-- /. end row -->
            </div>
            <hr>
        <div class="col">
             <div class="info-box mb-3">
                 <button class="btn btn-primary bold text-white" data-toggle="modal" data-target="#modal-primary"><span class="fa fa-plus text-white font-size-20"></span> VEHICLE EXPENDITURE</button>
              </div>
          </div>
          <!-- /.col -->
          
            <div class="col">
             <div class="info-box mb-3">
                 <button class="btn btn-info bold text-white" data-toggle="modal" data-target="#other-primary"><span class="fa fa-plus text-white font-size-20"></span> OTHER EXPENDITURE</button>
              </div>
          </div>
          
            <div class="col">
             <div class="info-box mb-3">
                 <button class='btn btn-sm btn-warning text-white bold' data-toggle='modal' type='button' data-target='#view_primary'><span class='fas fa-eye font-size-20'></span> VIEW EXPENSES</button> 
              </div>
          </div>
        </div>
        <!-- /. end row -->
        
         <div class="row"> <!-- Start row -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>

              <div class="info-box-content">
               <label class="info-box-text">LAST MONTH</label>
                <?php 
                 $newDate = date('Y-m-d', strtotime('-1 month'));
                 $newDate2 = date('Y-m', strtotime('-1 month'));
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.dateSpent < '".$newDate."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><?php echo DateTime::createFromFormat('Y-m', $newDate2)->format('F Y');?></span><br>
                <span class="start_count"><b class="text-green">USD</b> <?php echo  $id_row['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1 bold">USD</span>

              <div class="info-box-content">
                <label class="info-box-text">GRAND TOTAL</label>
                <?php 
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row2 = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><?php echo  $id_row2['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
               <label class="info-box-text">TODAY'S EXPENSES</label>
                <?php 
                 $newDate3 = date('Y-m-d');
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.dateSpent = '".$newDate3."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($today_row = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count">
                <b class="text-green">USD</b> 
                <?php echo $today_row["sum"];
                
                ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->

<?php 
 include'view_modal_expenses.php'; 
?>
        <hr>

         <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title bold"> Registered Expenditures</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table font-size-13">
                  <thead>
                   <tr>
                    <th>EXPENSES TYPE</th>
                    <th>DATE</th>
                    <th>AMOUNT</th>
                    <th>INCURED BY</th>
                    <th>FILES</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  $no = 1;
                      $sql="SELECT * FROM expenses";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                         <td><?php echo $row['expensesType']; ?></td>
                        <td><?php echo $row['dateSpent']; ?></td>
                         <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['incuredBy']; ?></td>
                        
              
                        
                        <td>  
                          <?php 
                             if($row["fileStatus"]== 1 ){
                            echo "<i><a href='download_file.php?file_id={$row['id']}' target='_blank'> Download file</a></i>";
                          }
    
                             elseif($row["fileStatus"]== 0 ){
                            echo "<small class='badge badge-danger'>Pending</small>";
                          }
                        ?>
                      </td>
                      
                    <td>
                              
                        <button class="btn btn-sm btn-primary" data-toggle="modal" type="button" data-target="#expenses_details<?php echo $row['id']?>"><span class="fas fa-eye"></span></button>

                       
                          <button class="btn btn-sm btn-danger" data-toggle="modal" type="button" data-target="#deletedata<?php echo $row['id']?>"><span class="fas fa-trash"></span></button>
                                             
                          
                  <?php  
                      
                    if($row['fileStatus']== 0 ) { 
                          echo "<a href='expenses_file.php?expensesID={$row["id"]}' class='btn btn-info'><i class='fas fa-upload'></i> Upload File</a>";
                          
                      }
                    ?> 

                        </td>
                      </tr>

                    <?php                      
                        $no++;
                        include'delete_expenses_modal.php';
                        include'edit_expenses_modal.php';
                        include'view_expenses_modal.php'; 
                       
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
        
         <div class="modal fade" id="modal-primary" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Vehicle Expenses Registration</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="row">
            <div class="car card-primary"> 
                <div class="card-body"> 
                      <form class="form" method="POST" action="other_expenses_query.php">
                          <div class="form-group">
                              <label>VEHICLE</label>
                              <select id="vehicleType" onchange="yesnoCheck(this);" class="form-control select2" name="vehicleType" required="vehicleType" style="height: 45px;"> 
                                  <option value="N/A" selected >-Choose-</option> 
                                  <option value="Truck">Truck</option> 
                                  <option value="Trailer">Trailer</option> 
                                  <option value="Tractor">Tractor</option> 
                                  <option value="Other">Other</option> 
                              </select>
                          </div>
                          
                        <script type="text/javascript">
                          function yesnoCheck(that) 
                          {
                            if (that.value == "Truck") 
                              {
                                  document.getElementById("truck").style.display = "block";
                              }
                               else
                              {
                                  document.getElementById("truck").style.display = "none";
                              }
                            if (that.value == "Trailer") 
                              {
                                  document.getElementById("trailer").style.display = "block";
                              }
                              else
                              {
                                  document.getElementById("trailer").style.display = "none";
                              }
                            if (that.value == "Tractor")
                              {
                                  document.getElementById("tractor").style.display = "block";
                              }
                               else
                              {
                                  document.getElementById("tractor").style.display = "none";
                              }
                          }
                      </script>
                      
                            <?php 
                                $truck = "Truck";
                              $sql1 = "SELECT * FROM vehicles WHERE vehicles.vehicleType = '".$truck."'";
                              $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                            ?>
                        <div class="form-group" style="display:none;" id="truck">
                              <label>Trucks Numbers</label>
                              <select id="truck" class="form-control select2" name="truck"> 
                                  <option value="N/A" selected disabled>-Choose-</option> 
                                        <?php while($row1 = mysqli_fetch_assoc($query1)): ?>
                                          <option value="<?php echo $row1['number']; ?>"><?php echo $row1['number']; ?></option>
                                        <?php endwhile; ?>
                              </select>
                          </div>
                          
                               <?php 
                                $trailer = "Trailer";
                              $sql2 = "SELECT * FROM vehicles WHERE vehicles.vehicleType = '".$trailer."'";
                              $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                            ?>
                        <div class="form-group" style="display:none;" id="trailer">
                              <label>Trailer Numbers</label>
                              <select id="trailer" class="form-control select2" name="trailer"> 
                                  <option value="N/A" selected disabled>-Choose-</option> 
                                        <?php while($row2 = mysqli_fetch_assoc($query2)): ?>
                                          <option value="<?php echo $row2['number']; ?>"><?php echo $row2['number']; ?></option>
                                        <?php endwhile; ?>
                              </select>
                          </div>
                          
                          
                            <?php 
                                $tractor = "Tractor";
                              $sql3 = "SELECT * FROM vehicles WHERE vehicles.vehicleType = '".$tractor."'";
                              $query3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                            ?>
                        <div class="form-group" style="display:none;" id="tractor">
                              <label>Tractor Numbers</label>
                              <select id="tractor" class="form-control select2" name="tractor"> 
                                  <option value="N/A" selected disabled>-Choose-</option> 
                                        <?php while($row3 = mysqli_fetch_assoc($query3)): ?>
                                          <option value="<?php echo $row3['number']; ?>"><?php echo $row3['number']; ?></option>
                                        <?php endwhile; ?>
                              </select>
                          </div>
                              
                              
                               <div class="form-group">
                                  <label>Type of Expenses</label>
                                  <select class="form-control select2" name="expensesType" style="height: 45px;"> 
                                      <option value="N/A" selected disabled>-Choose-</option> 
                                    <option value="Repairs">Repairs</option>
                                  <option value="Vehicle Purchase">Vehicle Purchase</option>
                                  <option value="Tax">Tax</option>
                                  <option value="Fuel">Fuel</option>
                                  <option value="Insurance">Insurance</option>
                                  <option value="Garrage Fee">Garrage Fee</option>
                                  <option value="Other">Other</option> 
                                  </select>
                              </div>
                        
                                  <div class="form-group">
                                    <textarea type="text" name="description" class="form-control" cols="80" placeholder="Expenses Description"></textarea>
                                  </div>
                                  
                    <div class="input-group mb-3">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" required="amount">
                    <label class="input-group-text text-green bold">USD</label>
                  </div>

                  <div class="input-group mb-3">
                    <input type="text" name="incuredBy" class="form-control" id="incuredBy" placeholder="Incurred By" required="incuredBy">
                    <label class="input-group-text bold"><i class="fa fa-user"></i></label>
                  </div>
               
                   <div class="input-group mb-3">
                    <input type="date" name="dateSpent" class="form-control" id="dateSpent" required="dateSpent">
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="hidden" name="months" class="form-control" id="months" required="months" value="<?php echo date('M-Y'); ?>">
                  </div>
                  
                <!-- /.card-body -->
               <div class="modal-footer justify-content-between bg-primary">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-outline-light btn-primary" name="submit" value="Register">
              </div>
              </form>
                </div>
                </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


   <div class="modal fade" id="other-primary" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Other Expenses</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="row">
            <div class="car card-primary"> 
                <div class="card-body"> 
         <form class="form" method="POST" action="expenses_query.php">
                      <div class="form-group">
                                      <label>Type of Expenses</label>
                                        <select class="form-control select2" name="expensesType" style="height: 45px;"> 
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
                        
                                  <div class="form-group">
                                    <textarea type="text" name="description" class="form-control" cols="80" placeholder="Expenses Description" required="description"></textarea>
                                  </div>

                  <div class="input-group mb-3">
                    <input type="text" name="incuredBy" class="form-control" id="incuredBy" placeholder="Incurred By" required="incuredBy">
                    <label class="input-group-text bold"><i class="fa fa-user"></i></label>
                  </div>
                  
                   <div class="input-group mb-3">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" required="amount">
                    <label class="input-group-text text-green bold">USD</label>
                  </div>

                   <div class="input-group mb-3">
                    <input type="date" name="dateSpent" class="form-control" id="dateSpent" required="dateSpent">
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="hidden" name="months" class="form-control" id="months" required="months" value="<?php echo date('M-Y'); ?>">
                  </div>
               <div class="modal-footer justify-content-between bg-primary">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-outline-light btn-primary" name="register" value="Register">
              </div>
              </form>
                </div>
                </div>
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
