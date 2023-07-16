<?php
include '../config.php'; 
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['rateConfirmation']['name'];

    // destination of the file on the server
    $destination = 'logs/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['rateConfirmation']['tmp_name'];
    $size = $_FILES['rateConfirmation']['size'];
    
    //other info
    $comment = $_POST['comment'];
    $rateConfirmationID = $_POST['rateConfirmationID'];
    $status = $_POST['status'];
    $driverID = $_POST['driverID'];
    $uploadedBy = $_POST['uploadedBy'];
    $time_uploaded = $_POST['time_uploaded'];
    $date_uploaded = $_POST['date_uploaded'];
        

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script> alert("You file extension must be .zip, .pdf or .docx"); window.location.href = "bol_form.php";</script>';
    } 
    
    elseif ($_FILES['rateConfirmation']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
 
        echo '<script> alert("File too large. It should not be larger than 10 Megabyte!"); window.location.href = "bol_form.php";</script>';
    } 
    
    else {
           
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
        	$sql = "INSERT INTO driversLog (rateConfirmation, rateConfirmationID, comment, status, time_uploaded, date_uploaded, uploadedBy, driverID) VALUES('".$filename."', '".$rateConfirmationID."', '".$comment."', '".$status."', '".$time_uploaded."', '".$date_uploaded."', '".$uploadedBy."', '".$driverID."')";

                if (mysqli_query($conn, $sql)) {
                    echo '<script> alert("RC uploaded successfully"); window.location.href = "bol_form.php";</script>'; 
                    
                } 
                
                else {
                     echo '<script> alert("Erro! Duplicate File or Rate Confirmation ID."); window.location.href = "bol_form.php";</script>'; 
                }
        } 
        
    }
}
?>