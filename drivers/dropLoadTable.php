<?php  
include 'expiredSession.php'; 
?> 
<!DOCTYPE html>
<html lang="en">
  <?php include('../head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 
$myID = $_SESSION["ID"];

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row2 = mysqli_fetch_assoc($query);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand name bold" href="#"><?php echo $row2["name"];?> </a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link bold" href="index.php">HOME</a>
      </li>
     
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle bold" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item active" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> REPORT
        </a>
        <div class="dropdown-menu" aria-labelledby="workload">
          <a class="dropdown-item" href="load_report.php">Loads Report</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="payment_report.php">Payment Report</a>

           <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_cancel.php">Load Cancelled</a>
        </div>
      </li>


       <div class="nav-item" id="ex2">
          <span class="fa-stack has-badge" data-count="9">      
            <i class="fa fa-bell fa-stack-1x fa-inverse font-size-20"></i>
          </span>
      </div>


      <li class="nav-item active">
        <a class="nav-link bold" href="#"> <span class="sr-only">(current)</span></a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fa fa-user-circle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false font-size-23">
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
    </div>
  </div>
</nav>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ml-auto">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-sm btn-danger" href="assigned_load.php">Back</a></li>
              <li class="breadcrumb-item"><a class="btn btn-sm btn-primary" href="index.php">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
<?php 
 $load_id = isset($_GET['load_id']) ? $_GET['load_id'] : '';

?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- New row -->
          <div class="row">
     
          <div class="col">
            <div class="card card-danger card-outline">
              <div class="card-header bg-info">
                <h3 class="card-title"><b>TOTAL PICKUPS</b></b></h3>
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
                    <th>RATE CONFIRMATION</th>
                    <th>LOAD DESCRIPTION</th>
                    <th>DROP NAME</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  
               <?php

                  $sql = "SELECT loads.rateConfirmationID, drops.id, drops.status, loads.loadDescription, loads.dateRegistered, drops.load_id, drops.name FROM drops
                  INNER JOIN loads
                  ON drops.load_id = loads.id
                  WHERE drops.driver_id = '".$myID."' AND drops.load_id = '".$load_id."' ORDER BY loads.dateRegistered DESC";

                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                      ?>
                      <tr>
                         <td><?php echo $row['rateConfirmationID']; ?></td>
                          <td><?php echo $row['loadDescription']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>

                         <?php 
                            if($row["status"] == 3) 
                          echo "<button class='badge badge-success' disabled>Dropped</button>"; 

                        elseif($row["status"] == 4) 
                          echo "<button class='badge badge-danger' disabled>Cancelled</button>"; 

                        elseif($row["status"] == 0) 
                          echo "<a href=dropLoadForm.php?dropID=".$row['id']." class='btn btn-sm btn-primary' style='font-weight: bolder;'>Drop</a>

                         <a title='Cancel'  style='font-weight: bolder; color: white;' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#cancelModal{$row["id"]}'><i class='fa fa-window-close'></i></a> ";

                         ?>

              
                        </td>
                      </tr>

                    <?php

                    include 'cancel_Drop_Modal.php'; 

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
      </div>
    </section>

<?php include 'footer.php'; ?>

<script>
  $(function () {
    $('#ActiveLoad').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
