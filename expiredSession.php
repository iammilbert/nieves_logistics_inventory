<?php  
session_start();
include 'config.php';
      if(isset($_SESSION["staffId"]))  
      {  
           if((time() - $_SESSION['last_login_timestamp']) > 300)  
           {  
                echo '<script> alert("Session expired, Click ok to login back."); window.location.href = "lockscreen.php";</script>';
           }  
           else  
           {  
                $_SESSION['last_login_timestamp'] = time();  
           }  
      }  
      else  
      {  
           echo '<script> window.location.href = "login.php";</script>'; 
      }  
?> 