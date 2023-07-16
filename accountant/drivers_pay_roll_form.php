<?php 
include 'expiredSession.php';
?>


<?php 
$loadID = isset($_GET['loadID']) ? $_GET['loadID'] : '';
$sql = "SELECT loads.rateConfirmationID, loads.driver_id, loads.paymentStatus, users.id, users.accountNumber, loads.id AS load_id, loads.rate, users.accountName, loads.layOverAmount, loads.layover, users.bankName FROM loads 
      INNER JOIN users 
      ON loads.driver_id = users.id 
      WHERE loads.id = '".$loadID."' ";
 $query = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($query);
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

 $sql1 = "SELECT * FROM companyinfo"; 
 $query1 = mysqli_query($conn, $sql1); 
 $row1 = mysqli_fetch_assoc($query1);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">

      <span class="brand-text font-weight-light"><b class="name bold"><?php echo $row1["name"];?></b>
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
                PAY-OUT
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

         <div class="row"><!-- New row --> 
            <div class="col"> <!-- New col --> 
                <div class="card-header bg-info">
                <h3 class="card-title"><b>TOTAL PICKUPS</b></h3>
              </div>
                <div class="card-body"><!-- New body --> 
                  <table id="example2" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>PICKUP NAME</th>
                    <th>DATE/TIME</th>
                    <th>STATUS</th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $no = 1; 

                    $sql_pickup = "SELECT pickups.load_id, pickups.driver_id, pickups.pickedup_Date, pickups.pickedupTime, pickups.pickedStatus, pickups.name AS pickName, users.name FROM pickups 
                    INNER JOIN users 
                    ON pickups.driver_id = users.id WHERE pickups.pickedStatus = 2 AND pickups.load_id = '".$loadID."'";
                  $query_pickup = mysqli_query($conn, $sql_pickup) or die(mysqli_error($conn));
                  while ($row_pickup = mysqli_fetch_assoc($query_pickup)){
                    ?>
                  <tr>
                    <td><?php echo $row_pickup["pickName"]; ?></td>

                    <td><?php echo $row_pickup['pickedup_Date']?> <?php echo $row_pickup['pickedupTime']?></td> 
                    <td><small> 

                       <?php 
                         if($row_pickup["pickedStatus"] == 2)
                        echo "<small class='badge badge-success'>Picked</small>";
                        else
                         echo "<small class='badge badge-danger'>unsuccessful</small> ";
 
                      ?>
                    </small></td>

                  </tr>

                  <?php 

                }
              

                ?>
                
                  </tbody>
                </table>                   
              </div><!-- /.card-body -->
          </div> <!-- /.col -->


          <div class="col"> <!-- New col --> 
                <div class="card-header bg-info">
                <h3 class="card-title"><b>TOTAL DROPS</b></h3>
              </div>
                <div class="card-body"><!-- New body --> 
                  <table id="example2" class="table font-size-14">
                   <thead>
                     <tr>
                    <th>DROP NAME</th>
                    <th>DATE/TIME</th>
                    <th>EXPENSES (USD)</th>
                    <th>STATUS</th>


                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $no = 1; 

                    $sql_drop = "SELECT drops.load_id, drops.driver_id, SUM(drops.amount_Spent) AS totalExpenses, drops.amount_Spent, drops.paymentStatus, drops.status, drops.dropped_Date, drops.droppedTime, drops.name AS dropName, users.name FROM drops 
                    INNER JOIN users 
                    ON drops.driver_id = users.id WHERE drops.status = 3 AND drops.load_id = '".$loadID."'";
                  $query_drop = mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));
                  while ($row_drop = mysqli_fetch_assoc($query_drop)){
                    ?>
                  <tr>
                    <td><?php echo $row_drop["dropName"]; ?></td>
                    <td><?php echo $row_drop["dropped_Date"]; ?> <?php echo $row_drop["droppedTime"]; ?></td>
                    <td><?php echo $row_drop["amount_Spent"]; ?></td>
                    <td><small> 

                       <?php 
                         if($row_drop["status"] == 3)
                        echo "<small class='badge badge-success'>Delivered</small>";
                        else
                         echo "<small class='badge badge-danger'>unsuccessful</small> ";
 
                      ?>
                    </small></td>

                    

                  </tr>

                  <?php 
                  $no++;

                }
              

                ?>
                
                  </tbody>
                </table>                   
              </div><!-- /.card-body -->
          </div> <!-- /.col -->
        </div><!-- End row --> 


        <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title"><b class="text-white">DRIVER'S PAY ROLL PER LOAD</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                      <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                           <div class="success"><?php echo $_GET['success']; ?></div>
                      <?php } ?>
                <form method="POST" action="drivers_pay_roll_form_query.php">
                <div class="card-body">
                  <div class="row">
                     <div class="col">
                        <label><u>PICKUPS DETAILS :</u></label>
                           <div class="input-group mb-3">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                   <span>Rate Con. :</span>
                                </div>
                              </div>
                              <input type="text" name="rateConfirmationID" class="form-control" readonly value="<?php echo $row['rateConfirmationID']?>"> 
                               <input type="hidden" name="load_id" class="form-control" readonly value="<?php echo $row['load_id']?>"> 

                                <input style="text-align:right;" type="hidden" name="payrollStatus" class="form-control" value="1">                                        
                          </div>

                           <div class="input-group mb-3">
                             <div class="input-group-append">
                                <div class="input-group-text">
                                   <span>Rate :</span>
                                </div>
                              </div>
                              <input style="text-align:right;" type="text" id="rate" name="rate" class="form-control" readonly value="<?php echo $row['rate']?>.00"> 

                              <div class="input-group-append">
                                <div class="input-group-text">
                                   <span><b>USD</b></span>
                                </div>
                              </div>        
                          </div>

                          <?php 
                            if ($row["layover"]=="Yes") {
                              echo " <div id='no' class='input-group mb-3'>
                                <div class='input-group-append'>
                                <div class='input-group-text'>
                                <span for='selector'>Layover Amount (Only if):</span>
                                </div>
                              </div>

                                <input type='text' id='LayOverAmount' name='LayOverAmount' class='form-control allowances' style='height: 45px; text-align:right;' value='{$row['layOverAmount']}' readonly> 

                              <div class='input-group-append'>
                                <div class='input-group-text'>
                                   <span><b>USD</b></span>
                                </div>
                              </div>                                       
                          </div>";
                            }

                          ?>


<?php
   $sqld = "SELECT * FROM users WHERE id = '".$row["driver_id"]."' ";
   $queryd = mysqli_query($conn, $sqld) or die(mysqli_error($conn));
   $rowd = mysqli_fetch_assoc($queryd); 

   ?>


                          <label><u>DRIVER NAME :</u></label>

                          <div class="input-group mb-3">
                             <div class="input-group-append">
                                <div class="input-group-text">
                                   <span class="fa fa-user"></span>
                                </div>
                              </div>
                              <input type="text" name="driver_id" class="form-control font-size-30 bold" readonly value="<?php echo $rowd['name']?>"> 

                              <input type="hidden" name="preparedBy" class="form-control" readonly value="<?php echo $_SESSION['Id']; ?>">         
                          </div>


                          <!-- <div class="input-group mb-3">-->
                          <!--   <div class="input-group-append">-->
                          <!--      <div class="input-group-text">-->
                          <!--         <span>Account Number :</span>-->
                          <!--      </div>-->
                          <!--    </div>-->
                          <!--    <input type="text" name="accountNumber" class="form-control" readonly value="">         -->
                          <!--</div>-->

                          <!--<div class="input-group mb-3">-->
                          <!--   <div class="input-group-append">-->
                          <!--      <div class="input-group-text">-->
                          <!--         <span>Account Name :</span>-->
                          <!--      </div>-->
                          <!--    </div>-->
                          <!--    <input type="text" name="accountName" class="form-control" readonly value="">         -->
                          <!--</div>-->

                          <!-- <div class="input-group mb-3">-->
                          <!--   <div class="input-group-append">-->
                          <!--      <div class="input-group-text">-->
                          <!--         <span>Bank Name :</span>-->
                          <!--      </div>-->
                          <!--    </div>-->
                          <!--    <input type="text" name="bankName" class="form-control" readonly value="">         -->
                          <!-- </div>-->

                             <label><u>EARNINGS :</u></label>

                              <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span>Basic Percentage :</span>
                                   </div>
                                 </div>
                                 <input style="text-align:right;" type="number" name="percent" class="form-control" required="percent" id="percent" oninput="getSalary()">

                                 
                                  <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>%</b></span>
                                   </div>
                                 </div>        
                             </div>


                             <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span>Basic Pay :</span>
                                   </div>
                                 </div>
                                 <input style="text-align:right;" min="0.00" step="0.01" type="number" name="basicPayAmount" class="form-control basicPayAmount basic2" id="basicPayAmount" readonly>  
                                  <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>USD</b></span>
                                   </div>
                                 </div>        
                             </div>  
                             
                                <input style="font-size: 30px; color: red;" type="hidden" name="total" class="form-control" id="total" readonly>    

                                 <label><u>NET PAY :</u></label>
                               <div class="input-group mb-3">
                                 <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>USD</b></span>
                                   </div>
                                 </div> 
                                 <input style="font-size: 23px; color: red; height: 50px; text-align:right;" min="0.00" type="number" name="netPay" class="form-control" id="netPay" readonly>
                                 
                             </div> 

                       </div>

                        <div class="col">
                                <label><u>ALLOWANCES:</u></label>
                                 <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span>Medicals :</span>
                                   </div>
                                 </div>
                                    <input style="text-align:right;" min="0.00" step="0.01" type="number" name="medicalAllowance" class="form-control allowances" id="medicalAllowance" oninput="getSalary()">  

                                 <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>USD</b></span>
                                   </div>
                                 </div> 
                             </div>

                              <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span>Mobile Data :</span>
                                   </div>
                                 </div>
                                    <input style="text-align:right;" min="0.00" step="0.01" type="number" name="dataAllowance" class="form-control allowances" id="dataAllowance" oninput="getSalary()">  

                                 <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>USD</b></span>
                                   </div>
                                 </div> 

                                 <input style="text-align:right;" type="hidden" name="totalAllowance" class="form-control totalAllowance basic2" id="totalAllowance"> 

                                 <input style="text-align:right;" type="hidden" name="basic_Two" class="form-control basic_Two" id="basic_Two"> 
                             </div>

                             <label><u>DEDUCTION :</u></label> 
                                  <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span>Loan :</span>
                                   </div>
                                 </div>
                                 <input style="text-align:right;" type="number" min="0.00" step="0.01" name="loan" class="form-control deduction" id="loan" oninput="getSalary()"> 
                                  <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>USD</b></span>
                                   </div>
                                 </div>          
                             </div>

                             <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span>Others :</span>
                                   </div>
                                 </div>
                                 <input style="text-align:right;" type="number" min="0.00" step="0.01" name="deduction" class="form-control deduction" id="deduction" oninput="getSalary()"> 

                                 <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>USD</b></span>
                                   </div>
                                 </div>        
                             </div>

                              <div class="input-group mb-3">
                                   <div class="input-group-append">
                                      <div class="input-group-text">
                                         <span>Reason for Other Deduction :</span>
                                      </div>
                                   </div>
                                 <textarea class="form-control" name="deduction_reason" placeholder="Reasons For Deduction"> </textarea>         
                             </div>

                              <div class="input-group mb-3">
                                   <div class="input-group-append">
                                      <div class="input-group-text">
                                         <span>Driver's Expenses :</span>
                                      </div>
                                   </div>
                  <?php 
                   $sql_sum = "SELECT SUM(drops.amount_Spent) AS sum FROM drops WHERE drops.load_id = '".$loadID."'"; 
                   $query_sum = mysqli_query($conn, $sql_sum) or die(mysqli_error($conn));
                  ?>
                   <?php while ($id_sum = mysqli_fetch_assoc($query_sum)): ?> 
                <input style="text-align:right;" type="number" min="0.00" step="0.01" class="form-control allowances" id="driver_expenses" name="driver_expenses" value="<?php echo $id_sum["sum"]; ?>" readonly>  
                <?php endwhile ?>

                                 <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>USD</b></span>
                                   </div>
                                 </div>  
                                         
                             </div>
 
 


                           <!--<div class="input-group mb-3">-->
                           <!--     <div class="input-group-append">-->
                           <!--        <div class="input-group-text">-->
                           <!--           <span>Tax :</span>-->
                           <!--        </div>-->
                           <!--      </div>-->
                                    <input style="text-align:right;" type="hidden" min="0.00" step="0.01" name="tax" class="form-control" id="tax" oninput="getSalary()">  

                                 <input style="text-align:right;" type="hidden" name="totalDeduction" class="form-control totalDeduction" id="totalDeduction"> 

                                 <input style="text-align:right;" type="hidden" name="taxAmount" class="form-control" id="taxAmount">  

                             <!--    <div class="input-group-append">-->
                             <!--      <div class="input-group-text">-->
                             <!--         <span><b>%</b></span>-->
                             <!--      </div>-->
                             <!--    </div> -->
                             <!--</div> -->
                      

                                            
                            
                          </div>
                       </div>

                            <div class="modal-footer justify-content-between">
                              <a href="load_delivered.php" class="btn btn-danger">Back</a>

                                 <button type="submit" class="btn btn-outline-light btn-primary" name="submit">Submit</button>
                           </div>
                        </div> 
                     </form>
      
                
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
  function getSalary(){
//get sum of Allowance
var sum_allowance = 0;
  $('.allowances').each(function(){
    sum_allowance += +$(this).val();
    $('#totalAllowance').val(sum_allowance);
  })


  //get sum of Deductions
var sum_deduction = 0;
  $('.deduction').each(function(){
    sum_deduction += +$(this).val();
    $('#totalDeduction').val(sum_deduction);
  })

//get Basic Pay Amount
    var percent = $('#percent').val();
    var rate = $('#rate').val();
    $('#basicPayAmount').val(rate*percent/100);

//get Basic 2 Salary (basicPayAmount + totalAllowance)
 var sum_basic2 = 0;
  $('.basic2').each(function(){
    sum_basic2 += +$(this).val();
    $('#basic_Two').val(sum_basic2);
  })

 

  //Get Total (basic_Two - totalDeduction)
  var total_Deduction = $('#totalDeduction').val();
  var basicTwo = $('#basic_Two').val();    
  $('#total').val(basicTwo - total_Deduction);


   //get Tax 
  var netPay = $('#netPay').val(); 
  var tax = $('#tax').val(); 
  $('#taxAmount').val(netPay*tax/100);

//Get Driver Expenses (basic_Two - totalDeduction)
  var taxAmount = $('#taxAmount').val();
  var total = $('#total').val();    
  $('#netPay').val(total - taxAmount);

  //Get Net Pay (basic_Two - totalDeduction)
  var taxAmount = $('#taxAmount').val();
  var total = $('#total').val();    
  $('#netPay').val(round(total - taxAmount));

}

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




