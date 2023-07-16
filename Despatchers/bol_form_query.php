<?php
include '../config.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['bol']['name'];

    // destination of the file on the server
    $destination = '../drivers/bol/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['bol']['tmp_name'];
    $size = $_FILES['bol']['size'];

    //other info
    $bol_comment = $_POST['bol_comment'];
    $bolStatus = $_POST['bolStatus'];
    $load_id = $_POST['load_id'];
    $time_uploaded = $_POST['time_uploaded'];
    $date_uploaded = $_POST['date_uploaded'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script> alert("You file extension must be .zip, .pdf or .docx"); window.location.href = "load_delivered.php";</script>';
    } elseif ($_FILES['bol']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
 
        echo '<script> alert("File too large. It should not be larger than 10 Megabyte!"); window.location.href = "load_delivered.php";</script>';
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
        	$sql = "UPDATE loads SET bol = '".$filename."', bol_comment = '".$bol_comment."', time_uploaded = '".$time_uploaded."', date_uploaded = '".$date_uploaded."', bolStatus = '".$bolStatus."' WHERE loads.id = '".$load_id."'";

    if (mysqli_query($conn, $sql)) {
         echo '<script> alert("BOL uploaded successfully"); window.location.href = "load_delivered.php";</script>';

           }
        } else {
    echo '<script> alert("BOL failed to uploaded. Please try again."); window.location.href = "load_delivered.php";</script>';
           
           }
        
    }
}
?>