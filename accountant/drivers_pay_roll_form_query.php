<?php 
include '../config.php';
    if (isset($_POST['submit'])) {
                $load_id = $_POST["load_id"];
                $driver_expenses = $_POST["driver_expenses"]; 
                $payrollStatus = $_POST["payrollStatus"];
                $driver_id = $_POST["driver_id"];
                $deduction = $_POST["deduction"];
                $netPay = $_POST["netPay"]; 
                $deduction_reason = $_POST["deduction_reason"]; 
                $medicalAllowance = $_POST["medicalAllowance"]; 
                $dataAllowance = $_POST["dataAllowance"]; 
                $tax = $_POST["tax"]; 
                $loan = $_POST["loan"]; 
                $percent = $_POST["percent"]; 
                $basicPayAmount = $_POST["basicPayAmount"]; 
                $preparedBy = $_POST["preparedBy"]; 

                
              $sql = "INSERT INTO drivers_pay_roll (load_id, driver_expenses, driver_id, deduction, netPay, deduction_reason, medicalAllowance, dataAllowance, tax, loan, percent, basicPayAmount, preparedBy) VALUES('".$load_id."', '".$driver_expenses."', '".$driver_id."', '".$deduction."', '".$netPay."', '".$deduction_reason."', '".$medicalAllowance."', '".$dataAllowance."', '".$tax."', '".$loan."', '".$percent."', '".$basicPayAmount."', '".$preparedBy."')"; 
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


                 $sql1 = "UPDATE loads SET payrollStatus = '".$payrollStatus."', netPay = '".$netPay."' WHERE loads.id = '".$load_id."'"; 
              $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
              

               $sql2 = "UPDATE vehicles_assigned SET payrollStatus = '".$payrollStatus."' WHERE vehicles_assigned.load_id = '".$load_id."' "; 
              $query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

           
        if ($query) {
             echo '<script> alert("Payroll registered"); window.location.href = "load_delivered.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown error occurred"); window.location.href = "load_delivered.php";</script>';
               
           }

    }

?>
