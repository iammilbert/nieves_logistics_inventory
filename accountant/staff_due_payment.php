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
            <a class="dropdown-item" href="vehicle_workload.php">Vehicles Workload</a>
          </div>
        </div>

           <div class="dropdown show nav-item d-none d-sm-inline-block" >
          <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLinkPayout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bolder; color: steelblue;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='steelblue'">
            PAY-OUT
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkPayout">
            <a class="dropdown-item active" href="due_payment.php">Due Payment</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="payrollPaid.php">Successful Payment</a>
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
$myID = $_SESSION["Id"];
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
                <h3 class="card-title text-danger bold">STAFF SALARIES</h3>
              </div>
              <div class="card-body">

                <table id="example2" class="table font-size-13">
                  <thead>
                   <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>TELEPHONE</th>
                    <th>ROLE</th>
                    <th>SALARY </th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $months = date("Y-M");
                      $month = strtotime($months);

                  $sql="SELECT * FROM users WHERE users.role = 'Staff' AND users.lastPaymentMonth != '".$month."' || users.role = 'Despatcher' AND users.lastPaymentMonth != '".$month."' || users.role = 'Accountant' AND users.lastPaymentMonth != '".$month."' || users.role = 'Admin' AND users.lastPaymentMonth != '".$month."'";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                         <td><a class="deletebtn" name="delete font-size-15 bold"><?php echo $row['name']; ?></a></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><small class="badge badge-info"><?php echo $row['role']; ?></small></td>
                        <td><b>NGN</b> <?php echo number_format($row['salary'], 2, '.', ','); ?></td>

                           <td>  
                      <?php 
                       $mon =  $row["lastPaymentMonth"]; 
                       $month1 = strtotime($mon); 
                         if($month1 == $month)
                        echo "<button class='btn btn-sm btn-primary' type='button' disabled> <i class='fa fa-check text-danger font-size-20 bold'></i> Paid</button>";
                        else  
                         echo "<button class='btn btn-sm btn-primary' data-toggle='modal' type='button' data-target='#staff_pay_modal{$row['id']}'> Pay</button> ";
                      ?>
                    </td>

                      </tr>

                    <?php                      
                    include'staff_pay_modal.php';

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
                <h3 class="card-title text-green bold"><?php echo date("M-Y"); ?>, SUCCESSFUL PAYMENT</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table font-size-13">
                  <thead>
                   <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ROLE</th>
                    <th>AMOUNT <b>USD</b></th>
                    <th>PAYMENT FOR:</th>
                    <th>DATE/TIME PAID</th>
                    <th>STATUS</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
              
                      $sql="SELECT users.role, users.id, users.salary, staff_salaries.months, staff_salaries.datePaid, staff_salaries.timePaid, staff_salaries.paidBy, staff_salaries.staff_id, users.name, users.role FROM users 
                      INNER JOIN staff_salaries 
                      ON staff_salaries.staff_id = users.id 
                      WHERE users.role = 'Staff' OR users.role = 'Despatcher' OR users.role = 'Accountant' OR users.role = 'Admin'";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                         <td><?php echo $row['name']; ?></td>
                         <td><?php echo $row['role']; ?></td>
                        <td><?php echo number_format($row['salary'], 2, '.', ','); ?> </td>
                        <td><b><?php $months = new DateTime($row["months"]); echo $months->format('M-Y'); ?></b></td>
                        <td><?php echo $row['datePaid']; ?> <?php echo $row['timePaid']; ?></td>
                      <td><small class="badge badge-success">PAID</small></td>
                        
                        <td>

                          <a class="btn btn-sm btn-info" href="staff_due_payment_details.php?staffId=<?php echo $row["id"]; ?>"><i class="fa fa-eye"></i></a>

                         
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
