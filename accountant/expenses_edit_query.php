 <!-- Load signup -->
<?php 
include('../config.php');
if (isset($_POST['submit'])){
       $id = $_POST["id"];
       $dateSpent = $_POST["dateSpent"];
       $amount = $_POST["amount"];
       $description = $_POST["description"];
       $incuredBy = $_POST["incuredBy"];
       $type = $_POST["type"];

            $sql = "UPDATE expenses SET expenses.dateSpent = '".$dateSpent."', amount = '".$amount."', description = '".$description."', incuredBy = '".$incuredBy."', type = '".$type."' WHERE expenses.id = '".$id."'";

           $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
           
           	 if ($result) {
             echo '<script> alert("Successfully updated"); window.location.href = "registered_Expenditures.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "registered_Expenditures.php";</script>';
               
           }
        }
 ?>