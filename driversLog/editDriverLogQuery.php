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
     $id = $_POST['id'];
    $driverID = $_POST['driverID'];
    $uploadedBy = $_POST['uploadedBy'];
    $time_uploaded = $_POST['time_uploaded'];
    $date_uploaded = $_POST['date_uploaded'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script> alert("You file extension must be .zip, .pdf or .docx"); window.location.href = "registered_RC.php";</script>';
    } elseif ($_FILES['bol']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
 
        echo '<script> alert("File too large. It should not be larger than 10 Megabyte!"); window.location.href = "registered_RC.php";</script>';
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
        	$sql = "UPDATE driversLog SET rateConfirmation = '".$filename."', comment = '".$comment."', time_uploaded = '".$time_uploaded."', date_uploaded = '".$date_uploaded."', status = '".$status."', uploadedBy = '".$uploadedBy."', WHERE driversLog.id = '".$id."'";

    if (mysqli_query($conn, $sql)) {
         echo '<script> alert("Uploaded successfully"); window.location.href = "registered_RC.php";</script>';

           }
        } else {
    echo '<script> alert("BOL failed to uploaded. Please try again."); window.location.href = "registered_RC.php";</script>';
           
           }
        
    }
}
?>