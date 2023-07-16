<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['id']))
{
    header("Location: login.php");
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verify number</title>

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
$tel_error = "";
 
      $sql2 = "SELECT * FROM users WHERE users.id = '".$userID."'";
      $query2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($query2);



    if (isset($_POST['verify'])) {
      $tel = $_POST['tel'];

      $sql = "SELECT * FROM users WHERE users.id = '".$userID."'";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($query);

       if ($row["tel"] != $tel) {
        $tel_error = "Incorrect number.Try agin! Make sure you add country code";
      }
        elseif($row["tel"] == $tel) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
        header("Location: recover-password.php");
      }
      
      else{
        $error = "Error occur, try again!";
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
      <div class="bg-warning" style="color:white;"><?php echo $tel_error; ?></div>
      <div class="bg-warning" style="color:white;"><?php echo $error; ?></div>
                                                                                     
      <p class="login-box-msg">Enter the number shown below</p>
      <h5 class="text-center" style="font-family:Geometr415 Blk BT"><b><?php echo substr($row2["tel"], 0, 5); ?></b> XXXXX <b><?php echo substr($row2["tel"], -3); ?></b></h5>
<div style="background-color: yellow;"></div>
     <form method="POST" action="recover-password.php">
         <div class="row">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="verify your number, e.g +2348137950284" name="tel" id="tel" required="tel" value="<?php if($tel_error){ echo $tel; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        </div>
          <div class="row">
          <div class="col-8">
             <div class="form-check">
                    <input type="checkbox" class="form-check-input" onclick="myFunction()" >
                    <label class="form-check-label" for="exampleCheck1">Show number</label>
                  </div>
          </div>
          <!-- /.col -->

           <div class="col-4">
            <a href="forget_password_form1.php" class="btn btn-outline-light btn-danger btn-block">Back</a>
          </div>
          <!-- /.col -->
        </div>

        <input type="submit" name="verify" class="btn btn-primary btn-block">
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script type="text/javascript">

  function myFunction() {
  var x = document.getElementById("tel");
  if (x.type === "tel") {
    x.type = "text";
  } else {
    x.type = "tel";
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
