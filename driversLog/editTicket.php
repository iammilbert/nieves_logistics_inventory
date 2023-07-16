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
                <a href="bol_form.php" class="nav-link active">
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
                <a href="registered_Expenditures.php" class="nav-link">
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
                <a href="registered_Tickets.php" class="nav-link">
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


<?php 
 $id = isset($_GET['id']) ? $_GET['id'] : '';
 $sql = "SELECT * FROM ticket WHERE id = '".$id."'"; 
 $query = mysqli_query($conn, $sql); 
 $row55 = mysqli_fetch_assoc($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                <h3 class="card-title text-danger font-weight-bold">TICKET UPDATE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                          <form method="POST" action="editTicketQuery.php" enctype="multipart/form-data" >
                              <input type="hidden" class="form-control" name="date_uploaded" value="<?php echo date("Y-m-d");?>">
                              <input type="hidden" class="form-control" name="id" value="<?php echo $row55["id"]; ?>">
                            <input type="hidden" class="form-control" name="time_uploaded" value="<?php echo date("h:i:sa");?>"> 
                            <input type="hidden" class="form-control" name="status" value="1"> 

                          <div class="form-group">
                             <label for="fileName">File Name</label>
                              <input type="text" id="fileName" name="fileName" class="form-control" value="<?php echo $row55["fileName"]; ?>" >                                   
                          </div>
                          
                                
                            <?php 
                              $sql1 = "SELECT * FROM users WHERE id = '".$row55["driverID"]."'";
                              $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                              $row1 = mysqli_fetch_assoc($query1);
                            ?>
                          
                               <?php 
                              $sql = "SELECT * FROM users WHERE role = 'Driver'";
                              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            ?>
                            <label>Driver Name</label>
                            <div class="form-group">
                               
                                <select class="form-control select2" name="driverID" required="driverID" style="width:100%">
                                  <option value="<?php echo $row1["id"]; ?>"><?php echo $row1["name"]; ?></option>
                                  <?php while($row = mysqli_fetch_assoc($query)): ?>
                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php endwhile; ?>
                                </select>
                            </div>



                            <div class="form-group">
                               <label>TICKET</label>
                               <input type="file" name="ticket" id="ticket" class="form-control" required="ticket">
                             </div>
                  
                          <div class="input-group mb-3">
                             <label class="input-group-text">Comment</label>
                             <textarea class="form-control" name="comment"><?php echo $row55["comment"]; ?></textarea>
                        </div>

          
              <div class="modal-footer">
                 
                   <button type="submit" class="btn btn-outline-light btn-primary" name="save">Submit</button>
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
