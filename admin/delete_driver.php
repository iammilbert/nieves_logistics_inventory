<?php
	include('../config.php');
	   $id = $_POST['delete_id'];
	$sql="DELETE FROM users WHERE id='$id'";
	if(mysqli_query($conn, $sql)){
	header("Location: registered_drivers.php?error=Driver Deleted");
	}else {
		 header("Location: registered_drivers.php?success=Driver Not Deleted");
	}

?>


