
<?php 
include('../config.php');
if (isset($_POST['submit'])){
       $prepaidBy = $_POST["prepaidBy"];
       $staff_id = $_POST["staff_id"];
       $amount = $_POST["amount"];
       $months = $_POST["months"];
       $payRollStatus = $_POST["payRollStatus"];
       $dataAllowance = $_POST["dataAllowance"];
       $medicalAllowance = $_POST["medicalAllowance"];
       $tax = $_POST["tax"];
       $deduction = $_POST["deduction"];
       $reason = $_POST['reason'];
      $increment = $_POST["increment"];
       $incentive = $_POST["incentive"];

 
            $sql = "INSERT INTO staff_salaries (prepaidBy, staff_id, amount, months, payRollStatus, dataAllowance, medicalAllowance, tax, deduction, reason, increment, incentive) VALUES('$prepaidBy', '$staff_id', '$amount', '$months', '$payRollStatus', '$dataAllowance', '$medicalAllowance', '$tax', '$deduction', '$reason', '$increment', '$incentive')";
           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
           
           	$sql2 = "UPDATE users SET users.payRollStatus = 1 WHERE users.id = '".$staff_id."'"; 
           	$query2 = mysqli_query($conn, $sql2);
           
            if ($result) {
             echo '<script> alert("Pay Roll Set"); window.location.href = "staff_due_payment.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred. Please try again"); window.location.href = "staff_due_payment.php";</script>';
               
           }
        
   }
 ?>