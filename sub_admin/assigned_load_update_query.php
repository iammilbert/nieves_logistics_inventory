<?php 
include '../config.php';
    if (isset($_POST['update'])) {
               $id = $_POST["id"];
               $shipperName = $_POST["shipperName"];
                $shipperTel = $_POST["shipperTel"];
                $shipperEmail = $_POST["shipperEmail"];
                $shipperAddress = $_POST["shipperAddress"]; 
                $loadDescription = $_POST["loadDescription"]; 
                $rate = $_POST["rate"];  
                $rateConfirmationID = $_POST["rateConfirmationID"];      
                $dateRegistered = $_POST["dateRegistered"];
                $driver_id = $_POST["driver_id"];
                $vehicle_id = $_POST['vehicle_id'];
                $weight = $_POST["weight"];
                $loadType = $_POST['loadType'];


              $sql1 = "UPDATE loads SET loads.driver_id = '".$driver_id."', loadDescription = '".$loadDescription."', shipperName = '".$shipperName."', shipperTel = '".$shipperTel."', dateRegistered = '".$dateRegistered."', shipperEmail = '".$shipperEmail."', shipperAddress = '".$shipperAddress."', rate = '".$rate."', rateConfirmationID = '".$rateConfirmationID."', weight = '".$weight."', loadType = '".$loadType."' WHERE id = '".$id."'"; 
              $query1 = mysqli_query($conn, $sql1);


              $update = "UPDATE pickups SET driver_id = '".$driver_id."' WHERE load_id = '".$id."'"; 
              $updateQuery = mysqli_query($conn, $update);


               $updateDrops = "UPDATE drops SET driver_id = '".$driver_id."' WHERE load_id = '".$id."'"; 
              $dropsQuery = mysqli_query($conn, $updateDrops);


               $sql = "UPDATE loads_assigned SET driver_id = '".$driver_id."', vehicle_id = '".$vehicle_id."' WHERE loads_assigned.load_id = '".$id."'"; 
              $query = mysqli_query($conn, $sql);


              $sql_vehicle = "UPDATE vehicles_assigned SET driver_id = '".$driver_id."', vehicle_id = '".$vehicle_id."' WHERE loads_assigned.load_id = '".$id."'"; 
              $query_vehicle = mysqli_query($conn, $sql_vehicle);


               $sql_vehicle1 = "UPDATE vehicles SET status = '".$status."' WHERE vehicles.id = '".$vehicle_id."'"; 
              $query_vehicle1 = mysqli_query($conn, $sql_vehicle1) or die(mysqli_error($conn));


             if ($query) {
               header("Location: load.php?success=Load Update");           
           }else {
            header("Location: load.php?error=unknown error occurred.");
           
           }

    }

?>



