 <!-- Load signup -->
<?php 
include('../config.php');
if (isset($_POST['submit'])){
       $description = $_POST["description"];
       $amount = $_POST["amount"];
       $dateSpent = $_POST["dateSpent"]; 
       $incuredBy = $_POST["incuredBy"]; 
       $months = $_POST["months"];
       $expensesType = $_POST["expensesType"];
       
       
        

        $sql = "INSERT INTO expenses (description, amount, dateSpent, incuredBy, months, expensesType) VALUES('$description', '$amount', '$dateSpent', '$incuredBy', '$months', '$expensesType')";
           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
           	 if ($result) {
             echo '<script> alert("Successfully Registered"); window.location.href = "registered_Expenditures.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "registered_Expenditures.php";</script>';
               
           }
        }

?>