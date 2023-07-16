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
                <a href="bol_form.php" class="nav-link ">
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
                <a href="registered_Tickets.php" class="nav-link active">
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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
 <!-- New row -->
          <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header bg-success">
                <h3 class="card-title"><b style="color:white;">TICKETS REGISTERED</b></h3>
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
                    <th>DRIVER NAME</th>
                    <th>FILE NAME</th>
                    <th>TICKETS</th>
                    <th>COMMENTS</th>
                    <th></th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 

                 $sql = "SELECT users.name, ticket.fileName, ticket.comment, ticket.id FROM ticket
                    INNER JOIN users 
                    ON ticket.driverID = users.id";
                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>
                  <tr>
                    <td><?php echo $row["name"]; ?></td>
                      
                      <td> <?php echo $row["fileName"]; ?> </td>

                      <td><i><a href='downloadTicket.php?file_id=<?php echo $row['id']; ?>' target='_blank'> Download Ticket</a></i></td>  
                        
                        <td><?php echo $row["comment"]; ?></td>

                      <td> 
                          <a href="editTicket.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-warning text-white font-weight-bold"><i class="fa fa-edit text-white"></i> RC</a>
                        <a class='btn btn-sm btn-danger text-white' data-toggle='modal' data-target='#delete<?php echo $row["id"]; ?>'><i class='fa fa-trash'></i></a>


                      </td>
                  </tr>

                  <?php 
                  include 'deleteTicket.php';
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
