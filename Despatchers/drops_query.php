 <!-- Load signup -->
<?php 
include('../config.php');
if (isset($_POST['submit'])){
	   $date = $_POST["date"];
       $time = $_POST["time"];
       $load_id = $_POST["load_id"];
       $city = $_POST["city"];
       $state = $_POST["state"];
       $totalDrops = $_POST["totalDrops"];
       $stateZipCode = $_POST["stateZipCode"]; 
       $address = $_POST["address"];
       $name = $_POST["name"]; 
        
            $sql = "INSERT INTO drops (date, time, stateZipCode, address, name, load_id, city, state) VALUES('$date', '$time', '$stateZipCode', '$address', '$name', '$load_id', '$city', '$state')";
           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

           $update = "UPDATE loads SET totalDrops = totalDrops + 1 WHERE loads.id = '".$load_id."'"; 
           $query = mysqli_query($conn, $update) or die(mysqli_error($conn));
           
          if($result){
             echo '<script> alert("Drop information Added!"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Error occur"); window.location.href = "load.php";</script>';
               
           }
        }
    ?>