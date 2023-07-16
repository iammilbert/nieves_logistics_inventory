<?php 
include '../config.php';
    if (isset($_POST['update'])) {

               $id = $_POST["id"];
                $driver_id = $_POST["driver_id"];

              $sql1 = "UPDATE loads SET loads.driver_id = '".$driver_id."' WHERE id = '".$id."'"; 
              $query1 = mysqli_query($conn, $sql1);


              $update = "UPDATE pickups SET pickups.driver_id = '".$driver_id."' WHERE load_id = '".$id."'"; 
              $updateQuery = mysqli_query($conn, $update);


               $updateDrops = "UPDATE drops SET drops.driver_id = '".$driver_id."' WHERE load_id = '".$id."'"; 
              $dropsQuery = mysqli_query($conn, $updateDrops);


               $sql = "UPDATE loads_assigned SET loads_assigned.driver_id = '".$driver_id."' WHERE loads_assigned.load_id = '".$id."'"; 
              $query = mysqli_query($conn, $sql);

           
          if ($query) {
             echo '<script> alert("Load re-assigned successfully"); window.location.href = "assigned_load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "assigned_load.php";</script>';
               
           }

    }

?>



