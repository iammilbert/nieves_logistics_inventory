<?php
	include '../config.php';
	if(isset($_POST['update'])){ 
    $myID = $_POST["myID"];	
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST['email'];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $licenseID = $_POST["licenseID"];
    $accountNumber = $_POST["accountNumber"];
    $bankName = $_POST["bankName"];
    $accountName = $_POST["accountName"];  

		$sql = "UPDATE users SET name = '$name', tel = '$tel', email = '$email', licenseID = '$licenseID', accountNumber = '$accountNumber', bankName = '$bankName', address = '$address', accountName = '$accountName', password = '$password' WHERE users.id = '$myID'";
        $query = mysqli_query($conn, $sql);
        
      if($query) {
               echo '<script> alert("Profile successfully updated"); window.location.href = "editProfile_.php";</script>';

           
           }else {
             echo '<script> alert("Unknown error occurred. Please try again."); window.location.href = "editProfile_.php";</script>';
           
           }
     }
?>

