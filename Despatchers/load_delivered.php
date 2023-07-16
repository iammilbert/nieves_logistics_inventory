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
                <a href="load_delivered.php" class="nav-link active">
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
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-danger bold">RECENT LOADS DELIVERED/CANCELLED</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>RATE CON.</th>
                    <th>DELIVERY STATUS</th>
                    <th>BOL</th>
                    <th>PAYMENT</th>
                    <th></th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $id = $_SESSION['Despatcher_id'];

                    $sql = "SELECT loads_assigned.totalLoadPicked, loads_assigned.driver_id, loads.rateConfirmationID, loads_assigned.totalLoadDropped, loads.totalPickups, loads.id, loads.bol, loads.bolStatus, loads.paymentStatus, loads.payrollStatus, loads.pickedupTime, loads.droppedTime, loads.totalDrops FROM loads 
                    INNER JOIN loads_assigned
                    ON loads_assigned.load_id = loads.id WHERE loads.totalPickups = loads_assigned.totalLoadPicked AND loads.totalDrops = loads_assigned.totalLoadDropped AND loads.registeredBy = '".$id."' AND DATEDIFF(now(), loads.dropped_Date) < 1";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>
                  <td>  
                      <?php 
                         if($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]!= "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]!= ""){
                        echo "<small class='badge badge-success'>Delivered</small>";
                      }

                          elseif($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]== "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]== ""){
                        echo "<small class='badge badge-danger'>Cancelled</small>";
                      }

                      ?>
                      </td>

                      <td>
                         <?php 
                         if($row["bolStatus"]== 1 ){
                        echo "<i><a href='downloads.php?file_id={$row['id']}' target='_blank'> Download BOL</a></i>";
                      }
                             elseif($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]== "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]== ""){
                        echo "<small class='badge badge-danger'>N/A</small>";
                      }
                           else
                          echo "<small class='badge badge-warning'>Pending</small>"; 
                         ?>
                      </td>
                      

                      <td>  
                      <?php 
                         if($row["paymentStatus"] == 1){
                        echo "<small class='badge badge-success'>PAID</small>";
                    }
                        elseif($row["paymentStatus"] == 2)  {
                         echo "<small class='badge badge-info'>On-Hold</small> ";
                        }

                       elseif($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]== "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]== ""){
                        echo "<small class='badge badge-danger'>N/A</small>";
                      }
                       else 
                          echo "<small class='badge badge-warning'>Pending</small>"; 
                      ?>
                    </td>
                    
                     <td>   
                          <?php 

                          if ($row["bolStatus"] == 1) {
                           echo  "<a href='bol_form.php?loadID={$row['id']}' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i> BOL</a>";

                          }
                          else echo 
                            "<a href='bol_form.php?loadID={$row['id']}' class='btn btn-primary btn-sm'><i class='fa fa-upload'></i> BOL</a>" ;                           
                          ?>
                          
                            <a href="load_delivered_receipt.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                </td>
                      </tr>

            <?php 
              $sql_driver = "SELECT * FROM drivers_pay_roll 
              INNER JOIN loads
              ON drivers_pay_roll.load_id = loads.id 
              INNER JOIN users 
              ON drivers_pay_roll.driver_id = users.id WHERE drivers_pay_roll.load_id = '".$row["id"]."'"; 
              $query_driver = mysqli_query($conn, $sql_driver) or die(mysqli_error($conn)); 
              $row_driver = mysqli_fetch_assoc($query_driver);
            ?>

                  <?php 
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


 <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-danger bold">ALL LOADS DELIVERED/CANCELLED</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
  
               <table id="example2" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>RATE CON.</th>
                    <th>DELIVERY STATUS</th>
                    <th>BOL</th>
                    <th>PAYMENT STATUS</th>
                    <th></th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $id = $_SESSION['Despatcher_id'];

                    $sql = "SELECT loads_assigned.totalLoadPicked, loads.dropped_Date, loads_assigned.driver_id, loads.rateConfirmationID, loads_assigned.totalLoadDropped, loads.totalPickups, loads.id, loads.bol, loads.bolStatus, loads.paymentStatus, loads.payrollStatus, loads.pickedupTime, loads.droppedTime, loads.totalDrops FROM loads 
                    INNER JOIN loads_assigned
                    ON loads_assigned.load_id = loads.id WHERE loads.totalPickups = loads_assigned.totalLoadPicked AND loads.totalDrops = loads_assigned.totalLoadDropped AND loads.registeredBy = '".$id."' AND DATEDIFF(now(), loads.dropped_Date) >= 1";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>
                  <td>  
                      <?php 
                         if($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]!= "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]!= ""){
                        echo "<small class='badge badge-success'>Delivered</small>";
                      }

                          elseif($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]== "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]== ""){
                        echo "<small class='badge badge-danger'>Cancelled</small>";
                      }

                      ?>
                      </td>

                 <td>
                         <?php 
                         if($row["bolStatus"]== 1 ){
                        echo "<i><a href='downloads.php?file_id={$row['id']}' target='_blank'> Download BOL</a></i>";
                      }
                             elseif($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]== "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]== ""){
                        echo "<small class='badge badge-danger'>N/A</small>";
                      }
                           else
                          echo "<small class='badge badge-warning'>Pending</small>"; 
                         ?>
                      </td>

                      <td>  
                      <?php 
                         if($row["paymentStatus"] == 1){
                        echo "<small class='badge badge-success'>PAID</small>";
                    }
                        elseif($row["paymentStatus"] == 2)  {
                         echo "<small class='badge badge-info'>On-Hold</small> ";
                        }

                       elseif($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["pickedupTime"]== "" || $row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"] AND $row["droppedTime"]== ""){
                        echo "<small class='badge badge-danger'>N/A</small>";
                      }
                       else 
                          echo "<small class='badge badge-warning'>Pending</small>"; 
                      ?>
                    </td>
                    <td>
                          <a href="load_delivered_receipt.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

                        </td> 
                      </tr>

            <?php 
              $sql_driver = "SELECT * FROM drivers_pay_roll 
              INNER JOIN loads
              ON drivers_pay_roll.load_id = loads.id 
              INNER JOIN users 
              ON drivers_pay_roll.driver_id = users.id WHERE drivers_pay_roll.load_id = '".$row["id"]."'"; 
              $query_driver = mysqli_query($conn, $sql_driver) or die(mysqli_error($conn)); 
              $row_driver = mysqli_fetch_assoc($query_driver);
            ?>

                  <?php 
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
      "searching": true,
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

</body>
</html>
