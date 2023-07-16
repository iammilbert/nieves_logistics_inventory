<?php
	include('../config.php');
	   $id = $_POST['delete_id'];
	$sql="DELETE FROM users WHERE id='$id'";

		 if (mysqli_query($conn, $sql)) {
             echo '<script> alert("Deleted Successfully"); window.location.href = "registered_users.php";</script>';
             
           }else { 
                echo '<script> alert("Data Not Deleted"); window.location.href = "registered_users.php";</script>';
               
           }

?>