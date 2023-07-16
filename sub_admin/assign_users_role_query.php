<?php
	include '../config.php';
	if(isset($_POST['assign'])){

		$id = $_POST["id"];	
    $role = $_POST["role"];
  

		$sql = "UPDATE users SET  role = '$role' WHERE users.id = '$id'";
        $query = mysqli_query($conn, $sql);

         if ($query) {
             echo '<script> alert("Role Assigned"); window.location.href = "registered_users.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "registered_users.php";</script>';
               
           }
     }
?>

