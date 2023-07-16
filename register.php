<?php 
  session_start();
  require("config.php");

?> 
<!DOCTYPE html>
<html lang="en">
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

 $sql4 = "SELECT * FROM companyinfo"; 
 $query4 = mysqli_query($conn, $sql4); 
 $row4 = mysqli_fetch_assoc($query4);
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LGTI | Registration</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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


  <script type="text/javascript">
    function validate(){
      var a = document.getElementById("password").value;
      var b = document.getElementById("cpassword").value;
      if (a!=b) {
        alert("Password do not match");
        return false;
      }
    }
  </script>

 
</head>
<body class="hold-transition login-page">


<!-- Member signup -->
<?php 
$success = "";
$error = "";
$tel_error = "";
$email_error = "";
$password_error = "";

if (isset($_POST['submit'])){
       $name = $_POST["name"];
       $email = $_POST["email"]; 
       $role = $_POST["role"]; 
       $tel = $_POST["tel"]; 
       $password = $_POST["password"];
       $cpassword = $_POST["cpassword"];

          $sql = "SELECT * FROM users WHERE email = '".$email."' || tel = '".$tel."'";
          $query = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($query);
         if ($row["email"] == $email){

          function validate($em){
            echo "<script>alert('$em'); </script>";
              }

              validate("Email already exist, try another one!");
          }
         elseif ($row["tel"] == $tel) {
           function validate($tel){
            echo "<script>alert('$tel'); </script>";
              }

              validate("Phone number already exist, try another one!");
          }

          
        else {
            
           $query2 = "INSERT INTO users (name, email, tel, role, password) VALUES('$name', '$email', '$tel', 'Staff', '$password')";
           $result = mysqli_query($conn, $query2) or die(mysqli_error($conn));

           if ($result) {
             $success = "Successfully Registered, click <a href='login.php'>login</a> to login";
           
           }else {
             $error="Data has not been Saved!";
            }

          } 
       
      }
      
  
  ?>

<div class="login-box ">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
      <div class="card-header text-center">
         <div class="text-center">
              <a href="index.php" class="h1 text-info" style="font-size:35px;"><b>NIEVES LOGISTICS</b></a>
            </div>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Register as a new user</p>

                      <div class="text-success"><?php echo $success; ?> </div>
                      <div class="bg-danger"><?php echo $error; ?></div>
                      <div class="bg-warning"><?php echo $tel_error; ?></div>
                      <div class="bg-warning"><?php echo $email_error; ?></div> 
                      <div class="bg-warning"><?php echo $password_error; ?></div>       

      <form method="POST" onsubmit="return validate(); " >
         <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name" required value="<?php if(isset($name)){ echo $name; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=" fas fa-id-card"></span>

            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required value="<?php if(isset($email)){ echo $email; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
          <input type="tel" class="form-control" id="tel" placeholder="Enter Telephone " name="tel" required value="<?php if(isset($tel)){ echo $tel; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required value="<?php if(isset($password)){ echo $password; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock-open"></span>
            </div>
          </div>
        </div>
                <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Comfirm Password" id="cpassword" name="cpassword" required>
           <input type="hidden" class="form-control" placeholder="Comfirm Password" id="cpassword" name="role">
          <div class="input-group-append">
            <label class="input-group-text"> 
               <span class="fas fa-lock"></span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-8"> 
            <div class="form-check">
                <input type="checkbox" class="form-check-input" onclick="myFunction()" >
                <label class="form-check-label" for="exampleCheck1">Show Password</label>
              </div> 
            </div>
          <!-- /.col --> 
           <div class="col-4">
            <a href="index.php" class="btn btn-primary btn-block btn-danger">Back</a>
          </div>
          <!-- /.col -->
        </div>
         <p class="mb-0">
      <a href="login.php" class="text-center">I already registered</a>
      </p>

       <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary btn-block bold" value="Register">
        
      </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script type="text/javascript">

  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
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



<script>
  $(function () {
    $('#ActiveLoad').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>