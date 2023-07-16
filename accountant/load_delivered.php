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
            <a class="dropdown-item active" href="load_delivered.php">Loads Delivered</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicle_workload.php">Vehicles Workload</a>
          </div>
        </div>

           <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkPayout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PAY-OUT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkPayout">
            <a class="dropdown-item" href="due_payment.php">Due Payment</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="payrollPaid.php">Successful Payment</a>
          </div>
        </div>

        <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownMenuLinkReport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            REPORT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkReport">
            <a class="dropdown-item" href="registered_Expenditures.php">Expenditures</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="payout_report.php">Payout</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="vehicle_income.php">Vehicles Income</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="income_Generated.php">Company Income Generated</a>
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
 $row = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row["name"]; ?></b>
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
                <a href="load_delivered.php" class="nav-link active">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Loads Delivered</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="vehicle_workload.php" class="nav-link">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Vehicles Workload</p>
                </a>
              </li>  



           <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                PAYMENT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="due_payment.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Due Payment</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="payrollPaid.php" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Successful Payment</p>
                </a>
              </li>


               <li class="nav-item">
                <a href="paid_pickups.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Paid Loads</p>
                </a>
              </li>
            </ul>
          </li>             

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                REPORT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="registered_Expenditures.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Expenditures</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="payout_report.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Pay-Out</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="vehicle_income.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Vehicles Income Generated</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="income_Generated.php" class="nav-link">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Company Income Generated</p>
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
<p></p>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

       <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header bg-success">
                <h3 class="card-title text-white bold">CURRENT DELIVERY</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>
      <table id="example2" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>RATE CON.</th>
                    <th>DELIVERY STATUS</th>
                    <th class="text-center">PICKED <i class="fa fa-minus"></i> DROPPED</th>
                    <th>BOL</th>
                    <th></th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $sql = "SELECT loads_assigned.totalLoadPicked, loads_assigned.driver_id, loads.rateConfirmationID, loads_assigned.totalLoadDropped, loads.totalPickups, loads.id, loads.bolStatus, loads.bol, loads.paymentStatus, loads.payrollStatus, loads.totalDrops FROM loads 
                    INNER JOIN loads_assigned
                    ON loads_assigned.load_id = loads.id WHERE loads.totalPickups = loads_assigned.totalLoadPicked AND loads.totalDrops = loads_assigned.totalLoadDropped AND loads.payrollStatus = 0 AND loads.pickedupTime != 0 AND loads.droppedTime != 0";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>
                      
                      <td>  
                      <?php 
                         if($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"])
                        echo "<small class='badge badge-success'>Delivered</small>"; 
                      ?>
                      </td>

                      <td class="text-center"><?php echo $row["totalLoadPicked"]; ?> <i class="fa fa-minus"></i> <?php echo $row["totalLoadDropped"]; ?></td>

                      <td>  
                      <?php 
                         if($row["bolStatus"]== 1 ){
                        echo "<i><a href='downloads.php?file_id={$row['id']}' target='_blank'> Download BOL</a></i>";
                      }

                         elseif($row["bolStatus"]== 0 ){
                        echo "<small class='badge badge-danger'>Pending</small>";
                      }
                    ?>
                      </td>

                      <td> 
                          <a href="load_delivered_receipt.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>

                         <?php 
                            if($row["payrollStatus"] == 0) 
                          echo "<a href=drivers_pay_roll_form.php?loadID=".$row['id']." class='btn btn-sm btn-info' style='font-weight: bolder;'><small><b>Prepare payroll</b></small></a>"; 
                        ?>
                      </td>
                  </tr>

                  <?php 
                  include 'makePayment.php';
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
                <h3 class="card-title"><b class="text-danger">PICKUPS DELIVERED</b> <b><sub>(Pay roll Prepaid)</sub> </b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>RATE CON.</th>
                    <th>DRIVER ID</th>
                    <th>DELIVERY STATUS</th>
                    <th>BOL</th>
                    <th>PAYMENT STATUS</th>
                    <th></th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $sql = "SELECT loads_assigned.totalLoadPicked, loads_assigned.driver_id, loads.rateConfirmationID, loads_assigned.totalLoadDropped, loads.driver_id, loads.bol, loads.bolStatus, loads.totalPickups, loads.id, loads.paymentStatus, loads.payrollStatus, loads.totalDrops FROM loads 
                    INNER JOIN loads_assigned
                    ON loads_assigned.load_id = loads.id WHERE loads.totalPickups = loads_assigned.totalLoadPicked AND loads.totalDrops = loads_assigned.totalLoadDropped AND payrollStatus = 1";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>
                    <td><small class="badge badge-info"><?php echo $row["driver_id"]; ?></small></td>
                  <td>  
                      <?php 
                         if($row["totalPickups"]==$row["totalLoadPicked"] AND $row["totalDrops"] == $row["totalLoadDropped"])
                        echo "<small class='badge badge-success'>Delivered</small>"; 
                      ?>
                      </td>

                       <td>  
                      <?php 
                         if($row["bolStatus"]== 1 ){
                        echo "<i><a href='downloads.php?file_id={$row['id']}' target='_blank'> Download BOL</a></i>";
                      }

                         elseif($row["bolStatus"]== 0 ){
                        echo "<small class='badge badge-danger'>Pending</small>";
                      }
                    ?>
                      </td>

                      <td>  
                      <?php 
                         if($row["paymentStatus"] == 1)
                        echo "<small class='badge badge-success'>PAID</small>";
                        elseif($row["paymentStatus"] == 2)  
                         echo "<small class='badge badge-danger'>On-Hold</small> ";
                       else 
                          echo "<small class='badge badge-danger'>Pending</small>"; 
                      ?>
                    </td>


                         <td>

                          <a href="load_delivered_receipt.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>

                         <?php 
                          if($row["payrollStatus"] == 1) 
                            echo "<i class='fa fa-check'></i>";
                      
                         ?>
              
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
      "lengthChange": true,
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
