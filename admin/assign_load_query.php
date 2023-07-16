<?php 
include '../config.php';
    if (isset($_POST['assign'])) {
                $load_id = $_POST["load_id"];
                $driver_id = $_POST["driver_id"];
                $date_assigned = $_POST["date_assigned"];
                $truck = $_POST["truck"];
                $trailer = $_POST["trailer"];
                $tractor = $_POST["tractor"];
                $subDispatcher = $_POST["subDispatcher"];
                $status = $_POST["status"]; 
                $assignedBy = $_POST["assignedBy"]; 

            $select = mysqli_query($conn, "SELECT * FROM loads_assigned WHERE load_id = '".$_POST['load_id']."'"); 
            if(mysqli_num_rows($select)) { 
              echo '<script> alert("Load is already Assigned"); window.location.href = "load.php";</script>';
            }else { 
              $sql1 = "UPDATE loads SET loads.status = '".$status."', loads.driver_id = '".$driver_id."', loads.subDispatcher = '".$subDispatcher."' WHERE loads.id = '".$load_id."'"; 
              $query1 = mysqli_query($conn, $sql1);


              $update = "UPDATE pickups SET pickups.driver_id = '".$driver_id."' WHERE pickups.load_id = '".$load_id."'"; 
              $updateQuery = mysqli_query($conn, $update);


               $updateDrops = "UPDATE drops SET drops.driver_id = '".$driver_id."' WHERE drops.load_id = '".$load_id."'"; 
              $dropsQuery = mysqli_query($conn, $updateDrops);


               $sql = "INSERT INTO loads_assigned (driver_id, date_assigned, status, load_id, assignedBy, subDispatcher) VALUES('$driver_id', '$date_assigned', '$status', '$load_id', '$assignedBy', '$subDispatcher')"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $sql_vehicle = "INSERT INTO vehicles_assigned (driver_id, date_assigned, status, load_id, truck, trailer, tractor) VALUES('$driver_id', '$date_assigned', '$status', '$load_id', '$truck', '$trailer', '$tractor')"; 
              $query_vehicle = mysqli_query($conn, $sql_vehicle) or die(mysqli_error($conn));


               $sql_vehicle1 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$truck."'"; 
              $query_vehicle1 = mysqli_query($conn, $sql_vehicle1) or die(mysqli_error($conn));
              
              $sql_vehicle11 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$trailer."'"; 
              $query_vehicle11 = mysqli_query($conn, $sql_vehicle11) or die(mysqli_error($conn));
              
              $sql_vehicle12 = "UPDATE vehicles SET vehicles.status = '".$status."' WHERE vehicles.number = '".$tractor."'"; 
              $query_vehicle12 = mysqli_query($conn, $sql_vehicle12) or die(mysqli_error($conn));
           
            if ($query) {
             echo '<script> alert("Load assigned Successfully"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred. Please reassign"); window.location.href = "load.php";</script>';
               
           }

    }

}

?>



