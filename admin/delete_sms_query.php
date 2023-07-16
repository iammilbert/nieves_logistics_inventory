<?php 
include '../config.php';
if (isset($_POST["deletedata"])) {

              $id = $_POST['delete_id']; 
            $sql = "DELETE FROM contacts WHERE contacts.id = '".$id."'";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            
     if ($query) {
	echo '<script> alert("Deleted successfully!"); window.location.href = "inbox.php";</script>';
	}else {
		 echo '<script> alert("Something went wrong, try again"); window.location.href = "inbox.php";</script>';
	}
          }
          ?>