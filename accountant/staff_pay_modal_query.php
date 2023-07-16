
<?php 
include('../config.php');
if (isset($_POST['submit'])){
       $datePaid = $_POST["datePaid"];
       $timePaid = $_POST["timePaid"];
       $paidBy = $_POST["paidBy"];
       $status = $_POST["status"];
       $amount = $_POST["amount"];
       $months = $_POST["months"];
       $staff_id = $_POST["staff_id"];
       $comment = $_POST["comment"];
       $nextpaymentDate = $_POST['nextpaymentDate'];
 
            $sql = "INSERT INTO staff_salaries (datePaid, timePaid, amount, months, staff_id, comment, nextpaymentDate, paidBy, status) VALUES('$datePaid', '$timePaid', '$amount', '$months', '$staff_id', '$comment', '$nextpaymentDate', '$paidBy', '$status')";
           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


            $insert = "UPDATE users SET users.lastPaymentMonth = '".$months."' WHERE id = '".$staff_id."'";
              $insertQuery = mysqli_query($conn, $insert) or die(mysqli_error($conn));
           
    if ($result) {
             echo '<script> alert("Payment Successfully"); window.location.href = "staff_due_payment.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred"); window.location.href = "staff_due_payment.php";</script>';
               
           }
        
   }
 ?>