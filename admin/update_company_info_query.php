<?php 
include '../config.php';
if (isset($_POST["update"])) {
 $ceo = $_POST['ceo'];
 $name = $_POST['name'];
 $tel = $_POST['tel'];
 $mobile = $_POST['mobile'];
 $country = $_POST['country'];
 $state = $_POST['state'];
 $city = $_POST['city'];
 $poBox = $_POST['poBox'];
 $address = $_POST['address'];
 $zipCode = $_POST['zipCode'];
 $email = $_POST['email'];
 $email2 = $_POST['email2'];
 $website = $_POST['website'];

 $update = "UPDATE companyinfo SET name = '".$name."', tel = '".$tel."', mobile = '".$mobile."', country = '".$country."', state = '".$state."', city = '".$city."', address = '".$address."', zipCode = '".$zipCode."', poBox = '".$poBox."', ceo = '".$ceo."', email = '".$email."', email2 = '".$email2."', website = '".$website."'  ";
 $update_query = mysqli_query($conn, $update) or die(mysqli_error($conn));
 	 if ($update_query) {
	echo '<script> alert("Updated successfully!"); window.location.href = "company_info.php";</script>';
	}else {
		 echo '<script> alert("Something went wrong, try again"); window.location.href = "company_info.php";</script>';
	}
}
?>