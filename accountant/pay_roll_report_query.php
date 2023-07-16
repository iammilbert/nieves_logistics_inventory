<?php 
include '../config.php';
    if (isset($_POST['view'])) {
                $load_id = $_POST["load_id"];
                $from = $_POST["from"];
                $end = $_POST["end"];
                $driver_id = $_POST["driver_id"];

                
              $sql = "INSERT INTO drivers_pay_roll (load_id, from, end, driver_id) VALUES('".$load_id."', '".$from."', '".$end."', '".$driver_id."')"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


             if ($query) {

                echo '<script> alert("Payroll registered"); window.location.href = "load_delivered.php";</script>';
             

           
           }else {
              echo '<script> alert("Unknown error occurred"); window.location.href = "load_delivered.php";</script>';
           
           }

    }

?>
