<?php 
session_start();
ob_start();

?>
<?php 
include('config.php');
$error = "";

    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
       $status = $_POST['status'];
       $Currentdate = date('Y-m-d');
       $CurrentTime = date("h:i:sa");


     $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
     $result = mysqli_query($conn, $sql);


       if (mysqli_num_rows($result) == 1) {
          // the email must be unique
          $row = mysqli_fetch_assoc($result);
          if ($row["role"] == 'Admin' && $row["email"] == $email) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlAdmin = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.email = '".$row["email"]."' AND users.password = '".$row["password"]."'";
            $queryAdmin = mysqli_query($conn, $sqlAdmin);

            header("Location: admin/index.php");

          }elseif ($row["role"] == 'Driver' && $row["email"] == $email) {
            $_SESSION['NAME'] = $row['name'];
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['EMAIL'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlDriver = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.email = '".$row["email"]."' AND users.password = '".$row["password"]."'";
            $queryDriver = mysqli_query($conn, $sqlDriver);

            header("Location: drivers/index.php");

          }elseif($row["role"] == 'Accountant' && $row["email"] == $email) {
            $_SESSION['Name'] = $row['name'];
            $_SESSION['Id'] = $row['id'];
            $_SESSION['Role'] = $row['role'];
            $_SESSION['Email'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlAccountant = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.email = '".$row["email"]."' AND users.password = '".$row["password"]."'";
            $queryAccountant = mysqli_query($conn, $sqlAccountant);

            header("Location: accountant/index.php");

          }
          elseif($row["role"] == 'Despatcher' && $row["email"] == $email) {
            $_SESSION['Name'] = $row['name'];
            $_SESSION['Despatcher_id'] = $row['id'];
            $_SESSION['Role'] = $row['role'];
            $_SESSION['Email'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlDespatcher = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.email = '".$row["email"]."' AND users.password = '".$row["password"]."'";
            $queryDespatcher = mysqli_query($conn, $sqlDespatcher);

            header("Location: Despatchers/index.php");

          } elseif($row["role"] == 'DOT' && $row["email"] == $email) {
            $_SESSION['DOTName'] = $row['name'];
            $_SESSION['DOTID'] = $row['id'];
            $_SESSION['DOTRole'] = $row['role'];
            $_SESSION['DOTEmail'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlDespatcher = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.email = '".$row["email"]."' AND users.password = '".$row["password"]."'";
            $queryDespatcher = mysqli_query($conn, $sqlDespatcher);

            header("Location: driversLog/index.php");

          }elseif($row["role"] == 'Staff' && $row["email"] == $email) {
            $_SESSION['staffName'] = $row['name'];
            $_SESSION['staffId'] = $row['id'];
            $_SESSION['staffRole'] = $row['role'];
            $_SESSION['staffEmail'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlStaff = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.email = '".$row["email"]."' AND users.password = '".$row["password"]."'";
            $queryStaff = mysqli_query($conn, $sqlStaff);

            header("Location: index_s.php");

          }elseif($row["role"] == 'Sub_Admin' && $row["email"] == $email) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlSubAdmin = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.email = '".$row["email"]."' AND users.password = '".$row["password"]."'";
            $querySubAdmin = mysqli_query($conn, $sqlSubAdmin);

            header("Location: sub_admin/index.php");

          }
        
      }
    else{
            $error = "Incorrect Login details";
          }
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
  <title><?php echo $row4["name"]; ?> | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Custom CSs -->
    <link rel="stylesheet" href="dist/css/style.css">
 
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
         <div class="text-center">
              <a href="index.php" class="h1 text-info" style="font-size:30px;"><b><?php echo $row4["name"]; ?>.</b></a>
            </div>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Sign in to start your account</p>
      <div class="bg-warning" style="color:white;"><?php echo $error; ?></div>
      <form method="POST">

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required="email" value="<?php if(isset($email)){ echo $email; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="password" value="<?php if(isset($password)){ echo $password; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      <div class="row">
          <div class="col-8">
             <div class="form-check">
                    <input type="checkbox" class="form-check-input" onclick="myFunction()" >
                    <label class="form-check-label" for="exampleCheck1">Show Password</label>
                    <input type="hidden" class="form-check-input" name="status" value="1">
                  </div>
          </div>
          <!-- /.col -->

           <div class="col-4">
            <a href="index.php" class="text-danger"><b>Go Back</b></a>
            
          </div>
          <!-- /.col -->
        </div>
             <p class="mb-1">
        <a href="forget_password_form1.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register as a new user</a>
      </p>

      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary btn-block bold" value="Login">
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
