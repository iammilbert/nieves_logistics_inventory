<!-- truck signup -->
<?php 
include '../config.php';
if (isset($_POST['submit'])){
		$name = $_POST["name"];
		$tel = $_POST["tel"];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$password = $_POST["password"];
		$licenseID = $_POST["licenseID"];
		$accountNumber = $_POST["accountNumber"];
		$bankName = $_POST["bankName"];
		$accountName = $_POST["accountName"];

      $select = "SELECT * FROM users WHERE email = '".$email."' OR tel = '".$tel."' OR accountNumber = '".$accountNumber."'";
        $result = mysqli_query($conn, $select) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row["email"]==$email) {
                header("Location: driver.php?error=Email already exist!");
            }
            if ($row["tel"]==$tel) {
                header("Location: driver.php?error=Telephone number already exist!");
            }
            if ($row["accountNumber"]==$accountNumber) {
                header("Location: driver.php?error=Account number already exist!");
            }
        }
        else {
          $insert = "INSERT INTO users (name, tel, email, role, licenseID, password, accountNumber, bankName, accountName) VALUES('$name', '$tel', '$email', '$role', '$licenseID', '$password', '$accountNumber', '$bankName', '$accountName')"; 
          $query = mysqli_query($conn, $insert); 
         if ($query) { 
          header("Location: driver.php?success=Data Saved successfully!"); 
        }else { 
          header("Location: driver.php?error=Data not Saved!"); 
            } 
          }    
      }
    
     
  ?>


 
