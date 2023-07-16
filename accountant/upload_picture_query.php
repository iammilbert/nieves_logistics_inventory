<?php
include '../config.php';
if (isset($_POST['submit']) && isset($_FILES['picture'])) {

	$img_name = $_FILES['picture']['name'];
	$img_size = $_FILES['picture']['size'];
	$tmp_name = $_FILES['picture']['tmp_name'];
	$error = $_FILES['picture']['error'];

	if ($error ===0) {
		if ($img_size > 1250000) {

			echo '<script> alert("Sorry, your file is too large."); window.location.href = "editProfile_.php";</script>';
		}else{
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../picture/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);


				//insert into Database
				$userID = $_POST['userID'];
				$sql = "UPDATE users SET picture = '".$new_img_name."' WHERE users.id = '".$userID."' ";
				$query = mysqli_query($conn, $sql);

				if ($query) {
					 echo '<script> alert("Profile Picture successfully uploaded"); window.location.href = "editProfile_.php";</script>';
             
				}

			}else{
				 echo '<script> alert("You can not upload files of this type"); window.location.href = "editProfile_.php";</script>';
			}
		}
		
	}else{
		echo '<script> alert("Unknown error occurred"); window.location.href = "editProfile_.php";</script>';
	}
	
}else{
	echo '<script> window.location.href = "editProfile_.php";</script>';
}
?>