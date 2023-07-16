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
     $id = $_POST['id'];
    $driverID = $_POST['driverID'];
    $time_uploaded = $_POST['time_uploaded'];
    $date_uploaded = $_POST['date_uploaded'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script> alert("You file extension must be .zip, .pdf or .docx"); window.location.href = "registered_Tickets.php";</script>';
    } elseif ($_FILES['bol']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
 
        echo '<script> alert("File too large. It should not be larger than 10 Megabyte!"); window.location.href = "registered_Tickets.php";</script>';
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
        	$sql = "UPDATE ticket SET ticket = '".$filename."', comment = '".$comment."', time_uploaded = '".$time_uploaded."', date_uploaded = '".$date_uploaded."', status = '".$status."', fileName = '".$fileName."' WHERE ticket.id = '".$id."'";

    if (mysqli_query($conn, $sql)) {
         echo '<script> alert("Uploaded successfully"); window.location.href = "registered_Tickets.php";</script>';

           }
        } else {
    echo '<script> alert("Ticket failed to uploaded. Please try again."); window.location.href = "registered_Tickets.php";</script>';
           
           }
        
    }
}
?>