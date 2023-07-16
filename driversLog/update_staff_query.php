<?php
	include '../config.php';
	if(isset($_POST['update'])){

	$id = $_POST["id"];	
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $licenseID = $_POST["licenseID"];
    $accountNumber = $_POST["accountNumber"];
    $bankName = $_POST["bankName"];
    $accountName = $_POST["accountName"]; 
     $salary = $_POST["salary"];  

		$sql = "UPDATE users SET salary = '$salary', name = '$name', role = '$role', tel = '$tel', email = '$email', licenseID = '$licenseID', accountNumber = '$accountNumber', bankName = '$bankName', accountName = '$accountName', password = '$password' WHERE users.id = '$id'";
        $query = mysqli_query($conn, $sql);
        
     if($query) {
             echo '<script> alert("Details Successfully Updated"); window.location.href = "registered_users.php";</script>';
             
           }else { 
                echo '<script> alert("Data Not updated"); window.location.href = "registered_users.php";</script>';
               
           }
     }
?>

