<?php
	include('../config.php');
	   $id = $_POST['delete_id'];
	$sql="DELETE FROM vehicles WHERE vehicles.id='$id'";
	if(mysqli_query($conn, $sql)){
	echo '<script> alert("Vehicle successfully deleted!"); window.location.href = "vehicles.php";</script>';
	}else {
		 echo '<script> alert("Vehicle not deleted!"); window.location.href = "vehicles.php";</script>';
	}

?>

