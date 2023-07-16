<?php 
include '../config.php';
    if (isset($_POST['fetch'])) {
                $vehicle_id = $_POST['vehicle_id'];
                $from = $_POST["from"];
                $to = $_POST["to"];
                $status = $_POST["status"]; 


                 $sql = "SELECT * FROM vehicles_assigned WHERE date.status = 3";

                  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_assoc($query)){
                    ?>

        }

?>


