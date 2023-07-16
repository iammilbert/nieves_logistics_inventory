<?php 
include '../config.php';
    if (isset($_POST['pay'])) {
                $driver_id = $_POST["driver_id"];
                $amountPaid = $_POST["amountPaid"]; 
                $paymentStatus = $_POST["paymentStatus"]; 
                $datePaid = $_POST["datePaid"];
                $startDate = $_POST["startDate"];
                $endDate = $_POST["endDate"];
                $timePaid = $_POST["timePaid"]; 
                $payrollStatus = $_POST["payrollStatus"];
                $grossPay = $_POST["grossPay"];
                $comment = $_POST["comment"];
                $paidBy = $_POST["paidBy"];

                
              $sql = "UPDATE drivers_pay_roll SET paidBy = '".$paidBy."', paymentStatus = '".$paymentStatus."', drivers_pay_roll.amountPaid = '".$amountPaid."', drivers_pay_roll.datePaid = '".$datePaid."', drivers_pay_roll.timePaid = '".$timePaid."' WHERE drivers_pay_roll.driver_id = '".$driver_id."' AND drivers_pay_roll.paymentStatus = 0"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


              $sql1 = "UPDATE loads SET paidBy = '".$paidBy."', datePaid = '".$datePaid."', paymentStatus = '".$paymentStatus."' WHERE loads.driver_id = '".$driver_id."' AND loads.paymentStatus = 0 AND loads.payrollStatus = 1 AND loads.totalDrops = loads.totalLoadDropped AND loads.totalPickups = loads.totalLoadPicked AND loads.dropped_Date BETWEEN '".$startDate."' AND '".$endDate."'";  
              $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn)); 


              $sql2 = "UPDATE drops SET paymentStatus = '".$paymentStatus."' WHERE drops.driver_id = '".$driver_id."' AND drops.paymentStatus = 0 AND drops.status = 3 AND drops.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'"; 
              $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 


              $sql3 = "UPDATE loads_assigned SET paymentStatus = '".$paymentStatus."' WHERE loads_assigned.driver_id = '".$driver_id."' AND loads_assigned.paymentStatus = 0 AND loads_assigned.status = 3 AND loads_assigned.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'"; 
              $query3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn)); 

               $sql4 = "UPDATE vehicles_assigned SET paymentStatus = '".$paymentStatus."' WHERE vehicles_assigned.driver_id = '".$driver_id."' AND vehicles_assigned.paymentStatus = 0 AND vehicles_assigned.status = 3 AND vehicles_assigned.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'"; 
              $query4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn)); 


              $wages = "INSERT INTO wages (driver_id, datePaid, timePaid, grossPay, amountPaid, comment, startDate, endDate) VALUES('".$driver_id."', '".$datePaid."', '".$timePaid."', '".$grossPay."', '".$amountPaid."', '".$comment."', '".$startDate."', '".$endDate."')";
                $wages_query = mysqli_query($conn, $wages);

           
    if ($query) {
             echo '<script> alert("Payment Successful"); window.location.href = "drivers_due_payment.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred"); window.location.href = "drivers_due_payment.php";</script>';
               
           }

    }

?>
