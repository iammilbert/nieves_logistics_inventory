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

<?php
$em = "";
$success ="";
if (isset($_POST['submit']) && isset($_FILES['picture'])) {

	$img_name = $_FILES['picture']['name'];
	$img_size = $_FILES['picture']['size'];
	$tmp_name = $_FILES['picture']['tmp_name'];
	$error = $_FILES['picture']['error'];

	if ($error ===0) {
		if ($img_size > 1250000) {
			$em = "Sorry, your file is too large.";
		}else{
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../picture/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);


				//insert into Database

				$userID = $_POST['userID'];
				$sql = "UPDATE users SET picture = '".$new_img_name."' WHERE users.id = '".$userID."' ";
				$query = mysqli_query($conn, $sql);

				if ($query) {
					$success = "Profile Picture successfully uploaded";
				}

			}else{
				$em = "You can't upload files of this type";
			}
		}
		
	}else{
		$em = "unknown error occurred!";
	}
	
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand name bold" href="index.php"><?php echo $row2["name"];?></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link bold" href="index.php">HOME</a>
      </li>
     
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="pickups" role="button" data-toggle="dropdown" aria-expanded="false"> PICKUPS
        </a>
        <div class="dropdown-menu" aria-labelledby="pickups">
          <a class="dropdown-item" href="load_assigned.php">Assigned Loads</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="load_delivered.php">Loads Delivered</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="payment" role="button" data-toggle="dropdown" aria-expanded="false"> PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="payment">
          <a class="dropdown-item" href="due_payment.php">Due Payment</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="total_earning.php">Total Earning</a>
        </div>
      </li>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bold" href="#" id="workload" role="button" data-toggle="dropdown" aria-expanded="false"> REPORT
        </a>
        <div class="dropdown-menu" aria-labelledby="workload">
          <a class="dropdown-item" href="load_report.php">Loads Report</a>
          <div class="dropdown-divider" ></div>
          <a class="dropdown-item" href="payment_report.php">Payment Report</a>
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
$myID = $_SESSION["ID"];
  $sql = "SELECT * FROM users WHERE users.id = '".$myID."'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);
?>

  <div class="content-header">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="row"><!-- New row -->
            <div class="col card-body">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title bold text-danger">EDITING PROFILE</h3>
              </div>

              <div class="card-body"> 
               <div class="bg-warning" style="color:white;"><?php echo $em; ?></div>
                  
                  <div class="bg-success" style="color:white;"><?php echo $success; ?></div>
                <form class="form" enctype="multipart/form-data" action="upload_picture_query.php" method="POST">
                <div class="card-body">
                 <div class="row">
                  <div class="col">
                    <div class="form-group">
                    <label>Change/update Profile Picture</label>
                    <input type="file" name="picture" class="form-control">
                    <input type="hidden" name="myID" class="form-control" value="<?php echo $myID; ?>">

                  </div>

                   <div class="form-group justify-content-between">
                    <a href="profile.php" class="btn btn-danger">Back</a>
                     <button name="submit" class="btn btn-primary" type="submit"><i class="fa fa-upload"></i> Upload</button>
                  </div>
                  </div>
                 

                  
                </div>
                </div>
              </form>

              </div>
             
            </div>
          </div>
        </div> <!-- end of new row -->
      </div>
    </section>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
