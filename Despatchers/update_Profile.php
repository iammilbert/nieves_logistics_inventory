<?php
	include '../config.php';
	if(isset($_POST['update'])){ 
    $userID = $_POST["userID"];	
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST['email'];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $accountNumber = $_POST["accountNumber"];
    $bankName = $_POST["bankName"];
    $accountName = $_POST["accountName"];  
    $salary = $_POST["salary"];  

		$sql = "UPDATE users SET salary = '$salary', name = '$name', tel = '$tel', email = '$email', accountNumber = '$accountNumber', bankName = '$bankName', address = '$address', accountName = '$accountName', password = '$password' WHERE users.id = '$userID'";
        $query = mysqli_query($conn, $sql);
        
     if($query){
             echo '<script> alert("Profile successfully updated!"); window.location.href = "editProfile_.php";</script>';
             
           }else { 
                echo '<script> alert("Error occur"); window.location.href = "editProfile.php";</script>';
               
           }
     }
?>

