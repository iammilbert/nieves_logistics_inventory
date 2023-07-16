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
    <ul class="navbar-nav" style="font-weight:bolder;">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PICKUPS
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item active" href="vehicle_workload.php">Vehicles Workload</a>
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
 $row4 = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="text-green bold"><?php echo $row4["name"]; ?></b>
        </span>
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
                <a href="load_delivered.php" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Loads Delivered</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="vehicle_workload.php" class="nav-link active">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>Vehicles Workload</p>
                </a>
              </li>  



           <li class="nav-item">
            <a href="#" class="nav-link">
              <p style="font-size:17px; font-weight: bolder;">
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
              <p style="font-size:17px; font-weight: bolder;">
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
<?php 
   if (isset($_POST['view'])) { 
    $startDate = $_POST['startDate']; 
    $endDate = $_POST['endDate']; 
    $id = $_POST['id']; 

          $sql_sum = "SELECT loads.driver_id, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.date_assigned, SUM(drivers_pay_roll.netPay) AS sum, users.name, SUM(loads.rate) AS sum2, COUNT(loads.id) AS count,  loads_assigned.assignedBy, loads.dropped_Date, loads.rateConfirmationID FROM loads 
  
            INNER JOIN vehicles_assigned
            ON vehicles_assigned.load_id = loads.id 

            INNER JOIN drivers_pay_roll 
            ON drivers_pay_roll.load_id = loads.id 

            INNER JOIN loads_assigned 
            ON loads_assigned.load_id = loads.id 

            INNER JOIN users 
            ON loads.driver_id = users.id 

            WHERE vehicles_assigned.truck = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.trailer = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.tractor = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";

    $query_sum = mysqli_query($conn, $sql_sum) or die(mysqli_error($conn)); 
    $id_row = mysqli_fetch_assoc($query_sum);

    } 
  
?>


<?php  

          $sql_sum_grand = "SELECT loads.driver_id, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.date_assigned, SUM(drivers_pay_roll.netPay) AS sum, SUM(loads.rate) AS sum2, users.name, loads_assigned.assignedBy, loads.rateConfirmationID FROM loads 
  
            INNER JOIN vehicles_assigned
            ON vehicles_assigned.load_id = loads.id 

            INNER JOIN drivers_pay_roll 
            ON drivers_pay_roll.load_id = loads.id 

            INNER JOIN loads_assigned 
            ON loads_assigned.load_id = loads.id 

            INNER JOIN users 
            ON loads.driver_id = users.id 

            WHERE vehicles_assigned.truck = '".$id."' AND loads.paymentStatus = 1 OR vehicles_assigned.trailer = '".$id."' AND loads.paymentStatus = 1 OR vehicles_assigned.tractor = '".$id."' AND loads.paymentStatus = 1";

    $query_grand = mysqli_query($conn, $sql_sum_grand) or die(mysqli_error($conn)); 
    $grand_row = mysqli_fetch_assoc($query_grand); 
  
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"><!-- New container --> 

          <div class="row"><!-- New row --> 
            <div class="col"> <!-- New col --> 
              <div class="card card"> <!-- New card --> 
                 <div class="card-header">
                  <h3 class="card-title"><b>VEHICLE <emp class="text-primary"><?php echo $id; ?></emp> REPORT FROM</b>  <small class="badge badge-warning"><?php $start = $_POST['startDate']; echo DateTime::createFromFormat('Y-m-d', $start)->format('l jS F Y');?></small> - <small class="badge badge-success"><?php $end = $_POST['endDate']; echo DateTime::createFromFormat('Y-m-d', $end)->format('l jS F Y'); ?></small></h3>
                </div>
                <div class="card-body"><!-- New body --> 
                  <table id="example2" class="table" style="font-size:14px;">
                   <thead>
                     <tr>
                    <th>S/N</th>
                    <th>RATE CON.</th>
                    <th>DRIVER'S NAME</th>
                    <th>RATES</th>
                    <th>DRIVER'S PAY</th>
                    <th>EARNING</th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $no = 1; 

                    if (isset($_POST['view'])) {
                      $startDate = $_POST['startDate'];
                      $endDate = $_POST['endDate'];
                      $id = $_POST['id'];

                    $sql = "SELECT loads.driver_id, vehicles_assigned.truck, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.date_assigned, drivers_pay_roll.netPay, users.name, loads.rate, loads_assigned.assignedBy, loads.dropped_Date, loads.rateConfirmationID FROM loads 
                    INNER JOIN vehicles_assigned
                    ON vehicles_assigned.load_id = loads.id 

                    INNER JOIN drivers_pay_roll
                    ON drivers_pay_roll.load_id = loads.id

                    INNER JOIN loads_assigned
                    ON loads_assigned.load_id = loads.id 

                    INNER JOIN users 
                    ON loads.driver_id = users.id 

                    WHERE vehicles_assigned.truck = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.trailer = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."' OR vehicles_assigned.tractor = '".$id."' AND loads.paymentStatus = 1  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";

                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>

                    <td><?php echo $row['name']?> <small class="badge badge-info"><?php echo $row['driver_id']?></small></td> 

                    <td>$<?php echo $row['rate']?></td>
                    <td>$<?php echo $row['netPay']?></td>
                    <td style="font-weight:bolder;">
                    <?php  
                    $earn = $row["rate"] - $row["netPay"]; 
                    echo $earn; ?> <sup style="font-weight:bolder; color:green">USD</sup>
                      
                    </td>


                  </tr>

                  <?php 
                  $no++;

                }
              }

                ?>

                
                  </tbody>
                  
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  <th>SUM TOTAL</th> 
                  <th><h3 class="badge badge-success">$<?php $earning = $id_row["sum2"] - $id_row["sum"]; echo round($earning, 2);?><sup>USD</sup></h3></th>
                  </tr>
                </tfoot>
                </table>                   
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div> <!-- /.col -->
        </div><!-- End row --> 




             <div class="row"> <!-- New row --> 

            <div class="col"><!-- New Col --> 
              <form class="form" action="drivers_weekly_payroll.php" method="POST"><!-- New Form --> 
                <div class="card-body"><!-- Card --> 

                  <div class="row"> 
                    <div class="col-md-3">
                      
                    </div>
                  
                      <p></p>



                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                          <div class="form-group">
                             <label class="font-size-24 text-center text-danger"><b>GRAND TOTAL GENERATED</b></label>
                              <input style="text-align: right; border-style:none;" class="form-control font-size-30 bold text-center" type="text" name="grandTotal" value="<?php $grand = $grand_row["sum2"] - $grand_row["sum"]; echo number_format($grand, 2, '.', ',');?> USD" readonly>
                          </div>
                        </div>
            
                         </div>

                        <div class="input-group mb-3">
                        <a class="btn btn-danger btn-lg" href="vehicle_workload.php"> << Back</a>
                      </div>

                  </div>

                  <div class="col-md-3">
                      
                  </div>
                  </div>

                </div>

            </form>
          </div> 

            </div><!--/ End row --> 


          </div> <!-- /.container fluid -->
        </section><!-- /.content --> 
      </div><!-- /.content-wrapper -->

<?php include('../footer.php'); ?>
<script src="../plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      "header":true,
      "footer": true,
    });

 //Initialize Select2 Elements
    $('.select2').select2()

 //Initialize Select2 Elements
       $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
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

  // DropzoneJS Demo Code End
</script>
</body>
</html>




