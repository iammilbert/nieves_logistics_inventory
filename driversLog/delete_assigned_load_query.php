<?php 
include '../config.php';
if (isset($_POST["deletedata"])) {

              $vehicle_id = $_POST['vehicle_id']; 
              $load_id = $_POST["load_id"];
           
            $sql = "DELETE FROM loads_assigned WHERE loads_assigned.load_id = '".$load_id."'";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

             $sql_vehicle = "DELETE FROM vehicles_assigned WHERE vehicles_assigned.load_id = '".$load_id."'";
            $query_vehicle = mysqli_query($conn, $sql_vehicle) or die(mysqli_error($conn));


            $vehicle = "UPDATE vehicles SET status = status - 1 WHERE id = '".$vehicle_id."'";
            $query_vehicle2 = mysqli_query($conn, $vehicle) or die(mysqli_error($conn));
;

              $insert = "UPDATE loads SET status = status - 1 WHERE id = '".$load_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));
            
        if ($query) {
             echo '<script> alert("Assigned Load successfully deleted"); window.location.href = "assigned_load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "assigned_load.php";</script>';
               
           }
          }
          ?>