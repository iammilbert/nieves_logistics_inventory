<?php 
include '../config.php';
    if (isset($_POST['submit'])) {
                $load_id = $_POST["load_id"];
                $pickID = $_POST["pickID"];
                $pickedupTime = $_POST["pickedupTime"];
                $pickedup_Date = $_POST["pickedup_Date"];
                $pickedStatus = $_POST["pickedStatus"];
                $totalLoadPicked = $_POST["totalLoadPicked"]; 
                $comment = $_POST["comment"]; 

              $sql = "UPDATE pickups SET pickedupTime = '".$pickedupTime."', pickedup_Date = '".$pickedup_Date."', pickedStatus = '".$pickedStatus."', comment = '".$comment."' WHERE pickups.id = '".$pickID."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $insert = "UPDATE loads_assigned SET status = '".$status."', totalLoadPicked = totalLoadPicked + 1 WHERE load_id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));


             $update = "UPDATE Loads SET status = '".$status."', totalLoadPicked = totalLoadPicked + 1 WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));


              $set = "UPDATE vehicles_assigned SET status = '".$status."' WHERE vehicles_assigned.id = '".$vehicleId."'";
              $setQuery2 = mysqli_query($conn, $set) or die(mysqli_error($conn));
              
                      
        if ($query) {
               echo '<script> alert("Load Successfully Picked, Safe Trip"); window.location.href = "index.php";</script>';

           
           }else {
             echo '<script> alert("Unknown error occurred. Please try again."); window.location.href = "index.php";</script>';
           
           }

    }

?>
