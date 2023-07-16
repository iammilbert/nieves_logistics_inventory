
<?php 
include('../config.php');
if (isset($_POST['update'])){
       $staff_id = $_POST["staff_id"];
       $amount = $_POST["amount"];
       $months = $_POST["months"];
       $dataAllowance = $_POST["dataAllowance"];
       $medicalAllowance = $_POST["medicalAllowance"];
       $tax = $_POST["tax"];
       $deduction = $_POST["deduction"];
       $reason = $_POST['reason'];
      $increment = $_POST["increment"];
       $incentive = $_POST["incentive"];


           	$sql = "UPDATE staff_salaries SET staff_salaries.amount = '".$amount."', staff_salaries.months = '".$months."', staff_salaries.dataAllowance = '".$dataAllowance."', staff_salaries.medicalAllowance = '".$medicalAllowance."', staff_salaries.reason = '".$reason."', staff_salaries.deduction = '".$deduction."', staff_salaries.incentive = '".$incentive."', staff_salaries.increment = '".$increment."', staff_salaries.tax = '".$tax."' WHERE staff_salaries.staff_id = '".$staff_id."'"; 
           	$query = mysqli_query($conn, $sql);
           
            if ($query) {
             echo '<script> alert("Successfully Edited"); window.location.href = "staff_due_payment.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred. Please try again"); window.location.href = "staff_due_payment.php";</script>';
               
           }
        
   }
 ?>