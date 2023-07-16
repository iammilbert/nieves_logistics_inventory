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
  <strong><a class="navbar-brand" href="#"><span class="name"><?php $text = $row2["name"]; echo strtok($text, " ");?> INVENTORY</span></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse bold" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">HOME</a>
      </li>
     
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false" > PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item active" href="load_delivered.php">Loads Delivered</a>
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

    <div class="content-header">
    </div>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row"><!-- New row -->
            <div class="col card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title text-danger bold">LOAD DELLIVERED</h3>
              </div>

                 <?php if (isset($_GET['error'])) { ?>
                        <div class="error"> <?php echo $_GET['error']; ?> </div>
                      <?php } ?>


                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } 
                    ?>
              <div class="card-body">
                  <table id="example2" class="table font-size-13">
                    <thead style="color: black;">
                    <tr>
                      <th>RATE CON.</th>
                       <th>DATE</th>
                       <th>BOL</th>
                       <th>STATUS</th>
                      <th></th>
                    </tr>
                    </thead>
                </tbody>
                <?php

                  $sql = "SELECT * FROM loads WHERE loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops = loads.totalLoadDropped AND loads.paymentStatus =0 AND loads.pickedupTime != 0 AND loads.droppedTime != 0  AND loads.driver_id = '".$myID."' ";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row_complete = mysqli_fetch_assoc($query)){
                    ?>
                      <tr>
                         <td><?php echo $row_complete['rateConfirmationID']; ?></td>
                      <td><?php echo $row_complete['dropped_Date']; ?> 
                        <?php 
                           $date = $row_complete['droppedTime']; 
                           $dropped_Time = date('h:i a', strtotime($date)); 
                           echo $dropped_Time; 
                         ?>
                       </td>

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
                                <?php 
                                   if($row_complete["totalPickups"]==$row_complete["totalLoadPicked"] AND $row_complete["totalDrops"] == $row_complete["totalLoadDropped"] AND $row_complete["pickedupTime"] !=0 AND $row_complete["droppedTime"] != 0)
                                  echo "<small class='badge badge-success'>Delivered</small>";

                                elseif($row_complete["totalPickups"]==$row_complete["totalLoadPicked"] AND $row_complete["totalDrops"] == $row_complete["totalLoadDropped"] AND $row_complete["pickedupTime"] ==0 AND $row_complete["droppedTime"] == 0)
                                  echo "<small class='badge badge-danger'>Cancelled</small>";

                                elseif($row_complete["totalLoadPicked"]== 0 AND $row_complete["totalLoadDropped"]==0 AND $row_complete["status"]== 1)
                                  echo "<small class='badge badge-info'>waiting fOr Pickup</small>"; 

                                elseif($row_complete["totalLoadPicked"] > 0 AND $row_complete["totalLoadDropped"]==0 AND $row_complete["status"]== 1)
                                  echo "<small class='badge badge-primary'>Load Picked</small>"; 
                                ?>
                            </td>

                        <td>   
                          <?php 

                          if ($row_complete["bolStatus"] == 1) {
                           echo  "<a href='bol_form.php?loadID={$row_complete['id']}' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i> BOL</a>";

                          }
                          else echo 
                            "<a href='bol_form.php?loadID={$row_complete['id']}' class='btn btn-primary btn-sm'><i class='fa fa-upload'></i> BOL</a>" ;                           
                          ?>

                          

                        <a href="load_Details.php?loadID=<?php echo $row_complete["id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>



                        </td>
                      </tr>

                    <?php 

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
