<!-- Truck Query -->
<?php
  include '../config.php';
   if(isset($_POST['update_vehicle'])){
       $id = $_POST["id"];
       $vehicleType = $_POST['vehicleType'];  
       $number = $_POST["number"];
       $vin = $_POST["vin"];
       $plateNumber = $_POST["plateNumber"];  

      $query_vehicle = "UPDATE vehicles SET number = '".$number."', vin = '".$vin."', vehicleType = '".$vehicleType."', plateNumber = '".$plateNumber."' WHERE id = '".$id."'";
        $query_run_vehicle = mysqli_query($conn, $query_vehicle) or die(mysqli_error($conn));

     if($query_run_vehicle)
        {
          echo '<script> alert("information updated successfully!"); window.location.href = "vehicles.php";</script>';
        }
        else
        {
           echo '<script> alert("Data not Updated. try again!"); window.location.href = "vehicles.php";</script>';
        }
     }
?>
