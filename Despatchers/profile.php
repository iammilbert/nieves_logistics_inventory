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
        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="editProfile.php" class="btn btn-sm btn-danger"><i class="fa fa-edit"></i> Profile</a></li>

               <li class="breadcrumb-item"><a href="printProfile.php" class="btn btn-sm btn-primary"> <i class="fa fa-print"></i> Print</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <div class="row">

          <div class="col-md-2">
            
          </div>
          <div class="col">
               <?php 

                $userID = $_SESSION['Despatcher_id']; 
                $sql = "SELECT * FROM users WHERE users.id = '".$userID."'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>

              <?php 
                $sql1 = "SELECT COUNT(loads.id) AS sum FROM loads WHERE loads.driver_id = '".$userID."'";
                $query1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($query1);
              ?>

               <?php 
                $sql2 = "SELECT SUM(wages.amountPaid) AS sum2 FROM wages WHERE wages.driver_id = '".$userID."'";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
              ?>

               <?php 
                $sql3 = "SELECT SUM(drivers_pay_roll.netPay) AS sum3 FROM drivers_pay_roll WHERE drivers_pay_roll.driver_id = '".$userID."' AND drivers_pay_roll.paymentStatus = 0";
                $query3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($query3);
              ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../picture/<?=$row['picture']?>"
                       alt="User profile picture" style="height: 99px;">
                </div>



                <h3 class="profile-username text-center"><b><?php echo $row["name"]; ?></b></h3>
                <h3 class="profile-username text-center"><i class="fas fa-map-marker-alt mr-1"></i><?php echo $row["address"]; ?></h3>

                <p class="text-muted text-center">Dispatcher</p>

                <ul class="list-group list-group-unbordered mb-3">
                  
                    <?php 
                    if ($row["role"]=="Driver") {
                      echo "<li class='list-group-item'><b>Total Pickups</b> <a class='float-right'>{$row1["sum"]}</a></li>
                      <li class='list-group-item'><b>Current Balance</b> <a class='float-right'>{$row3["sum3"]}<b>USD</b></a></li>";
                    }
                    ?>

                   <li class="list-group-item">
                    <?php 
                    if ($row["role"]=="Admin" OR $row["role"]=="Accountant" OR $row["role"]=="Despatcher") {
                      echo "<b>Salary</b> <a class='float-right'>{$row["salary"]} <b>NGN</b></a>";
                    }
                    else
                       echo "<b>Total Income</b> <a class='float-right'>{$row2["sum2"]}<b>USD</b></a>";
                    ?>
                    
                      
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bank Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-building mr-1"></i> Bank Name</strong>

                <p class="text-muted">
                 <?php echo $row["bankName"]; ?>
                </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Account Number</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?php echo $row["accountNumber"]; ?></span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Account Name</strong>

                <p class="text-muted"><?php echo $row["accountName"]; ?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-2">
          
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
