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

             $sql = "UPDATE pickups SET pickedupTime = '".$pickedupTime."', pickedup_Date = '".$pickedup_Date."', pickedStatus = '".$pickedStatus."', comment = '".$comment."' WHERE pickups.id = '".$id."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

              $insert = "UPDATE loads_assigned SET totalLoadPicked = totalLoadPicked + 1 WHERE load_id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));


             $update = "UPDATE loads SET totalLoadPicked = totalLoadPicked + 1 WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));
           
        if ($updateQuery2) {
             echo '<script> alert("Pickup Cancelled"); window.location.href = "assigned_load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occured"); window.location.href = "assigned_load.php";</script>';
               
           }
            

        }

?>

