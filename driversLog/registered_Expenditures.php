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
    <ul class="navbar-nav bold">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fa fa-user-circle font-size-23" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>

            </div>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

 <span class="brand-text font-weight-light"><b class="name bold"><span class="bold"><?php echo $row["name"];?></span></b>
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

         

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <p class="font-size-17 bold">
                REPORT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="bol_form.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Register RC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="registered_RC.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>ALL RC </p>
                </a>
              </li>

                <li class="nav-item">
                <a href="registered_vehicles.php" class="nav-link">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Registered vehicles</p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="registered_drivers.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Registered Drivers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="registered_Expenditures.php" class="nav-link active">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Expenditures</p>
                </a>
              </li>
              
                                 <li class="nav-item">
                <a href="driversTicketForm.php" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Upload Ticket</p>
                </a>
              </li>
              
                 <li class="nav-item">
                <a href="registered_Tickets.php" class="nav-link ">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Tickets Available</p>
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
        
 
    <hr>
      <div class="container-fluid  card card-primary card-outline">
        <div class="row"> <!-- Start row -->
              
            <div class="container-fluid">
                <div class="row"> <!-- Start row -->
                          <div class="card-header">
                            <h3 class="card-title text-danger bold font-size-30">COMPANY EXPENSES</h3>
                          </div>
                </div>
                <!-- /. end row -->
            </div>
            <hr>
        <div class="col">
             <div class="info-box mb-3">
                 <button class="btn btn-primary bold text-white" data-toggle="modal" data-target="#modal-primary"><span class="fa fa-plus text-white font-size-20"></span> VEHICLE EXPENDITURE</button>
              </div>
          </div>
          <!-- /.col -->
          
            <div class="col">
             <div class="info-box mb-3">
                 <button class="btn btn-info bold text-white" data-toggle="modal" data-target="#other-primary"><span class="fa fa-plus text-white font-size-20"></span> OTHER EXPENDITURE</button>
              </div>
          </div>
          
            <div class="col">
             <div class="info-box mb-3">
                 <button class='btn btn-sm btn-warning text-white bold' data-toggle='modal' type='button' data-target='#view_primary'><span class='fas fa-eye font-size-20'></span> VIEW EXPENSES</button> 
              </div>
          </div>
        </div>
        <!-- /. end row -->
        
         <div class="row"> <!-- Start row -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>

              <div class="info-box-content">
               <label class="info-box-text">LAST MONTH</label>
                <?php 
                 $newDate = date('Y-m-d', strtotime('-1 month'));
                 $newDate2 = date('Y-m', strtotime('-1 month'));
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.dateSpent < '".$newDate."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><?php echo DateTime::createFromFormat('Y-m', $newDate2)->format('F Y');?></span><br>
                <span class="start_count"><b class="text-green">USD</b> <?php echo  $id_row['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1 bold">USD</span>

              <div class="info-box-content">
                <label class="info-box-text">GRAND TOTAL</label>
                <?php 
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($id_row2 = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count"><?php echo  $id_row2['sum']; ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
               <label class="info-box-text">TODAY'S EXPENSES</label>
                <?php 
                 $newDate3 = date('Y-m-d');
                   $sql = "SELECT SUM(expenses.amount) AS sum FROM expenses WHERE expenses.dateSpent = '".$newDate3."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                   <?php while ($today_row = mysqli_fetch_assoc($query)): ?> 
                <span class="start_count">
                <b class="text-green">USD</b> 
                <?php echo $today_row["sum"];
                
                ?></span>
                <?php endwhile ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. end row -->

<?php 
 include'view_modal_expenses.php'; 
?>
        <hr>

         <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title bold"> Registered Expenditures</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table font-size-13">
                  <thead>
                   <tr>
                    <th>EXPENSES TYPE</th>
                    <th>DATE</th>
                    <th>AMOUNT</th>
                    <th>INCURED BY</th>
                    <th>FILES</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  $no = 1;
                      $sql="SELECT * FROM expenses";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                         <td><?php echo $row['expensesType']; ?></td>
                        <td><?php echo $row['dateSpent']; ?></td>
                         <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['incuredBy']; ?></td>
                        
              
                        
                        <td>  
                          <?php 
                             if($row["fileStatus"]== 1 ){
                            echo "<i><a href='download_file.php?file_id={$row['id']}' target='_blank'> Download file</a></i>";
                          }
    
                             elseif($row["fileStatus"]== 0 ){
                            echo "<small class='badge badge-danger'>Pending</small>";
                          }
                        ?>
                      </td>
                      
                                <td>
                              
                        <button class="btn btn-sm btn-primary"data-toggle="modal" type="button" data-target="#expenses_details<?php echo $row['id']?>"><span class="fas fa-eye"></span></button>

                          <!--<button class="btn btn-sm btn-success"data-toggle="modal" type="button" data-target="#expenses_edit"><span class="fas fa-edit"></span></button>-->

                          <button class="btn btn-sm btn-danger"data-toggle="modal" type="button" data-target="#deletedata<?php echo $row['id']?>"><span class="fas fa-trash"></span></button>
                                             
                          
                  <?php  
                      
                    if($row['fileStatus']== 0 ) { 
                          echo "<a href='expenses_file.php?expensesID={$row["id"]}' class='btn btn-info'><i class='fas fa-upload'></i> Upload File</a>";
                          
                      }
                    ?> 

                        </td>
                      </tr>

                    <?php                      
                        $no++;
                        include'delete_expenses_modal.php';
                        include'edit_expenses_modal.php';
                        include'view_expenses_modal.php'; 
                       
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
        
         <div class="modal fade" id="modal-primary" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Vehicle Expenses Registration</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="row">
            <div class="car card-primary"> 
                <div class="card-body"> 
                      <form class="form" method="POST" action="other_expenses_query.php">
                          <div class="form-group">
                              <label>VEHICLE</label>
                              <select id="vehicleType" onchange="yesnoCheck(this);" class="form-control select2" name="vehicleType" required="vehicleType" style="height: 45px;"> 
                                  <option value="N/A" selected >-Choose-</option> 
                                  <option value="Truck">Truck</option> 
                                  <option value="Trailer">Trailer</option> 
                                  <option value="Tractor">Tractor</option> 
                                  <option value="Other">Other</option> 
                              </select>
                          </div>
                          
                        <script type="text/javascript">
                          function yesnoCheck(that) 
                          {
                            if (that.value == "Truck") 
                              {
                                  document.getElementById("truck").style.display = "block";
                              }
                               else
                              {
                                  document.getElementById("truck").style.display = "none";
                              }
                            if (that.value == "Trailer") 
                              {
                                  document.getElementById("trailer").style.display = "block";
                              }
                              else
                              {
                                  document.getElementById("trailer").style.display = "none";
                              }
                            if (that.value == "Tractor")
                              {
                                  document.getElementById("tractor").style.display = "block";
                              }
                               else
                              {
                                  document.getElementById("tractor").style.display = "none";
                              }
                          }
                      </script>
                      
                            <?php 
                                $truck = "Truck";
                              $sql1 = "SELECT * FROM vehicles WHERE vehicles.vehicleType = '".$truck."'";
                              $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                            ?>
                        <div class="form-group" style="display:none;" id="truck">
                              <label>Trucks Numbers</label>
                              <select id="truck" class="form-control select2" name="truck"> 
                                  <option value="N/A" selected disabled>-Choose-</option> 
                                        <?php while($row1 = mysqli_fetch_assoc($query1)): ?>
                                          <option value="<?php echo $row1['number']; ?>"><?php echo $row1['number']; ?></option>
                                        <?php endwhile; ?>
                              </select>
                          </div>
                          
                               <?php 
                                $trailer = "Trailer";
                              $sql2 = "SELECT * FROM vehicles WHERE vehicles.vehicleType = '".$trailer."'";
                              $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                            ?>
                        <div class="form-group" style="display:none;" id="trailer">
                              <label>Trailer Numbers</label>
                              <select id="trailer" class="form-control select2" name="trailer"> 
                                  <option value="N/A" selected disabled>-Choose-</option> 
                                        <?php while($row2 = mysqli_fetch_assoc($query2)): ?>
                                          <option value="<?php echo $row2['number']; ?>"><?php echo $row2['number']; ?></option>
                                        <?php endwhile; ?>
                              </select>
                          </div>
                          
                          
                            <?php 
                                $tractor = "Tractor";
                              $sql3 = "SELECT * FROM vehicles WHERE vehicles.vehicleType = '".$tractor."'";
                              $query3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                            ?>
                        <div class="form-group" style="display:none;" id="tractor">
                              <label>Tractor Numbers</label>
                              <select id="tractor" class="form-control select2" name="tractor"> 
                                  <option value="N/A" selected disabled>-Choose-</option> 
                                        <?php while($row3 = mysqli_fetch_assoc($query3)): ?>
                                          <option value="<?php echo $row3['number']; ?>"><?php echo $row3['number']; ?></option>
                                        <?php endwhile; ?>
                              </select>
                          </div>
                              
                              
                               <div class="form-group">
                                  <label>Type of Expenses</label>
                                  <select class="form-control select2" name="expensesType" style="height: 45px;"> 
                                      <option value="N/A" selected disabled>-Choose-</option> 
                                    <option value="Repairs">Repairs</option>
                                  <option value="Vehicle Purchase">Vehicle Purchase</option>
                                  <option value="Tax">Tax</option>
                                  <option value="Fuel">Fuel</option>
                                  <option value="Insurance">Insurance</option>
                                  <option value="Garrage Fee">Garrage Fee</option>
                                  <option value="Other">Other</option> 
                                  </select>
                              </div>
                        
                                  <div class="form-group">
                                    <textarea type="text" name="description" class="form-control" cols="80" placeholder="Expenses Description"></textarea>
                                  </div>
                                  
                    <div class="input-group mb-3">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" required="amount">
                    <label class="input-group-text text-green bold">USD</label>
                  </div>

                  <div class="input-group mb-3">
                    <input type="text" name="incuredBy" class="form-control" id="incuredBy" placeholder="Incurred By" required="incuredBy">
                    <label class="input-group-text bold"><i class="fa fa-user"></i></label>
                  </div>
               
                   <div class="input-group mb-3">
                    <input type="date" name="dateSpent" class="form-control" id="dateSpent" required="dateSpent">
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="hidden" name="months" class="form-control" id="months" required="months" value="<?php echo date('M-Y'); ?>">
                  </div>
                  
                <!-- /.card-body -->
               <div class="modal-footer justify-content-between bg-primary">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-outline-light btn-primary" name="submit" value="Register">
              </div>
              </form>
                </div>
                </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


   <div class="modal fade" id="other-primary" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Other Expenses</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="row">
            <div class="car card-primary"> 
                <div class="card-body"> 
         <form class="form" method="POST" action="expenses_query.php">
                      <div class="form-group">
                                      <label>Type of Expenses</label>
                                        <select class="form-control select2" name="expensesType" style="height: 45px;"> 
                                           <option disabled selected>--Select--</option>
                                        <option value="Tax">Tax</option>
                                         <option value="Travel">Travel</option>
                                        <option value="Insurance">Insurance</option>
                                         <option value="Ultility">Ultility bill</option>
                                        <option value="Delivery/Freight">Delivery/Freight</option>
                                        <option value="Maintenance and Repairs">Maintenance and Repairs</option>
                                        <option value="Gas">Gas</option>
                                        <option value="Other">Other</option>
                                      </select>
                              </div>
                        
                                  <div class="form-group">
                                    <textarea type="text" name="description" class="form-control" cols="80" placeholder="Expenses Description" required="description"></textarea>
                                  </div>

                  <div class="input-group mb-3">
                    <input type="text" name="incuredBy" class="form-control" id="incuredBy" placeholder="Incurred By" required="incuredBy">
                    <label class="input-group-text bold"><i class="fa fa-user"></i></label>
                  </div>
                  
                   <div class="input-group mb-3">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" required="amount">
                    <label class="input-group-text text-green bold">USD</label>
                  </div>

                   <div class="input-group mb-3">
                    <input type="date" name="dateSpent" class="form-control" id="dateSpent" required="dateSpent">
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="hidden" name="months" class="form-control" id="months" required="months" value="<?php echo date('M-Y'); ?>">
                  </div>
               <div class="modal-footer justify-content-between bg-primary">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-outline-light btn-primary" name="register" value="Register">
              </div>
              </form>
                </div>
                </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
</body>
</html>
