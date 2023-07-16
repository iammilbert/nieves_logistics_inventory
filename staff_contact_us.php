<?php  
include 'expiredSession.php';
?> 

  <?php

    if (isset($_POST['subscribe'])){
       $email = $_POST["email"];

          $sql_s = "SELECT * FROM subscribers WHERE email = '".$email."'";
          $query_s = mysqli_query($conn, $sql_s);
          $row_s = mysqli_fetch_assoc($query_s);
         if ($row_s["email"] == $email){

          function validate($em){
            echo "<script>alert('$em'); </script>";
              }

              validate("Email already exist, try another one!");
          }
                
        else {
            
           $query2 = "INSERT INTO subscribers (email) VALUES('$email')";
           $result = mysqli_query($conn, $query2) or die(mysqli_error($conn));

           if ($result) {
             header("Location: subscribe_page.php?success=Subscribed Successfully");
           
           }else {
             header("Location: subscribe_page.php?error=unknown Error occured");
            }

          } 
       
      }
      
?>

<?php 

 $sql1 = "SELECT * FROM companyinfo"; 
 $query1 = mysqli_query($conn, $sql1); 
 $row = mysqli_fetch_assoc($query1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $row["name"]; ?></title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Custom CSs -->
    <link rel="stylesheet" href="dist/css/style.css">

   <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong class="name bold"><a class="navbar-brand" href="#"><b class="name bold"><?php echo $row["name"]; ?></b></a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <div class="form-inline ml-auto" >
       <ul class="navbar-nav">
         <li class="nav-item">
        <a href="index_S.php" class="nav-link bold">Home</a>
      </li>
      <li class="nav-item active">
        <a href="staff_contact_us.php" class="nav-link bold">Contact us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fa fa-user-circle font-size-23" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item bold" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
        </div>
      </li>
    </ul>
    </div>
  </div>
</nav>

<?php 
$error = "";
$success = "";
  if (isset($_POST["send"])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $sql = "INSERT INTO contacts(firstName, lastName, email, subject, message, status, date) VALUES('".$firstName."', '".$lastName."', '".$email."', '".$subject."', '".$message."', '".$status."', '".$date."')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      $success = "Message sent!";
    }
    else{
      $error = "Error occur, resend please.";
    }
  }
?>

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 card-header">
          <div class="col-sm-6">
            <small class="ml-auto"><?php echo date("l"); ?></small>,  <small> <?php echo date("d-m-Y"); ?></small>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 

        <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            <div class="bg-warning text-white"><?php echo $error; ?></div>
             <div class="bg-success text-white"><?php echo $success; ?></div>

            <form action="staff_contact_us.php" class="p-5 bg-white" method="POST"> 
              <div class="row form-group">
                <div class="col-md-12">
                  <h3 class="text-green bold">CONTACT FORM</h3>   
                </div>
              </div>
              <hr>

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="firstName">First Name</label>
                  <input type="text" id="firstName" class="form-control" name="firstName" required="firstName">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lastName">Last Name</label>
                  <input type="text" id="lastName" class="form-control" name="lastName" required="lastName">
                  <input type="hidden" id="status" class="form-control" name="status" value="0">
                  <input type="hidden" id="date" class="form-control" name="date" value="<?php echo date("d-m-Y"); ?>">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control" name="email" required="email">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control" name="subject" required="subject">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="18" rows="4" class="form-control" placeholder="Write your notes or questions here..." required="message"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white" name="send">
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4"><?php echo $row["address"]; ?> <?php echo $row["state"]; ?> <?php echo $row["city"]; ?> <?php echo $row["country"]; ?>, <?php echo $row["poBox"]; ?>, <?php echo $row["zipCode"]; ?></p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="tel:<?php echo $row["tel"]; ?>"><?php echo $row["tel"]; ?></a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="mailto:youremail@domain.com"><?php echo $row["email"]; ?></a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Our customers service makes it an important part of the value chain for clients to be attend to.</p>
             <!--  <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p> -->
            </div>

          </div>
        </div>
      </div>
    </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



</body>
</html>
