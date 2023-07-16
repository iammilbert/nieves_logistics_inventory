<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['id']))
{
    header("Location: login.php");
    die();
}
?>

<?php 

 $sql4 = "SELECT * FROM companyinfo"; 
 $query4 = mysqli_query($conn, $sql4); 
 $row4 = mysqli_fetch_assoc($query4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $row4["name"]; ?> | recovery Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
 
</head>

<?php 
$error = "";
$success = "";
$userID = $_SESSION["id"];
$password_error = "";
$password_error2 = "";

    if (isset($_POST['submit'])) {
      $cpassword = $_POST['cpassword'];
      $password = $_POST['password'];

      $sql2 = "SELECT * FROM users WHERE users.id = '".$userID."'";
      $query2 = mysqli_query($conn, $sql2);
      $row = mysqli_fetch_assoc($query2);


      if ($password != $cpassword) {
        $password_error = "Password do not match.";
      }

       elseif ($row["password"] == $cpassword) {
        $password_error2 = "Password can not be thesame with old one. Retype password!";
      }
      else{
      $sql = "UPDATE users SET password = '".$password."' WHERE users.id = '".$userID."'";
      $query = mysqli_query($conn, $sql);
      
      if ($query) {
       $success = "Password changed, proceed to";

      }
      else{
        $error = "Error occur, try again!";
      }
    }
}
  ?>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="login.php" class="h3">Password update</a>
    </div>
    <div class="card-body">
      <div class="bg-warning" style="color:white;"><?php echo $error; ?></div>
      <div class="bg-warning" style="color:white;"><?php echo $password_error; ?></div>
      <div class="bg-warning" style="color:white;"><?php echo $password_error2; ?></div>                                                                                     

                       <?php if ($success) { ?>
                           <div style="background: #DFF2BF; color: #4F8A10; font-size: 16px;"><?php echo $success; ?> <a href="login.php">login</a></div>
                      <?php } 
                      ?>
      <p class="login-box-msg">Enter new password</p>
<div style="background-color: yellow;"></div>
     <form method="POST" action="recover-password.php">
         <div class="row">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" minlength="4" maxlength="4" required="password" value="<?php if($password_error2 || $password_error){ echo $password; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

           <div class="input-group mb-3">
          <input type="cpassword" class="form-control" placeholder="confirm password" name="cpassword" required="cpassword" value="<?php if($password_error2 || $password_error){ echo $password; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
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
            <a href="verify_number.php?userID=<?php echo $userID; ?>" class="btn btn-outline-light btn-danger btn-block">Back</a>
          </div>
          <!-- /.col -->
        </div>

        <input type="submit" name="submit" class="btn btn-primary btn-block">
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
