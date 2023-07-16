<?php 
include 'expiredSession.php';
?>


<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>
  
  <!-- load Query -->
<!-- load Query -->
<?php
$error = "";
$error2 = "";
$success = "";
   if(isset($_POST['update'])){
       $id = $_POST["id"];
      $brokerName = $_POST["brokerName"];
      $brokerEmail = $_POST["brokerEmail"];
       $brokerNumber = $_POST["brokerNumber"];
       $shipperEmail = $_POST["shipperEmail"];
       $shipperAddress = $_POST["shipperAddress"]; 
       $loadDescription = $_POST["loadDescription"];  
       $rate = $_POST["rate"]; 
       $rateConfirmationID = $_POST["rateConfirmationID"];    
       $dateRegistered = $_POST["dateRegistered"];
        $weight = $_POST["weight"];
       

        $sql = "UPDATE loads SET rateConfirmationID = '".$rateConfirmationID."', brokerName = '".$brokerName."', brokerEmail = '".$brokerEmail."', brokerNumber = '".$brokerNumber."', shipperEmail = '".$shipperEmail."', shipperAddress = '".$shipperAddress."', loadDescription = '".$loadDescription."', rate = '".$rate."', dateRegistered = '".$dateRegistered."', weight = '".$weight."' WHERE id = '".$id."'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

           if($query)
        {
           $success = "Load Updated";
        }
        else
        {
           $error = "Error occured";
        }
     }
?>

<?php
   if(isset($_POST['deletedata'])){
     $id = $_POST['delete_id'];
  $sql="DELETE FROM loads WHERE id='$id'";
  if(mysqli_query($conn, $sql)){
  $success = "Load Deleted";
  }else {
      $error = "Error occured";
  }
   }

?>

 <!-- Load signup -->
<?php 
if (isset($_POST['submit'])){
      $brokerName = $_POST["brokerName"];
      $brokerEmail = $_POST["brokerEmail"];
       $brokerNumber = $_POST["brokerNumber"];
       $shipperEmail = $_POST["shipperEmail"];
       $shipperAddress = $_POST["shipperAddress"]; 
       $loadDescription = $_POST["loadDescription"];  
       $rate = $_POST["rate"]; 
       $rateConfirmationID = $_POST["rateConfirmationID"];    
       $dateRegistered = $_POST["dateRegistered"];
        $status = $_POST["status"];
        $registeredBy = $_POST["registeredBy"];
        $weight = $_POST["weight"];

        $select = "SELECT rateConfirmationID FROM loads WHERE rateConfirmationID = '".$rateConfirmationID."' ";
        $query = mysqli_query($conn, $select) or die(mysqli_error($conn));
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            if ($row["rateConfirmationID"]==$rateConfirmationID) {
                echo '<script> alert("Rate Confirmation ID already exist!"); window.location.href = "load.php";</script>';
            }
        }else{
        $sql1 = "INSERT INTO loads (brokerName, brokerEmail, brokerNumber, shipperEmail, shipperAddress, loadDescription, rate, rateConfirmationID, dateRegistered, status, registeredBy, weight) VALUES('$brokerName', '$brokerEmail', '$brokerNumber', '$shipperEmail', '$shipperAddress', '$loadDescription', '$rate', '$rateConfirmationID', '$dateRegistered', '$status', '$registeredBy', '$weight')";
           $result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
           if ($result) {
             $success = "Load Registered";
             
           }else {
               $error = "Unknown Error occured";
               
           }
        }

       
		}
	

?>

<?php 
    
if (isset($_POST['update_assigned_loads'])) {
        $id = $_POST["id"];
        $brokerName = $_POST["brokerName"];
        $brokerEmail = $_POST["brokerEmail"];
       $brokerNumber = $_POST["brokerNumber"];
       $shipperEmail = $_POST["shipperEmail"];
       $shipperAddress = $_POST["shipperAddress"]; 
       $loadDescription = $_POST["loadDescription"];  
       $rate = $_POST["rate"]; 
       $rateConfirmationID = $_POST["rateConfirmationID"];    
       $dateRegistered = $_POST["dateRegistered"];
        $weight = $_POST["weight"];
       

        $sql = "UPDATE loads SET rateConfirmationID = '".$rateConfirmationID."', brokerName = '".$brokerName."', brokerEmail = '".$brokerEmail."', brokerNumber = '".$brokerNumber."', shipperEmail = '".$shipperEmail."', shipperAddress = '".$shipperAddress."', loadDescription = '".$loadDescription."', rate = '".$rate."', dateRegistered = '".$dateRegistered."', weight = '".$weight."' WHERE id = '".$id."'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

             if ($query) {
                echo '<script> alert("Load successfully updated");</script>';       
           }
           else
           {
            echo '<script> alert("Unknown Error Occur, Try again");</script>';
           
           }

    }

?>



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
<?php 
$myID = $_SESSION["id"];
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
                <a href="load.php" class="nav-link active">
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
              <li class="nav-item">
                <a href="registered_Expenditures.php" class="nav-link">
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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-danger bold">REGISTER LOAD</h3>
              </div>
              <!-- /.card-header -->
                 <div class="card-header ml-auto">
                      <a class="btn btn-primary text-white" data-toggle="modal" data-target="#modal-primary"><i class="fa fa-plus"></i> Load</a>
                </div>

              <div class="card-body">
                  <div class="bg-warning" style="color:white;"><?php echo $error; ?></div>
                  
                  <div class="bg-success" style="color:white;"><?php echo $success; ?></div>
                  
                  <div class="bg-danger" style="color:white;"><?php echo $error2; ?></div>
                  
               <table id="example1" class="table" style="font-size:13px;">
                   <thead>
                  <tr>
                    <th>RATE CON.</th>
                    <th>LOAD DESCRIPTION</th>
                    <th>BROKER'S NAME</th>
                    <th class="text-center">REG. PICKUPS <i class="fa fa-minus"></i> REG. DROPS</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  
                <?php
                        $sql = "SELECT * FROM loads WHERE loads.totalLoadPicked < loads.totalPickups || loads.totalLoadDropped < loads.totalDrops || loads.totalDrops = 0 || loads.totalPickups = 0 ";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($query)){
                    ?>
             
                      <tr>
                         <td><?php echo $row['rateConfirmationID']; ?></td> 
                         <td><?php echo $row['loadDescription']; ?></td> 
                         <td><?php echo $row['brokerName']; ?></td> 
                         <td class="text-center"><?php echo $row['totalPickups']; ?> <i class="fa fa-minus"></i> <?php echo $row['totalDrops']; ?></td>
                        
                      <td>
                                             
                          
                  <?php  

                    if($row['totalPickups']>"0" && $row['totalDrops']>"0" && $row['status']=="0" )  

                        echo "<a href=assign_load_form.php?assign_id=".$row['id']." class='btn btn-sm btn-primary text-white'>Assign</a>

                      <a class='btn btn-sm btn-danger text-white' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-warning text-white' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>

                      <a class='btn btn-sm btn-info text-white' data-toggle='modal' data-target='#loadModal{$row["id"]}'><i class='fa fa-eye'></i></a>

                      <a class='btn btn-sm btn-success text-white' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 


                    elseif($row['totalPickups']>"0" && $row['totalDrops']=="0" && $row['status']=="0" )  

                        echo "<a class='btn btn-sm btn-danger text-white' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-info text-white' data-toggle='modal' data-target='#loadModal{$row["id"]}'><i class='fa fa-eye'></i></a>

                      <a class='btn btn-sm btn-warning text-white' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>
                       
                      <a class='btn btn-sm btn-success text-white' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 

                      elseif($row['totalPickups']=="0" && $row['totalDrops']>"0" && $row['status']=="0" )  

                        echo "<a class='btn btn-sm btn-danger text-white' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-warning text-white' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>

                      <a class='btn btn-sm btn-info text-white' data-toggle='modal' data-target='#loadModal{$row["id"]}'><i class='fa fa-eye'></i></a>
                       
                      <a class='btn btn-sm btn-success text-white' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 


                      elseif($row['totalPickups']=="0" && $row['totalDrops']=="0" && $row['status']=="0" )  

                        echo "<a class='btn btn-sm btn-danger text-white' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-warning text-white' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>

                      <a class='btn btn-sm btn-info text-white' data-toggle='modal' data-target='#loadModal{$row["id"]}'><i class='fa fa-eye'></i></a> 

                      <a class='btn btn-sm btn-success text-white' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 


                      elseif($row['totalPickups']>"0" && $row['totalDrops']>"0" && $row['status']="1" )  

                        echo "<a class='btn btn-sm btn-warning text-white' data-toggle='modal' data-target='#update_assigned_load_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a> 

                      <a href=load_delivered_receipt.php?id=".$row['id']." class='btn btn-sm btn-info'><i class='fa fa-eye'></i></</a>"; 


                    ?> 

                        </td>
                  </tr>


                  <?php 
                    $sql_registeredby = "SELECT * FROM users 
                    INNER JOIN loads 
                    ON loads.registeredBy = users.id 
                    WHERE users.id = '".$row["registeredBy"]."'";
                    $query_registeredBy = mysqli_query($conn, $sql_registeredby) or die(mysqli_error($conn));
                    $row_registeredBy = mysqli_fetch_assoc($query_registeredBy);
                  ?>

                   <?php
                          include 'update_load.php'; 
                   include 'pickups_drops_reg.php'; 
                    include 'update_assigned_load.php';
                   include 'registeredLoadDetails.php';
                   include 'load_delete_modal.php'; 
         

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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Load Registration</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
             <form class="form" method="POST" action="load.php">
                <div class="card-body">
                  <div class="row">
                      <label class="text-danger"><b>NOTE</b></label>
                      <ul>
                          <li>Please avoid using puntuation marks like:  <b> Quotation marks ("), Apostrophe (‘), Semicolon (;)</b></li>
                      </ul>
                    <div class="col-md-6">
                  <div class="input-group mb-3">
                         <input type="text" class="form-control" name="brokerName" id="brokerName" required="brokerName" placeholder="Broker's Name e.g. Reliable transportation Solution (RTS)">
                  </div>
                  
                    <div class="input-group mb-3">
                     <input type="email" class="form-control" name="brokerEmail" id="brokerEmail" placeholder="Enter Broker's Email" required="brokerEmail">
                     <input type="hidden" class="form-control" name="registeredBy" value="<?php echo $myID; ?>">
                     <span class="input-group-text"><b><i class="fa fa-envelope"></i></b></span>
                    </div>
                    
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Broker number</span>
                    </div>
                    <input type="text" name="brokerNumber" class="form-control" data-inputmask="'mask': ['+1(999)-999-9999 [x99999]', '+1(999) 99 99 99 9999[9]-9999']" data-mask>
                     <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                  </div>
                  
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" name="weight" id="weight" placeholder="Load Weight">
                         </div>

                          <div class="input-group mb-3">
                            <textarea class="form-control" name="loadDescription" id="loadDescription" placeholder="Enter Load Description"></textarea>
                          </div>
                </div>


                <div class="col-md-6"> 
                             <div class="input-group mb-3">
                                <input type="number" name="rateConfirmationID" class="form-control" id="rateConfirmationID" placeholder="Enter Rate Comfirmation ID" required="rateconfirmationID">
                              </div>
                            
                            <div class="input-group mb-3">
                              <input type="number" class="form-control" name="rate" id="rate" placeholder="Enter The Rate" required="rate">
                               <input type="hidden" class="form-control" name="registeredBy" value="<?php echo $id; ?>">
                                <input type="hidden" name="dateRegistered" class="form-control" id="dateRegistered" value="<?php echo date("Y-m-d"); ?>">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><b>USD</b></span>
                                </div>
                            </div>

                     <div class="input-group mb-3">
                      <input type="email" name="shipperEmail" class="form-control" id="shipperEmail" placeholder="Enter Shipper Email">
                    </div>

                    <div class="input-group mb-3">
                      <input type="location" name="shipperAddress" id="shipperAddress" class="form-control" placeholder="Enter Shipper Address">
                      <input type="hidden" name="status" class="form-control" id="status" value="0">
                    </div>
                   
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
               <div class="modal-footer justify-content-between bg-primary">
                  
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>

                  <button type="submit" class="btn btn-outline-light btn-primary" name="submit">Submit</button>
              </div>
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
    //Money Euro
    $('[data-mask]').inputmask()


  })
</script>

</body>
</html>
