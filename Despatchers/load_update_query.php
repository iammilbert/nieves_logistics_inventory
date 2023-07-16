<!-- load Query -->
<?php
include('../config.php');
   if(isset($_POST['update'])){
       $id = $_POST["id"];
      $brokerName = $_POST["brokerName"];
      $brokerEmail = $_POST["brokerEmail"];
       $brokerNumber = $_POST["brokerNumber"];
       $shipperEmail = $_POST["shipperEmail"];
       $shipperAddress = $_POST["shipperAddress"]; 
       $loadDescription = $_POST["loadDescription"];  
       $rate = $_POST["rate"]; 
       $rateConfirmationID = $_POST["rateConfirmationID"];    
       $dateRegistered = $_POST["dateRegistered"];
        $weight = $_POST["weight"];
       

        $sql = "UPDATE loads SET rateConfirmationID = '".$rateConfirmationID."', brokerName = '".$brokerName."', brokerEmail = '".$brokerEmail."', brokerNumber = '".$brokerNumber."', shipperEmail = '".$shipperEmail."', shipperAddress = '".$shipperAddress."', loadDescription = '".$loadDescription."', rate = '".$rate."', dateRegistered = '".$dateRegistered."', weight = '".$weight."' WHERE id = '".$id."'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
         if($query){
             echo '<script> alert("Load updated!"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Load Not Updated"); window.location.href = "load.php";</script>';
               
           }
     }
?>