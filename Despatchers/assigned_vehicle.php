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
             <a class="dropdown-item active" href="assigned_vehicle.php">Vehicles Assigned</a>
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
                <a href="assigned_vehicle.php" class="nav-link active">
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
                <h3 class="card-title bold text-danger">VEHICLES ASSIGNED</h3>
              </div>
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
                       <th>DRIVER</th>
                    <th>RATE CON.</th>
                    <th>TRUCK</th>
                    <th>TRAILER</th>
                    <th>TRACTOR</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>

                   <?php
                   $id = $_SESSION["Despatcher_id"];
                       $sql = "SELECT loads.totalPickups, loads.totalDrops, loads.rateConfirmationID, loads.totalLoadPicked, loads.totalLoadDropped, vehicles_assigned.load_id, vehicles_assigned.truck, vehicles_assigned.status, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.load_id, loads.rateConfirmationID, users.name FROM vehicles_assigned 
                          INNER JOIN loads
                          ON vehicles_assigned.load_id = loads.id 
                          INNER JOIN users 
                          ON vehicles_assigned.driver_id = users.id 
                      WHERE loads.totalLoadDropped < loads.totalDrops AND loads.registeredBy = '".$id."' || loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups AND loads.registeredBy = '".$id."' || loads.totalPickups > loads.totalLoadPicked AND loads.totalDrops > loads.totalLoadDropped AND loads.registeredBy = '".$id."'";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($query)){
                    ?>
             
                      <tr>
                         <td><?php echo $row['name']; ?></td>
                         <td><a class='btn badge badge-primary text-white' data-toggle='modal' data-target='#editModal<?php echo $row['rateConfirmationID']; ?>'><?php echo $row['rateConfirmationID']; ?></a></td>
                         
                                           <td>
                             <?php 
                                if($row["truck"]=="N/A" OR empty($row["truck"])){
                                echo "<i class='badge badge-danger'>N/A</i>";  
                                }
                                else{
                                    echo "<a class='btn badge badge-success text-white' data-toggle='modal' data-target='#viewInfo{$row['truck']}'>{$row['truck']}</a>";
                                }
                            ?>
                        </td>
                         
                         <td>
                             <?php 
                                if($row["trailer"]=="N/A" OR empty($row["trailer"])){
                                echo "<i class='badge badge-danger'>N/A</i>"; 
                                }
                                else{
                                    echo "<a class='btn badge badge-info text-white' data-toggle='modal' data-target='#viewTrailer{$row['trailer']}'>{$row['trailer']}</a>";
                                }
                            ?>
                        </td>
                        
                         <td>
                             <?php 
                                if($row["tractor"]=="N/A" OR empty($row["tractor"])){
                                echo "<i class='badge badge-danger'>N/A</i>"; 
                                }
                                else{
                                    echo "<a class='btn badge badge-success text-white' data-toggle='modal' data-target='#viewTractor{$row['tractor']}'>{$row['tractor']}</a>";
                                }
                            ?>
                        </td>
                        
                        
                         <td>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row['load_id']; ?>"><i class="fa fa-edit"></i>Reassign</a>

                        </td>
                      </tr>

                    <?php                      
                    include 'vehicle_details.php';
                     include 'truck_info_modal.php';
                     include 'editAssigned_vehicleModal.php';
                     include 'trailer_info_modal.php';
                     include 'tractor_info_modal.php';
  
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

<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Vehicle Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="delete_truck_query.php" method="POST">
                   <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Vehicle ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-danger"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('../footer.php'); ?>
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- Delete Truck -->
<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>



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
