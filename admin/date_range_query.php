<?php 
include('config.php');
$error = "";


    if (isset($_POST['view'])) {
      $from = $_POST['from'];
      $end = $_POST['end'];
      $load_id = $_POST['load_id'];
      $driver_id = $_POST['driver_id']

      $startdate = strtotime("Saturday"); 
      $enddate = strtotime("+6 weeks", $startdate);


     $sql = "SELECT * FROM loads WHERE loads.paymentStatus = 0 AND  loads.dropped_Date  BETWEEN '".$from."' AND '".$end."' ";
     $result = mysqli_query($conn, $sql); 
     $row = mysqli_num_rows($result);
}
  ?>