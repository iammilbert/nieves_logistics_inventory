 <!-- Load signup -->
<?php 
include('../config.php');
if (isset($_POST['update'])){
       $id = $_POST["id"];
       $date = $_POST["date"];
       $time = $_POST["time"];
       $load_id = $_POST["load_id"];
       $city = $_POST["city"];
       $state = $_POST["state"];
       $stateZipCode = $_POST["stateZipCode"]; 
       $address = $_POST["address"];
       $name = $_POST["name"]; 

            $sql = "UPDATE pickups SET pickups.date = '".$date."', time = '".$time."', stateZipCode = '".$stateZipCode."', address = '".$address."', name = '".$name."', load_id = '".$load_id."', city = '".$city."', state = '".$state."' WHERE pickups.id = '".$id."'";

           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($result) {
               echo '<script> alert("Pickup successfully updated"); window.location = "load.php";</script>';
             
           }else { 
                 $error = "Error occured, try again";
               
           }
        }
 ?>