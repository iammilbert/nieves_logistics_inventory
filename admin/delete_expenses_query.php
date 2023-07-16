<?php
	include('../config.php');
	if (isset($_POST["deletedata"])) {
	   $id = $_POST['id'];
	$sql="DELETE FROM expenses WHERE id='$id'";
	
		 if (mysqli_query($conn, $sql)) {
             echo '<script> alert("Expenses Deleted successfully"); window.location.href = "registered_Expenditures.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "registered_Expenditures.php";</script>';
               
           }
}
?>