<?php
	include('../config.php');
	if (isset($_POST["deletedata"])) {

	   $dropID = $_POST['dropID'];
	   $load_id = $_POST["load_id"];

	$sql="DELETE FROM drops WHERE id='$dropID'";

	$update = "UPDATE loads SET totalDrops = totalDrops-1 WHERE loads.id = '".$load_id."'"; 
    $query = mysqli_query($conn, $update) or die(mysqli_error($conn));

	
	 if (mysqli_query($conn, $sql)) {
             echo '<script> alert("Drop Deleted!"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Drop Not Deleted"); window.location.href = "load.php";</script>';
               
           }
}
?>