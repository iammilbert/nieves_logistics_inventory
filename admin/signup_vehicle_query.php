<!-- vehicle signup -->
<?php 
include '../config.php';
if (isset($_POST['register'])){ 
       $vehicleType = $_POST['vehicleType'];
       $number = $_POST["number"];
       $vin = $_POST["vin"];
       $plateNumber = $_POST["plateNumber"];
       $status = $_POST['status'];  

       $select = "SELECT * FROM vehicles";
        $result = mysqli_query($conn, $select) or die(mysqli_error($conn)); 
        $row = mysqli_fetch_assoc($result);
            if ($row["number"]==$number) {
                echo '<script> alert("Vehicle number already exist!"); window.location.href = "vehicles.php";</script>';
            }
            if ($row["vin"]==$vin) {
                echo '<script> alert("Vehicle VIN already exist!"); window.location.href = "vehicles.php";</script>';
            }
        else { 
            $insert = "INSERT INTO vehicles (vehicleType, vin, number, plateNumber, status) VALUES('$vehicleType', '$vin', '$number', '$plateNumber', '$status')"; 
          $query = mysqli_query($conn, $insert) or die(mysqli_error($conn)); 
         if ($query) { 
          echo '<script> alert("Vehicle registered successfully!"); window.location.href = "vehicles.php";</script>';
        }else { 
          echo '<script> alert("Data not Saved!"); window.location.href = "vehicles.php";</script>';
            } 
          }    
      }
    
     
  ?>