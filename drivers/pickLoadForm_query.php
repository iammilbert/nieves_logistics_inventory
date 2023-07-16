<?php 
include '../config.php';
    if (isset($_POST['submit'])) {
                $load_id = $_POST["load_id"];
                $vehicle_id = $_POST["vehicle_id"];
                $pickID = $_POST["pickID"];
                $pickedupTime = $_POST["pickedupTime"];
                $pickedup_Date = $_POST["pickedup_Date"];
                $pickedStatus = $_POST["pickedStatus"];
                $totalLoadPicked = $_POST["totalLoadPicked"]; 
                $comment = $_POST["comment"]; 
                $status = $_POST["status"]; 

              $sql = "UPDATE pickups SET pickedupTime = '".$pickedupTime."', pickedup_Date = '".$pickedup_Date."', pickedStatus = '".$pickedStatus."', comment = '".$comment."' WHERE pickups.id = '".$pickID."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $insert = "UPDATE loads_assigned SET status = '".$status."', totalLoadPicked = totalLoadPicked + 1, pickedup_Date = '".$pickedup_Date."', pickedupTime = '".$pickedupTime."'  WHERE load_id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));


             $update = "UPDATE loads SET status = '".$status."', totalLoadPicked = totalLoadPicked + 1, pickedup_Date = '".$pickedup_Date."', pickedupTime = '".$pickedupTime."' WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));

              $sqlID = "UPDATE vehicles_assigned SET status = '".$status."' WHERE vehicles_assigned.load_id = '".$load_id."'";
              $queryID = mysqli_query($conn, $sqlID) or die(mysqli_error($conn));


               $sqlID2 = "UPDATE vehicles SET status = '".$status."' WHERE vehicles.id = '".$vehicle_id."'";
              $queryID2 = mysqli_query($conn, $sqlID2) or die(mysqli_error($conn));

              
             if ($query) {
               echo '<script> alert("Load Picked, Safe Trip"); window.location.href = "load_assigned.php";</script>';

           
           }else {
             echo '<script> alert("Unknown Error Occured"); window.location.href = "load_assigned.php";</script>';
           
           }
           
          

    }

?>
