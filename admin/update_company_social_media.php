<?php 
include '../config.php';
if (isset($_POST["update"])) {
 $facebook = $_POST['facebook'];
 $instagram = $_POST['instagram'];
 $twitter = $_POST['twitter'];
 $whatsapp = $_POST['whatsapp'];
 $linkedln = $_POST['linkedln'];

 $update = "UPDATE companyinfo SET instagram = '".$instagram."', twitter = '".$twitter."', whatsapp = '".$whatsapp."', linkedln = '".$linkedln."', facebook = '".$facebook."'";
 $update_query = mysqli_query($conn, $update) or die(mysqli_error($conn));
  if ($update_query) {
	echo '<script> alert("Updated successfully!"); window.location.href = "company_info.php";</script>';
	}else {
		 echo '<script> alert("Something went wrong, try again"); window.location.href = "company_info.php";</script>';
	}
}
?>