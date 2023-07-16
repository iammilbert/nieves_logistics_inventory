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
            <a class="dropdown-item" href="load_delivered.php">My Pay roll</a>
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
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <p></p>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title bold text-danger">REGISTER LOAD</h3>
              </div>
              <!-- /.card-header -->
                    <div class="card-header ml-auto">
                      <a class="btn btn-primary text-white" data-toggle="modal" data-target="#modal-primary"><i class="fa fa-plus text-white"></i> Load</a>
                </div>
              <div class="card-body">
               <table id="example1" class="table font-size-13">
                   <thead>
                  <tr>
                    <th>RATE CON.</th>
                    <th>LOAD DESCRIPTION</th>
                    <th>BROKER NAME</th>
                     <th class="text-center">PICKUPS <i class="fa fa-minus"></i> DROPS</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  
                <?php
                      $id = $_SESSION['Despatcher_id'];
                      $sql = "SELECT * FROM loads WHERE loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalLoadDropped < loads.totalDrops AND loads.registeredBy = '".$id."' || loads.totalDrops = 0 AND loads.registeredBy = '".$id."' || loads.totalPickups = 0 AND loads.registeredBy = '".$id."'";
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

                        echo "<a href=assign_load_form.php?assign_id=".$row['id']." class='btn btn-sm btn-success'>Assign</a>

                      <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-warning' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>

                      <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 


                    elseif($row['totalPickups']>"0" && $row['totalDrops']=="0" && $row['status']=="0" )  

                        echo "<a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#loadModal{$row["id"]}'><i class='fa fa-eye'></i></a>

                      <a class='btn btn-sm btn-warning' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>
                       
                      <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 

                      elseif($row['totalPickups']=="0" && $row['totalDrops']>"0" && $row['status']=="0" )  

                        echo "<a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-warning' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>

                      <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#loadModal{$row["id"]}'><i class='fa fa-eye'></i></a>
                       
                      <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 


                      elseif($row['totalPickups']=="0" && $row['totalDrops']=="0" && $row['status']=="0" )  

                        echo "<a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete{$row["id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-warning' data-toggle='modal' data-target='#updateLoad_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a>

                      <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#loadModal{$row["id"]}'><i class='fa fa-eye'></i></a> 

                      <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["id"]}'><small><i class='fa fa-plus'></i> P/D</small></a>"; 


                      elseif($row['totalPickups']>"0" && $row['totalDrops']>"0" && $row['status']="1" )  

                        echo "<a class='btn btn-sm btn-warning' data-toggle='modal' data-target='#update_assigned_load_Modal{$row["id"]}'><small><i class='fa fa-edit'></i></small></a> 

                      <a href=loadDetails.php?id=".$row['id']." class='btn btn-sm btn-info'><i class='fa fa-eye'></i></</a>"; 
                    ?> 

                        </td>
                  </tr>

                  <?php 
                    $sql_registeredby = "SELECT * FROM users WHERE users.id = '".$row["registeredBy"]."'";
                    $query_registeredBy = mysqli_query($conn, $sql_registeredby) or die(mysqli_error($conn));
                    $row_registeredBy = mysqli_fetch_assoc($query_registeredBy);
                  ?>

                   <?php
                  include 'update_load.php'; 
                   include 'update_assigned_load.php'; 
                   include 'pickups_drops_reg.php'; 
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
                         <!-- form start -->
              <form class="form" method="POST" action="load_form_submit.php">
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
                     <input type="hidden" class="form-control" name="registeredBy" value="<?php echo $id; ?>">
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
