<?php 
include '../config.php';
    if (isset($_POST['submit'])) {
                $load_id = $_POST["load_id"];
                $dropID = $_POST["dropID"];
                $droppedTime = $_POST["droppedTime"];
                $dropped_Date = $_POST["dropped_Date"];
                $droppedStatus = $_POST["droppedStatus"];
                $totalLoadDropped = $_POST["totalLoadDropped"]; 
                $comment = $_POST["comment"]; 

              $sql = "UPDATE drops SET droppedTime = '".$droppedTime."', dropped_Date = '".$dropped_Date."', droppedStatus = '".$droppedStatus."', comment = '".$comment."' WHERE drops.id = '".$dropID."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $insert = "UPDATE loads_assigned SET status = '".$status."', totalLoadDropped = totalLoadDropped + 1 WHERE load_id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));


             $update = "UPDATE Loads SET status = '".$droppedStatus."', dropped_Date = '".$dropped_Date."', droppedTime = '".$droppedTime."', totalLoadDropped = totalLoadDropped + 1 WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));
                   
        if ($query) {
               echo '<script> alert("Load Delivered"); window.location.href = "index.php";</script>';

           
           }else {
             echo '<script> alert("Unknown error occurred. Please try again."); window.location.href = "index.php";</script>';
           
           }

    }

?>
