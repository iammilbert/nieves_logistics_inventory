<?php
include '../config.php'; 
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['ticket']['name'];

    // destination of the file on the server
    $destination = 'tickets/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['ticket']['tmp_name'];
    $size = $_FILES['ticket']['size'];
    
    //other info
    $comment = $_POST['comment'];
    $fileName = $_POST['fileName'];
    $status = $_POST['status'];
    $driverID = $_POST['driverID'];
    $time_uploaded = $_POST['time_uploaded'];
    $date_uploaded = $_POST['date_uploaded'];
        

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script> alert("You file extension must be .zip, .pdf or .docx"); window.location.href = "driversTicketForm.php";</script>';
    } 
    
    elseif ($_FILES['ticket']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
 
        echo '<script> alert("File too large. It should not be larger than 10 Megabyte!"); window.location.href = "driversTicketForm.php";</script>';
    } 
    
    else {
           
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
        	$sql = "INSERT INTO ticket(ticket, fileName, comment, status, time_uploaded, date_uploaded, driverID) VALUES('".$filename."', '".$fileName."', '".$comment."', '".$status."', '".$time_uploaded."', '".$date_uploaded."', '".$driverID."')";

                if (mysqli_query($conn, $sql)) {
                    echo '<script> alert("File uploaded successfully"); window.location.href = "driversTicketForm.php";</script>'; 
                    
                } 
                
        } 
        
                else {
                     echo '<script> alert("Erro occured"); window.location.href = "driversTicketForm.php";</script>'; 
                }
        
    }
}
?>