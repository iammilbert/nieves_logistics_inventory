<?php
include '../config.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['expenses_file']['name'];

    // destination of the file on the server
    $destination = '../admin/expensesFiles/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['expenses_file']['tmp_name'];
    $size = $_FILES['expenses_file']['size'];

    //other info
    $file_comment = $_POST['file_comment'];
    $expid = $_POST['expid'];
    $fileStatus = $_POST['fileStatus'];
    $time_uploaded = $_POST['time_uploaded'];
    $date_uploaded = $_POST['date_uploaded'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script> alert("You file extension must be .zip, .pdf or .docx"); window.location.href = "registered_Expenditures.php";</script>';
    } elseif ($_FILES['expenses_file']['size'] > 4000000) { // file shouldn't be larger than 4Megabyte
 
        echo '<script> alert("File too large!"); window.location.href = "registered_Expenditures.php";</script>';
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
        	$sql = "UPDATE expenses SET expenses_file = '".$filename."', file_comment = '".$file_comment."', time_uploaded = '".$time_uploaded."', date_uploaded = '".$date_uploaded."', fileStatus = '".$fileStatus."' WHERE expenses.id = '".$expid."'";

    if (mysqli_query($conn, $sql)) {
         echo '<script> alert("File uploaded successfully"); window.location.href = "registered_Expenditures.php";</script>';

           }
        } else {
    echo '<script> alert("File failed to uploaded. Please try again."); window.location.href = "registered_Expenditures.php";</script>';
           
           }
        
    }
}