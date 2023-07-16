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
            <a class="dropdown-item active" href="assigned_load.php">Pickups Assigned</a>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-danger bold">ASSIGNED LOADS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>

                <table id="example1" class="table font-size-13">
                  <thead>
                  <tr>
                    <th>RATE CON.</th>
                    <th>DRIVER NAME</th>
                    <th class="text-center">REG. PICKUPS <i class="fa fa-minus"></i> REG. DROPS</th>
                     <th class="text-center">PICKED <i class="fa fa-minus"></i> DELIVERY</th>
                    <th>STATUS</th>
                    <th></th>
                  </tr>
                  </thead>
                     <tbody>
                    <?php
                    $id = $_SESSION["Despatcher_id"];
                   $sql = "SELECT loads_assigned.driver_id, loads.brokerName, loads_assigned.id, loads_assigned.load_id, loads.brokerNumber, loads.shipperEmail, loads.shipperAddress, loads.totalPickups, loads.totalDrops, loads.totalLoadPicked, loads.totalLoadDropped, loads_assigned.id AS loadAssignedID, loads.rateConfirmationID, users.name, loads_assigned.status, users.licenseID, loads.rate FROM loads
                    INNER JOIN users
                  ON loads.driver_id = users.id
                   INNER JOIN loads_assigned
                  ON loads_assigned.load_id = loads.id WHERE loads.totalLoadDropped < loads.totalDrops AND loads.registeredBy = '".$id."' || loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalPickups > loads.totalLoadPicked AND loads.totalDrops > loads.totalLoadDropped AND loads.registeredBy = '".$id."'";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                      ?>
                      <tr>
                         <td><?php echo $row['rateConfirmationID']; ?></td>
                        <td><?php echo $row['name']; ?></td> 
                        <td class="text-center"><?php echo $row['totalPickups']; ?> Pickup(s) <i class="fa fa-minus"></i> <?php echo $row['totalDrops']; ?> Drop(s)</td> 
                         <td class="text-center"><?php echo $row["totalLoadPicked"]; ?> Pickup<i class="fa fa-minus"></i> Stop <?php echo $row["totalLoadDropped"]; ?></td>
                         
    
                    <td><?php 
                      if($row["totalLoadDropped"] == 0 && $row["totalLoadPicked"] == 0)
                        echo "<small class='badge badge-primary'>Waiting for Pickup</small>";

                         elseif($row["totalLoadPicked"] > 0 && $row["totalPickups"] > $row["totalLoadPicked"])
                        echo "<small class='badge badge-info'>Driving</small>";

                       elseif($row["totalPickups"] > $row["totalLoadPicked"] || $row["totalDrops"] > $row["totalLoadDropped"])
                        echo "<small class='badge badge-primary'>Active</small>";

                        elseif($row["totalLoadDropped"] == $row["totalDrops"] && $row["totalLoadPicked"] == $row["totalPickups"])  echo "<small class='badge badge-success'>Delivered</small> ";

                        elseif($row["status"] == 4) 
                        echo "<small class='badge badge-warning'>Cancelled</small>";

                        elseif($row["status"] == 5) 
                        echo "<small class='badge badge-danger'>Not Delivered</small>";
                      
                        elseif($row["status"] == 0) 
                        echo "<small class='badge badge-warning'>Pending</small>";
                      ?></td>

                  <td>
                    <?php  

                    if($row["totalLoadPicked"] > 0 && $row["totalPickups"] > $row["totalLoadPicked"])  

                       echo "<a class='btn btn-sm btn-primary' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><small><i class='fa fa-plus'></i> Pick/Drop</small></a>";


                    elseif($row['status']== 4)  

                        echo "<a href=load_delivered_receipt.php?id=".$row['load_id']." class='btn btn-sm btn-primary'><i class='fa fa-eye'></i></</a>";

                      elseif($row["totalPickups"] > $row["totalLoadPicked"] || $row["totalDrops"] > $row["totalLoadDropped"])  

                        echo "

                      <a title='pick/drop load' class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><small><i class='fa fa-plus'> P/D</i></small></a>";


                    elseif($row['status']== 0)  

                        echo "<a href=load_delivered_receipt.php?id=".$row['load_id']." class='btn btn-sm btn-info'><i class='fa fa-eye'></i></</a>"; 

                      elseif($row['status']== 5 )  

                       echo "<a href=load_delivered_receipt.php?id=".$row['load_id']." class='btn btn-sm btn-info'><i class='fa fa-eye'></i></</a>"; 

                      elseif($row["totalLoadDropped"] == 0 && $row["totalLoadPicked"] == 0)  

                        echo "<a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#deletemodal{$row["load_id"]}'><i class='fa fa-trash'></i></a> 

                      <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><small><i class='fa fa-plus'></i> Pick/Drop</small></a>"; 


                      elseif($row["totalLoadDropped"] == $row["totalDrops"] && $row["totalLoadPicked"] == $row["totalPickups"])  

                        echo "<a title='view picked/dropped load' class='btn btn-sm btn-info' data-toggle='modal' data-target='#delivered_modal{$row["load_id"]}'><i class='fa fa-eye'></i></a>"; 


                    ?> 

                    <a title="Reassign" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row["load_id"]; ?>"><small><i class="fa fa-edit"></i> Reassign</small></a>
 <a title="Cancel Load" class="btn btn-sm btn-danger" href="cancel_assigned_load.php?loadID=<?php echo $row["load_id"]; ?>"><small><i class="fa fa-close"></i> Cancel load</small></a>

                        </td>

                      </tr>

                    <?php 
                    include 'delete_assigned_load_modal_form.php';    
                       include 'pickLoad_dropLoad.php'; 
                       include 'pickLoad_dropLoad_delivered.php'; 
                       include 'edit_Modal.php';                
              
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

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('../footer.php'); ?>
<script src="plugins/select2/js/select2.full.min.js"></script>
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
