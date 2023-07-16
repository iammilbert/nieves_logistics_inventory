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
            <a class="dropdown-item" href="load_delivered.php">Pickups Delivered</a>
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
                <a href="load_delivered.php" class="nav-link">
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



           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p class="font-size-17 bold">
                PAYMENT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="due_payment.php" class="nav-link active">
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
      <div class="container-fluid"><!-- New container --> 

          <div class="row"><!-- New row --> 
            <div class="col"> <!-- New col --> 
              <div class="card card-success"> <!-- New card --> 
                 <div class="card-header">
                <h3 class="card-title"><b>WEEKLY PAYROLL</b></h3>
              </div>
              
                <div class="card-header bg-white text-center">
                  <h3 class="card-title text-center"><b> REPORT FROM</b>  <small class="badge badge-warning"><?php $start = $_POST['startDate']; echo DateTime::createFromFormat('Y-m-d', $start)->format('l jS F Y');?></small> - <small class="badge badge-success"><?php $end = $_POST['endDate']; echo DateTime::createFromFormat('Y-m-d', $end)->format('l jS F Y'); ?></small></h3>
                </div>
                
                <div class="card-body"><!-- New body --> 
                  <table id="example2" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>S/N</th>
                    <th>RATE CON.</th>
                    <th>DRIVER'S NAME</th>
                    <th>LAY OVER</th>
                    <th>NET PAY</th>
                    <th>PAYMENT STATUS</th>
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

                    $sql = "SELECT drivers_pay_roll.load_id, drivers_pay_roll.driver_id, drivers_pay_roll.netPay, loads.rateConfirmationID, loads.id, loads.paymentStatus, loads.layover, loads.payrollStatus, users.id AS usersID, users.name FROM loads 

                    INNER JOIN drivers_pay_roll
                    ON drivers_pay_roll.load_id = loads.id 
                    INNER JOIN users 
                    ON drivers_pay_roll.driver_id = users.id WHERE loads.paymentStatus = 0 AND loads.driver_id = '".$id."' AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["rateConfirmationID"]; ?></td>

                    <td><b class="font-size-20" style="text-transform: uppercase;"><?php echo $row['name']?> </b></td> 
                    <td><small><?php echo  $row["layover"] ?> </small></td>

                    <td>$<?php echo number_format($row['netPay'], 2, '.', ',');?></td>

              

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

                  </tr>

                  <?php 
                  $no++;

                }
              }

                ?>
                
                  </tbody>
                </table>                   
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div> <!-- /.col -->
        </div><!-- End row --> 

<?php 
  $sql_user = "SELECT * FROM users WHERE users.id = '".$_SESSION['Id']."' ";
   $query_user = mysqli_query($conn, $sql_user); 
   $row_user = mysqli_fetch_assoc($query_user);
?>

<?php 
   if (isset($_POST['view'])) { 
    $startDate = $_POST['startDate']; 
    $endDate = $_POST['endDate']; 
    $id = $_POST['id'];

    $sql_sum = "SELECT SUM(drivers_pay_roll.netPay) AS sum, loads.dropped_Date, loads.rateConfirmationID, users.name,  drivers_pay_roll.load_id, drivers_pay_roll.driver_id FROM drivers_pay_roll  
    INNER JOIN loads 
    ON drivers_pay_roll.load_id = loads.id 
    INNER JOIN users 
    ON drivers_pay_roll.driver_id = users.id 
    WHERE drivers_pay_roll.driver_id = '".$id."' AND loads.paymentStatus = 0  AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'"; 
    $query_sum = mysqli_query($conn, $sql_sum) or die(mysqli_error($conn)); 
    $id_row = mysqli_fetch_assoc($query_sum); 
  }
?>
                            

          <div class="row"> <!-- New row --> 

            <div class="col"><!-- New Col --> 
              <form class="form" ><!-- New Form --> 
                <div class="card-body"><!-- Card --> 

                  <div class="row"> 
                    <div class="col">
                      <div class="form-group">
                        <label>Verified Amount :</label>
                        <input type="text" name="totalAmount" class="form-control" value="<?php echo number_format($id_row['sum'], 2, '.', ',');?>" disabled>
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>Signature:</label>
                        <input type="text" name="end" class="form-control" value="<?php echo $row_user['name']; ?>" readonly>

                       
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
            <a style="color:white;" class="btn btn-lg btn-success" data-toggle="modal" data-target="#makePayment<?php echo $id_row["driver_id"]; ?>"><small><b>Make Payment</b></small></a>
                  </div>
                </div>
            </form>
          </div> 


<?php 

include 'makePayment.php';
?>

          <div class="col"> 
            <table id="example2" class="table font-size-14"> 
              <thead> 
                <tr> 
                  <th>RATE CON.</th> 
                  <th>NET PAY</th>
                </tr> 
              </thead> 

              <tbody>

                  <?php 

                    $no = 1; 

                    if (isset($_POST['view'])) {
                      $startDate = $_POST['startDate'];
                      $endDate = $_POST['endDate'];
                      $id = $_POST['id'];

                    $sql_summary = "SELECT drivers_pay_roll.load_id, drivers_pay_roll.driver_id, drivers_pay_roll.netPay, loads.rateConfirmationID, loads.id, loads.paymentStatus, loads.payrollStatus, users.id AS usersID, users.name FROM loads 

                    INNER JOIN drivers_pay_roll
                    ON drivers_pay_roll.load_id = loads.id 
                    INNER JOIN users 
                    ON drivers_pay_roll.driver_id = users.id WHERE loads.paymentStatus = 0 AND loads.driver_id = '".$id."' AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";
                  $query_summary = mysqli_query($conn, $sql_summary) or die(mysqli_error($conn));

                  while ($row_summary = mysqli_fetch_assoc($query_summary)){
                    ?>
                  <tr>
                    <td><?php echo $row_summary["rateConfirmationID"]; ?></td> 
                    <td><small class="badge badge-warning">$<?php echo number_format($row_summary["netPay"], 2, '.', ',');?></small></td>

                  </tr>


                <?php 
                  $no++;
                }
              }
                ?>
                 <tr> 
                  <th>TOTAL AMOUNT</th> 
                  <th><small class="badge badge-info h1 font-size-19"><?php echo number_format($id_row['sum'], 2, '.', ',');?><sup class="text-green bold">USD</sup></small></th>              
               </tr> 
                  </tbody>
                </table> 
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

</script>
</body>
</html>




