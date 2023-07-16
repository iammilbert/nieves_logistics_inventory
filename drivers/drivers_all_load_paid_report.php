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

 $sql4 = "SELECT * FROM companyinfo"; 
 $query4 = mysqli_query($conn, $sql4); 
 $row4 = mysqli_fetch_assoc($query4);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <strong><a class="navbar-brand" href="#"><span class="name"><?php $text = $row4["name"]; echo strtok($text, " ");?> INVENTORY</span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse bold" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php" >HOME</a>
      </li>
     
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item active" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> REPORT
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
        <a class="nav-link" href="#" > <span class="sr-only">(current)</span></a>
      </li>


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
    </div>
  </div>
</nav>




  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 card-header">
          <div class="col-sm-6">
              <a href="total_earning.php" class="btn btn-danger btn-sm">Go Back</a>

          </div><!-- /.col -->
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
              <!-- /.card-header -->
              <div class="card-body">
                <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>
                <table id="example1" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>RATE CON.</th>
                    <th>DRIVER WAGES</th>
                    <th>BOL</th>
                   <th>DATE PAID</th>
                    <th></th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                    if (isset($_POST["submit"])) {
                      $startDate = $_POST['startDate'];
                      $endDate = $_POST['endDate'];
                      $driver_id = $_POST['driver_id'];

                     $sql = "SELECT loads.driver_id, loads.id, users.name, loads.bol, loads.timePaid, loads.rateConfirmationID, loads.netPay, loads.datePaid, loads.paidBy FROM loads 
                     INNER JOIN users 
                     ON loads.driver_id = users.id WHERE loads.driver_id = '".$driver_id."' AND loads.dropped_Date BETWEEN '".$startDate."' AND '".$endDate."' AND loads.paymentStatus = 1";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $row["rateConfirmationID"]; ?></td> 
                    
                    <td><?php echo $row["netPay"]; ?> <sup class="text-green bold">USD</sup></td>

                     <td><?php echo $row["datePaid"]; ?> <?php echo $row["timePaid"]; ?></td>

                        <td>  
                      <?php 
                         if($row_complete["bolStatus"]== 1 ){
                        echo "<i><a href='downloads.php?file_id={$row_complete['id']}' target='_blank'> Download BOL</a></i>";
                      }

                         elseif($row_complete["bolStatus"]== 0 ){
                        echo "<small class='badge badge-danger'>Pending</small>";
                      }
                    ?>
                      </td>

             

                         <td>

                          <a href="load_Details.php?loadID=<?php echo $row["id"];?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>

                           
                        </td>

                  </tr>


                  <?php 
                }
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
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
