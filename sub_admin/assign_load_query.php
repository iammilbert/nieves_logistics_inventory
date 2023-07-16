<?php 
include '../config.php';
    if (isset($_POST['assign'])) {
                $load_id = $_POST["load_id"];
                $driver_id = $_POST["driver_id"];
                $date_assigned = $_POST["date_assigned"];
                $vehicle_id = $_POST["vehicle_id"];
                $status = $_POST["status"]; 
                $assignedBy = $_POST["assignedBy"]; 

            $select = mysqli_query($conn, "SELECT * FROM loads_assigned WHERE load_id = '".$_POST['load_id']."'"); 
            if(mysqli_num_rows($select)) { 
              echo '<script> alert("Load is already Assigned"); window.location.href = "load.php";</script>';
            }else { 
              $sql1 = "UPDATE loads SET loads.status = '".$status."', loads.driver_id = '".$driver_id."' WHERE loads.id = '".$load_id."'"; 
              $query1 = mysqli_query($conn, $sql1);


              $update = "UPDATE pickups SET pickups.driver_id = '".$driver_id."' WHERE pickups.load_id = '".$load_id."'"; 
              $updateQuery = mysqli_query($conn, $update);


               $updateDrops = "UPDATE drops SET drops.driver_id = '".$driver_id."' WHERE drops.load_id = '".$load_id."'"; 
              $dropsQuery = mysqli_query($conn, $updateDrops);


               $sql = "INSERT INTO loads_assigned (driver_id, date_assigned, status, vehicle_id, load_id, assignedBy) VALUES('$driver_id', '$date_assigned', '$status', '$vehicle_id', '$load_id', '$assignedBy')"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $sql_vehicle = "INSERT INTO vehicles_assigned (driver_id, date_assigned, status, vehicle_id, load_id) VALUES('$driver_id', '$date_assigned', '$status', '$vehicle_id', '$load_id')"; 
              $query_vehicle = mysqli_query($conn, $sql_vehicle) or die(mysqli_error($conn));


               $sql_vehicle1 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.id = '".$vehicle_id."'"; 
              $query_vehicle1 = mysqli_query($conn, $sql_vehicle1) or die(mysqli_error($conn));
           
            if ($query) {
             echo '<script> alert("Load assigned Successfully"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred. Please reassign"); window.location.href = "load.php";</script>';
               
           }

    }

}

?>



