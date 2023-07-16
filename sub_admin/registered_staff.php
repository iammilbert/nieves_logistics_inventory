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
                <a href="registered_staff.php" class="nav-link active">
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
     
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
                <h3 class="card-title"><b style="color:red;">REGISTERED STAFF</b></h3>
              </div>
              <div class="modal-header">             
                    <h6 ><i class="fas fa-info" style="color:red;"></i> You can also click on name to Delete Staff Record</h6>
              </div>
              <div class="card-body">
                      <?php if (isset($_GET['error'])) { ?>
                        <div style="background:#FFD2D2; color: #D8000C; font-size: 20px;"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div style="background: #DFF2BF; color: #4F8A10; font-size: 20px;"><?php echo $_GET['success']; ?></div>
                      <?php } ?>


                <table id="example1" class="table" style="font-size:13px;">
                  <thead>
                   <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>TELEPHONE</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                                  <?php
              
                      $sql="SELECT * FROM users WHERE users.role = 'Staff' OR users.role = 'Despatcher' OR users.role = 'Accountant'";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                         <td><a class="deletebtn" name="delete" style="font-size:15px; font-weight: bolder;"><?php echo $row['name']; ?></a></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        
                        <td>
                          <button class="btn btn-sm btn-primary"data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['id']?>"><span class="fas fa-eye"></span> Report</button>

                         
                        </td>

                      </tr>

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


       <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Staff Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="delete_staff.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Staff ??</h4>
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

<!-- Delete Driver -->
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


</body>
</html>
