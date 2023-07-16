<?php 
include '../config.php';

    if (isset($_POST['cancel'])) {
               $load_id = $_POST["load_id"];
                $id = $_POST["id"];
                $droppedTime = $_POST["droppedTime"];
                $dropped_Date = $_POST["dropped_Date"];
                $status = $_POST["status"];
                $totalLoadDropped = $_POST["totalLoadDropped"]; 
                $comment = $_POST["comment"];  

             $sql = "UPDATE drops SET droppedTime = '".$droppedTime."', dropped_Date = '".$dropped_Date."', status = '".$status."', comment = '".$comment."' WHERE drops.id = '".$id."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

              $insert = "UPDATE loads_assigned SET totalLoadDropped = totalLoadDropped + 1 WHERE load_id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));


             $update = "UPDATE loads SET totalLoadDropped = totalLoadDropped + 1 WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));
           
    if($query){
             echo '<script> alert("Drop Cancelled!"); window.location.href = "assigned_load.php";</script>';
             
           }else { 
                echo '<script> alert("unknown error occurred. Please try again"); window.location.href = "assigned_load.php";</script>';
               
           }
            

        }

?>

