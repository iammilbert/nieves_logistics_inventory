<?php 
include '../config.php';
    if (isset($_POST['submit'])) {
                $load_id = $_POST["load_id"];
                $truck = $_POST["truck"];
                $trailer = $_POST["trailer"];
                $tractor = $_POST["tractor"];
                $dropID = $_POST["dropID"];
                $droppedTime = $_POST["droppedTime"];
                $dropped_Date = $_POST["dropped_Date"];
                $comment = $_POST["comment"]; 
                $status = $_POST["status"]; 
                $droppedBy = $_POST['droppedBy'];
                $amount_Spent = $_POST["amount_Spent"];
                $expenses_Type = $_POST["expenses_Type"];
                $expenses_Description = $_POST["expenses_Description"];
                $layover = $_POST["layover"];
                $layOverAmount = $_POST["layOverAmount"];

              $sql = "UPDATE drops SET droppedTime = '".$droppedTime."', expenses_Type = '".$expenses_Type."', amount_Spent = '".$amount_Spent."', expenses_Description = '".$expenses_Description."', droppedBy = '".$droppedBy."', dropped_Date = '".$dropped_Date."', status = '".$status."', comment = '".$comment."', layover = '".$layover."', layOverAmount = '".$layOverAmount."' WHERE drops.id = '".$dropID."'"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $vehicle = "UPDATE vehicles_assigned SET status = '".$status."', layover = '".$layover."', dropped_Date = '".$dropped_Date."', layOverAmount = '".$layOverAmount."' WHERE vehicles_assigned.load_id = '".$load_id."'";
              $vehicleQuery = mysqli_query($conn, $vehicle) or die(mysqli_error($conn));
             
             $update = "UPDATE loads SET status = '".$status."', droppedBy = '".$droppedBy."', totalLoadDropped = totalLoadDropped + 1, dropped_Date = '".$dropped_Date."', droppedTime = '".$droppedTime."', layover = '".$layover."', layOverAmount = '".$layOverAmount."' WHERE loads.id = '".$load_id."'";
              $updateQuery2 = mysqli_query($conn, $update) or die(mysqli_error($conn));

              $update1 = "UPDATE loads_assigned SET status = '".$status."', totalLoadDropped = totalLoadDropped + 1, dropped_Date = '".$dropped_Date."', droppedTime = '".$droppedTime."' WHERE loads_assigned.load_id = '".$load_id."'";
              $updateQuery1 = mysqli_query($conn, $update1) or die(mysqli_error($conn));
              
             $sql12 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$truck."'"; 
              $query12 = mysqli_query($conn, $sql12) or die(mysqli_error($conn));
              
               $sql13 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$trailer."'"; 
              $query13 = mysqli_query($conn, $sql13) or die(mysqli_error($conn));
              
            $sql16 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$tractor."'"; 
              $query16 = mysqli_query($conn, $sql16) or die(mysqli_error($conn));
              
          if ($query) {
             echo '<script> alert("Load Successfully Delivered"); window.location.href = "load_assigned.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "load_assigned.php";</script>';
               
           }

    }

?>
