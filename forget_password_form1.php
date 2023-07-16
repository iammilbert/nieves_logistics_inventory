<?php 
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forget Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <?php 
include('config.php');
$error = "";
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];

     $sql = "SELECT * FROM users WHERE email='$email'";
     $result = mysqli_query($conn, $sql);

       if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          if ($row["email"] == $email) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            header("Location: verify_number.php");
          }
        }
    else{
            $error = "Email address not found";
          }
}
  ?>
</head>




<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="login.php" class="h4">Password Recovery</a>
    </div>
    <div class="card-body">
      <div class="bg-warning" style="color:white;"><?php echo $error; ?></div>
      <p class="login-box-msg">Please provide your registered email</p>
<div style="background-color: yellow;"></div>
      <form method="POST" action="forget_password_form1.php">
         <div class="row">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required="email"  value="<?php if(isset($email)){ echo $email; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
           <div class="modal-footer">
                 <a href="login.php" class="btn btn-outline-light btn-danger">Back</a>
                   <button type="submit" class="btn btn-outline-light btn-primary" name="submit">Proceed</button>
              </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
