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
  <strong><a class="navbar-brand name bold text-success" href="#"><?php echo $row2["name"];?> </a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"  style="font-weight:bolder;">HOME</a>
      </li>
     
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item active" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false" style="font-weight:bolder;"> PAYMENT
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
        <a class="nav-link dropdown-toggle fa fa-user-circle font-size-23" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
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
  
<?php 
 $dropID = isset($_GET['dropID']) ? $_GET['dropID'] : '';
  $sql = "SELECT loads.rateConfirmationID, drops.load_id FROM drops 
  INNER JOIN loads 
  ON drops.load_id = loads.id 
  WHERE drops.id = '".$dropID."'"; 
    $query = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($query);

?>

<?php 
  $sql_vehicle = "SELECT * FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$row["load_id"]."'"; 
    $query_vehicle = mysqli_query($conn, $sql_vehicle); 
    $row_vehicle = mysqli_fetch_assoc($query_vehicle);

?>

<p></p>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- New row -->
          <div class="row">
            <div class="col-md-2">
              
            </div>
          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-danger bold">Drop Load : <?php echo $row["rateConfirmationID"]; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                         <form method="POST" action="dropLoadForm_query.php">
                        <div class="input-group mb-3">
                             <label class="input-group-text">Date</label>
                              <input type="date" class="form-control" name="dropped_Date" required="dropped_Date" max="<?php echo date("Y-m-d");?>">
                               <input type="hidden" class="form-control" name="auto_date_dropped" value="<?php echo date("Y-m-d");?>">
                              <input type="hidden" class="form-control" name="load_id" value="<?php echo $row["load_id"]; ?>">
                        </div>
                         <div class="input-group mb-3">
                             <label class="input-group-text">Time</label>
                             <input type="time" class="form-control" name="droppedTime" required="droppedTime" max="<?php echo date("h:i:sa");?>">
                             <input type="hidden" name="dropID" value="<?php echo $dropID; ?>">   
                             
                             <input type="hidden" class="form-control" name="truck" value="<?php echo $row_vehicle["truck"]; ?>">
                               <input type="hidden" class="form-control" name="trailer" value="<?php echo $row_vehicle["trailer"]; ?>">
                                <input type="hidden" class="form-control" name="tractor" value="<?php echo $row_vehicle["tractor"]; ?>">

                        </div>

                        <script type="text/javascript">
                          function yesnoCheck(that) 
                          {
                            if (that.value == "Yes") 
                              {
                                  document.getElementById("yes").style.display = "block";
                              }
                              else
                              {
                                  document.getElementById("yes").style.display = "none";
                              }
                            if (that.value == "No")
                              {
                                  document.getElementById("no").style.display = "none";
                              }
                          }
                      </script>

                              <div class="input-group mb-3">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                   <label for="selector">Lay Over?</label>
                                </div>
                              </div>
                               <select id="selector" onchange="yesnoCheck(this);" class="form-control" style="height: 45px;" name="layover"> 
                                  <option value="select">__Yes/No__</option> 
                                  <option value="Yes">Yes</option> 
                                  <option value="No">No</option> 
                              </select>
                          </div>


                           <div id="no" class="input-group mb-3" style="display: none;">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                   <label for="no">Enter Amount:</label>
                                </div>
                              </div>

                                <input type="text" id="no" name="no" > 

                              <div class="input-group-append">
                                <div class="input-group-text">
                                   <span>$</span>
                                </div>
                              </div>                                       
                          </div>


                            <div class="form-group" style="display:none;" id="yes">
                               <label>LayOver Amount (USD)</label>
                               <input type="number" placeholder="Enter LayOver Charges" name="layOverAmount" id="yes" class="form-control" type="number" min="0.00" step="0.01">
                             </div>

                        
                          <div class="input-group mb-3">
                             <label class="input-group-text">Comment</label>
                             <textarea class="form-control" name="comment"></textarea>
                        </div>

   <?php 
  $sqlID = "SELECT * FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$row["load_id"]."'"; 
    $queryID = mysqli_query($conn, $sqlID); 
    $rowID = mysqli_fetch_assoc($queryID);
?>

                   
                       <script type="text/javascript">
                          function otherCheck(that) 
                          {
                            if (that.value == "Other") 
                              {
                                  document.getElementById("other").style.display = "block";
                                 
                              }
                              else
                              {
                                  document.getElementById("other").style.display = "none";
                              }

                          }
                      </script>

                         <script type="text/javascript">
                          function YesNo(that) 
                          {
                            if (that.value == "Yes") 
                              {
                                  document.getElementById("amount").style.display = "block";
                                   document.getElementById("type").style.display = "block";
                              }
                              else
                              {
                                   document.getElementById("amount").style.display = "none";
                                  document.getElementById("type").style.display = "none";
                              }
                          }
                      </script>

                          <div class="input-group mb-3">
                      <label class="input-group-text">Any Expenses ?</label>
                        <select class="form-select form-control" onchange="YesNo(this);">
                            <option disabled selected>--Yes/No--</option>
                            <option value="Yes">Yes</option>
                             <option value="No">No</option>
                        </select>
                    </div>

                     <div class="form-group" style="display:none;" id="amount">
                         <label>Expenses Amount</label>
                          <input type="text" class="form-control" name="amount_Spent">
                           <input type="hidden" class="form-control" name="droppedBy" value="<?php echo $myID; ?>">
                     </div>

                    <div class="form-group" id="type" style="display:none;">
                      <label>Type of Expenses</label>
                        <select class="form-select select2 form-control" name="expenses_Type" onchange="otherCheck(this);">
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

                    
                         <div class="form-group" style="display:none;" id="other" >
                          <label>Other Expenses</label>
                          <textarea name="expenses_Description" placeholder="Type the expenses here" class="form-control"></textarea>
                           <input type="hidden" class="form-control" name="status" value="3">
                        </div>
          
              <div class="modal-footer justify-content-between">

                <a class="btn btn-danger" href="dropLoadTable.php?load_id=<?php echo $rowID["load_id"]; ?>">Back</a>
                 
                   <button type="submit" class="btn btn-outline-light btn-primary" name="submit">Submit</button>
              </div>
              </form>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

           <div class="col-md-2">
              
          </div>
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
