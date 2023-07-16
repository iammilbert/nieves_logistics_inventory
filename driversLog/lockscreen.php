<!DOCTYPE html>
<?php 
session_start();
include '../config.php';

if (!isset($_SESSION["id"]))
{
    header("Location: ../login.php");
}
?>

<?php 

 $sql = "SELECT * FROM companyinfo"; 
 $query = mysqli_query($conn, $sql); 
 $row4 = mysqli_fetch_assoc($query);
?>

    <?php 
    $userID = $_SESSION["id"]; 
    $sql = "SELECT * FROM users WHERE users.id = '".$userID."'";
    $query = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($query);
    ?>
    
    
    <?php 
$error = "";

    if (isset($_POST['login'])) {
         $id = $_POST['id'];
      $password = $_POST['password'];
       $status = $_POST['status'];
       $Currentdate = date('Y-m-d');
       $CurrentTime = date("h:i:sa");

     $sql = "SELECT * FROM users WHERE id = '".$id."' AND password='".$password."'";
     $result = mysqli_query($conn, $sql);

       if (mysqli_num_rows($result) == 1) {
          // the email must be unique
          $row = mysqli_fetch_assoc($result);
          if ($row["role"] == 'Admin' && $row["id"] == $id) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['last_login_timestamp'] = time();

            $sqlAdmin = "UPDATE users SET users.status = '".$status."', users.lastLoginDate = '".$Currentdate."', users.lastLoginTime = '".$CurrentTime."' WHERE users.id = '".$row["id"]."' AND users.password = '".$row["password"]."'";
            $queryAdmin = mysqli_query($conn, $sqlAdmin);

            header("Location: index.php");

          }
        
      }
    else{
            echo '<script> alert("Incorrect Password, try again"); </script>';
          }
}
  ?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $row4["name"]; ?> | Lockscreen</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
     <a href="index.php" class="h1 text-info" style="font-size:30px;"><b><?php echo $row4["name"]; ?>.</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php $name = $row2['name']; echo strtok($name, " "); ?> ...<?php echo $_SESSION["id"]; ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img class="profile-user-img img-fluid img-circle" src="../picture/<?=$row2['picture']?>" alt="User profile picture">
    </div>
    <!-- /.lockscreen-image -->
    <!-- lockscreen credentials (contains the form) -->
    <form method="POST" class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" name="password" class="form-control" placeholder="password" required="password"> 
        <input type="hidden" name="id" class="form-control" value="<?php echo $row2["id"]; ?>">
        <input type="hidden" class="form-check-input" name="status" value="1">

        <div class="input-group-append">
          <button type="submit" class="btn" name="login">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="../login.php">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
   Copyright &copy; 2022 - <?php echo date("Y");?> <b><a href="https://<?php echo $row4["website"]; ?>" class="text-black"><?php echo $row4["name"]; ?></a></b><br>
    All rights reserved
  </div>
  
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
