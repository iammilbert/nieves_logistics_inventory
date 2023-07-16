 <!-- Load signup -->
<?php 
include('../config.php');
if (isset($_POST['submit'])){
      $brokerName = $_POST["brokerName"];
      $brokerEmail = $_POST["brokerEmail"];
       $brokerNumber = $_POST["brokerNumber"];
       $shipperEmail = $_POST["shipperEmail"];
       $shipperAddress = $_POST["shipperAddress"]; 
       $loadDescription = $_POST["loadDescription"];  
       $rate = $_POST["rate"]; 
       $rateConfirmationID = $_POST["rateConfirmationID"];    
       $dateRegistered = $_POST["dateRegistered"];
        $status = $_POST["status"];
        $registeredBy = $_POST["registeredBy"];
        $weight = $_POST["weight"];

        $select = "SELECT rateConfirmationID FROM loads WHERE rateConfirmationID = '".$rateConfirmationID."' ";
        $query = mysqli_query($conn, $select) or die(mysqli_error($conn));
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            if ($row["rateConfirmationID"]==$rateConfirmationID) {
                echo '<script> alert("Rate Confirmation ID already exist!"); window.location.href = "load.php";</script>';
            }
        }else{
        $sql = "INSERT INTO loads (brokerName, brokerEmail, brokerNumber, shipperEmail, shipperAddress, loadDescription, rate, rateConfirmationID, dateRegistered, status, registeredBy, weight) VALUES('$brokerName', '$brokerEmail', '$brokerNumber', '$shipperEmail', '$shipperAddress', '$loadDescription', '$rate', '$rateConfirmationID', '$dateRegistered', '$status', '$registeredBy', '$weight')";
           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
           
     if ($result) {
             echo '<script> alert("Load registered!"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "load.php";</script>';
               
           }
        }

       
    }
  

?>