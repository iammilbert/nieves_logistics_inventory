<?php
	include('../config.php');
	if (isset($_POST["deletedata"])) {

	   $pickupID = $_POST['pickupID'];
	   $load_id = $_POST["load_id"];

	$sql="DELETE FROM pickups WHERE id='$pickupID'";

	$update = "UPDATE loads SET totalPickups = totalPickups - 1 WHERE loads.id = '".$load_id."'"; 
    $query = mysqli_query($conn, $update) or die(mysqli_error($conn));
	
	 if(mysqli_query($conn, $sql)){
             echo '<script> alert("Pickup Deleted!"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Pickup Not Deleted"); window.location.href = "load.php";</script>';
               
           }
}
?>