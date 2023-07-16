<?php 
include '../config.php';

    if (isset($_POST['cancel'])) {
               $load_id = $_POST["load_id"];
                $id = $_POST["id"];
                $pickedupTime = $_POST["pickedupTime"];
                $pickedup_Date = $_POST["pickedup_Date"];
                $pickedStatus = $_POST["pickedStatus"];
                $totalLoadPicked = $_POST["totalLoadPicked"]; 
                $comment = $_POST["comment"];  
                $truck = $_POST["truck"];
                $trailer = $_POST["trailer"];
                $tractor = $_POST["tractor"];
                $droppedBy = $_POST["droppedBy"];
                $droppedTime = $_POST["droppedTime"];
                $dropped_Date = $_POST["dropped_Date"];
                $status = $_POST["status"];
                $totalLoadDropped = $_POST["totalLoadDropped"]; 

             $sql = "UPDATE pickups SET pickedupTime = '".$pickedupTime."', pickedup_Date = '".$pickedup_Date."', pickedStatus = '".$pickedStatus."', comment = '".$comment."' WHERE pickups.load_id = '".$load_id."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

              $insert = "UPDATE loads_assigned SET totalLoadDropped = totalLoadDropped + 1, totalLoadPicked = totalLoadPicked + 1 WHERE load_id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));

             $update = "UPDATE loads SET dropped_Date = '".$dropped_Date."', totalLoadDropped = totalLoadDropped + 1, droppedBy = '".$droppedBy."', status = '".$status."', totalLoadPicked = totalLoadPicked + 1 WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));
              
            $insert12 = "UPDATE vehicles_assigned SET dropped_Date = '".$dropped_Date."', status = '".$status."'  WHERE load_id = '".$load_id."'";
              $insertQuery12 = mysqli_query($conn, $insert12) or die(mysqli_error($conn));
              
               $sql11 = "UPDATE drops SET droppedTime = '".$droppedTime."', dropped_Date = '".$dropped_Date."', status = '".$status."', droppedBy = '".$droppedBy."', comment = '".$comment."' WHERE drops.load_id = '".$load_id."'"; 
              $query11 = mysqli_query($conn, $sql11) or die(mysqli_error($conn));
              
            $sql17 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$truck."'"; 
              $query17 = mysqli_query($conn, $sql17) or die(mysqli_error($conn));
              
               $sql13 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$trailer."'"; 
              $query13 = mysqli_query($conn, $sql13) or die(mysqli_error($conn));
              
            $sql16 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$tractor."'"; 
              $query16 = mysqli_query($conn, $sql16) or die(mysqli_error($conn));

           
        if ($updateQuery2) {
             echo '<script> alert("Load Successfully Cancelled"); window.location.href = "assigned_load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occured"); window.location.href = "assigned_load.php";</script>';
               
           }
            

        }

?>

