<?php 
include '../config.php';
    if (isset($_POST['update'])) {
                $load_id = $_POST['load_id'];
                $truck = $_POST['truck'];
                $trailer = $_POST['trailer'];
                $tractor = $_POST['tractor'];
                $status = $_POST['status'];
                
                 $oldTruck = $_POST['oldTruck'];
                $oldTrailer = $_POST['oldTrailer'];
                $oldTractor = $_POST['oldTractor'];
    
               $sql = "UPDATE vehicles_assigned SET vehicles_assigned.truck = '".$truck."', vehicles_assigned.trailer = '".$trailer."', vehicles_assigned.tractor = '".$tractor."' WHERE vehicles_assigned.load_id = '".$load_id."' "; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              
             $sql12 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$truck."'"; 
              $query12 = mysqli_query($conn, $sql12) or die(mysqli_error($conn));
              
               $sql13 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$trailer."'"; 
              $query13 = mysqli_query($conn, $sql13) or die(mysqli_error($conn));
              
            $sql16 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$tractor."'"; 
              $query16 = mysqli_query($conn, $sql16) or die(mysqli_error($conn));
              
              
                 $sql14 = "UPDATE vehicles SET vehicles.status = 0 WHERE vehicles.number = '".$oldTrailer."'"; 
              $query14 = mysqli_query($conn, $sql14) or die(mysqli_error($conn));
              
                $sql15 = "UPDATE vehicles SET vehicles.status = 0 WHERE vehicles.number = '".$oldTruck."'"; 
              $query15 = mysqli_query($conn, $sql15) or die(mysqli_error($conn));
              
                  $sql17 = "UPDATE vehicles SET vehicles.status = 0 WHERE vehicles.number = '".$oldTractor."'"; 
              $query17 = mysqli_query($conn, $sql17) or die(mysqli_error($conn));

             if ($query) {
                echo '<script> alert("Vehicles assigned successfully"); window.location.href = "assigned_vehicle.php";</script>';
           }else {
            echo '<script> alert("Unknown error occurred. Please reassign"); window.location.href = "assigned_vehicle.php";</script>';
           
           }

    }

?>
