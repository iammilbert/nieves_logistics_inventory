<?php 
include '../config.php';
    if (isset($_POST['pay'])) {

                $paidSlipID = $_POST["paidSlipID"];
                $amountPaid = $_POST["amountPaid"]; 
                $status = $_POST["status"]; 
                $datePaid = $_POST["datePaid"];
                $timePaid = $_POST["timePaid"]; 
                $comment = $_POST["comment"];
                $paidBy = $_POST["paidBy"];
                $staff_id = $_POST["staffID"];
                $lastPaymentMonth = $_POST["lastPaymentMonth"];

                
              $sql = "UPDATE staff_salaries SET paidBy = '".$paidBy."', status = '".$status."', amountPaid = '".$amountPaid."', datePaid = '".$datePaid."', timePaid = '".$timePaid."', comment = '".$comment."' WHERE staff_salaries.id = '".$paidSlipID."' "; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              
              $sql1 = "UPDATE users SET status = '".$status."', lastSalaryStatus = '".$status."', lastPaymentMonth = '".$lastPaymentMonth."', payRollStatus =0 WHERE users.id = '".$staff_id."' "; 
              $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

           
    if ($query) {
             echo '<script> alert("Payment Successfully"); window.location.href = "staff_due_payment.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred. Please reassign"); window.location.href = "payRollSlip.php";</script>';
               
           }

    }

?>
