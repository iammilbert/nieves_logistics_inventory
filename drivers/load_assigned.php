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
  <strong><a class="navbar-brand" href="#"><span class="name"><?php echo $row2["name"]; ?></span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse bold" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " href="index.php">HOME</a>
      </li>
     
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item active" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> REPORT
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

<?php 
$sql_pay = "SELECT SUM(loads.netPay) AS sum, SUM(loads.rate) AS sum2 FROM loads 
INNER JOIN loads_assigned 
ON loads_assigned.load_id = loads.id"; 
$query_pay = mysqli_query($conn, $sql_pay); 
$row_pay = mysqli_fetch_assoc($query_pay); 

$sql1 = "SELECT SUM(staff_salaries.amount) AS sum FROM staff_salaries"; 
$query1 = mysqli_query($conn, $sql1); 
$row1 = mysqli_fetch_assoc($query1);   
?>

  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ml-auto">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Back</a></li>
              <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="row"><!-- New row -->

            <div class="col card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title text-green bold">LOAD ASSIGNED</h3>
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
                    <th>RATE CON.</th>
                    <th class="text-center">REG. PICKUPS <i class="fa fa-minus"></i> REG. DROPS</th>
                     <th class="text-center">PICKED <i class="fa fa-minus"></i> DROPPEDS</th>
                    <th>STATUS</th>
                    <th></th>
                  </tr>
                  </thead>
                     <tbody>
                    <?php

                  $sql = "SELECT loads_assigned.driver_id, loads.brokerName, loads_assigned.id, loads_assigned.load_id, loads.brokerName, loads.shipperEmail, loads.shipperAddress, loads.totalPickups, loads.totalDrops, loads.totalLoadPicked, loads.totalLoadDropped, loads_assigned.id AS loadAssignedID, loads.rateConfirmationID, users.name, loads_assigned.status, users.licenseID, loads.rate FROM loads
                    INNER JOIN users
                  ON loads.driver_id = users.id
                   INNER JOIN loads_assigned
                  ON loads_assigned.load_id = loads.id WHERE loads.totalLoadDropped < loads.totalDrops AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups AND loads_assigned.driver_id = '".$myID."' || loads.totalPickups > loads.totalLoadPicked AND loads.totalDrops > loads.totalLoadDropped AND loads_assigned.driver_id = '".$myID."'";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                      ?>
                      <tr>
                         <td><?php echo $row['rateConfirmationID']; ?></td>
                          <td class="text-center"><?php echo $row['totalPickups']; ?> <i class="fa fa-minus"></i> <?php echo $row['totalDrops']; ?></td> 
                         
                         <td class="text-center"><?php echo $row["totalLoadPicked"]; ?> <i class="fa fa-minus"></i> <?php echo $row["totalLoadDropped"]; ?></td> 

                    <td><?php 
                      if($row["totalLoadDropped"] == 0 && $row["totalLoadPicked"] == 0)
                        echo "<small class='badge badge-primary'>Waiting for Pickup</small>";

                         elseif($row["totalLoadPicked"] > 0 && $row["totalPickups"] > $row["totalLoadPicked"])
                        echo "<small class='badge badge-info'>Active</small>";

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

                        echo "<a title='pick/drop load' class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><i class='fa fa-plus' style='color:white;'> Pick/Drop</i></a>";


                      elseif($row['status']== 5 )  

                       echo "<a href=load_delivered_receipt.php?id=".$row['load_id']." class='btn btn-sm btn-info'><i class='fa fa-eye'></i></</a>"; 

                      elseif($row["totalLoadDropped"] == 0 && $row["totalLoadPicked"] == 0)  

                        echo "<a class='btn btn-sm btn-success' data-toggle='modal' data-target='#pickup_drop_modal{$row["load_id"]}'><small><i class='fa fa-plus'></i> Pick/Drop</small></a>"; 


                      elseif($row["totalLoadDropped"] == $row["totalDrops"] && $row["totalLoadPicked"] == $row["totalPickups"])  

                        echo "<a title='view picked/dropped load' class='btn btn-sm btn-info' data-toggle='modal' data-target='#delivered_modal{$row["load_id"]}'><i class='fa fa-eye'></i></a>"; 


                    ?> 

                     <a href="load_Details.php?loadID=<?php echo $row["load_id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                        </td>

                      </tr>

                    <?php   
                       include 'pickLoad_dropLoad.php'; 
                       include 'pickLoad_dropLoad_delivered.php';                
              
                      }
                      

                    ?>
              
                  </tbody>
                </table>
              </div>
             
            </div>
          </div>
        </div> <!-- end of new row -->
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
      "responsive": true, "lengthChange": true, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print"]
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
