 <!-- Load signup -->
<?php 
include('../config.php');
if (isset($_POST['submit'])){
       $date = $_POST["date"];
       $time = $_POST["time"];
       $load_id = $_POST["load_id"];
       $city = $_POST["city"];
       $state = $_POST["state"];
       $totalPickups = $_POST["totalPickups"];
       $stateZipCode = $_POST["stateZipCode"]; 
       $address = $_POST["address"];
       $name = $_POST["name"]; 

            $sql = "INSERT INTO pickups (date, time, stateZipCode, address, name, load_id, city, state) VALUES('$date', '$time', '$stateZipCode', '$address', '$name', '$load_id', '$city', '$state')";
           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

           $update = "UPDATE loads SET totalPickups = totalPickups + 1 WHERE loads.id = '".$load_id."'"; 
           $query = mysqli_query($conn, $update) or die(mysqli_error($conn));
           
        if($query){
             echo '<script> alert("Pickup information registered"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("unknown error occurred"); window.location.href = "load.php";</script>';
               
           }
        }
 ?>