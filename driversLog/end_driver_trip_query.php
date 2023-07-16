<?php 
include '../config.php';
    if (isset($_POST['submit'])) {
                $load_id = $_POST["load_id"];
                $dropID = $_POST["dropID"];
                $droppedTime = $_POST["droppedTime"];
                $dropped_Date = $_POST["dropped_Date"];
                $droppedStatus = $_POST["droppedStatus"];
                $totalLoadDropped = $_POST["totalLoadDropped"]; 
                $amount_Spent = $_POST['amount_Spent'];
                $expenses_Type = $_POST['expenses_Type'];
                $expenses_Description = $_POST['expenses_Description'];
                $comment = $_POST["comment"]; 
                $auto_date_dropped = $_POST["auto_date_dropped"]; 

              $sql = "UPDATE drops SET droppedTime = '".$droppedTime."', dropped_Date = '".$dropped_Date."', droppedStatus = '".$droppedStatus."', comment = '".$comment."', auto_date_dropped = '".$auto_date_dropped."',  amount_Spent = '".$amount_Spent."',  expenses_Type = '".$expenses_Type."',  expenses_Description = '".$expenses_Description."' WHERE drops.id = '".$dropID."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $insert = "UPDATE loads_assigned SET status = '".$droppedStatus."', dropped_Date = '".$dropped_Date."', droppedTime = '".$droppedTime."',  totalLoadDropped = totalLoadDropped + 1 WHERE load_id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));


             $update = "UPDATE Loads SET status = '".$status."', dropped_Date = '".$dropped_Date."', droppedTime = '".$droppedTime."', totalLoadDropped = totalLoadDropped + 1 WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));

             if ($query) {
               header("Location: active_drivers.php?success=Load Delivered,");

           
           }else {
            header("Location: active_drivers.php?error=unknown error occurred");
           
        }

    }

?>
