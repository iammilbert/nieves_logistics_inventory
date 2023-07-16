
<?php
  include('../config.php');
     $id = $_POST['delete_id'];
  $sql="DELETE FROM loads WHERE id='$id'";
      if(mysqli_query($conn, $sql)){
             echo '<script> alert("Load Deleted!"); window.location.href = "load.php";</script>';
             
           }else { 
                echo '<script> alert("Unknown Error Occur, Try again"); window.location.href = "load.php";</script>';
               
           }

?>