<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// required to encode json web token
// include_once '../config/core.php';
include_once '../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../libs/php-jwt-master/src/ExpiredException.php';
include_once '../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;


$DBhost = "localhost";
$DBuser = "root";
$DBpassword ="";
$DBname="db";

$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname); 

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

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format

$bol_comment = $data->bol_comment;
$bolStatus = $data->bolStatus;
$load_id = $data->load_id;
$time_uploaded = $data->time_uploaded;
$date_uploaded = $data->date_uploaded;

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo json_encode(array(
            "status" => 'failed', 
            "message"=> "You file extension must be .zip, .pdf or .docx",
            "code" => 400, 
        )); 
        http_response_code(400); 

    } elseif ($_FILES['bol']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
        echo json_encode(array(
            "status" => 'failed', 
            "message"=> "File too large. It should not be larger than 10 Megabyte!",
            "code" => 400, 
        )); 
        http_response_code(400); 
 
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
        	$sql = "UPDATE loads SET bol = '".$filename."', bol_comment = '".$bol_comment."', time_uploaded = '".$time_uploaded."', date_uploaded = '".$date_uploaded."', bolStatus = '".$bolStatus."' WHERE loads.id = '".$load_id."'";

    if (mysqli_query($conn, $sql)) {
         echo json_encode(array(
            "status" => 'failed', 
            "message"=> "BOL uploaded successfully!",
            "code" => 400, 
        )); 
        http_response_code(400); 

           }
        } else {
    echo '<script> alert("BOL failed to uploaded. Please try again."); window.location.href = "load_delivered.php";</script>';
    echo json_encode(array(
        "status" => 'failed', 
        "message"=> "BOLOL failed to uploaded. Please try again.",
        "code" => 400, 
    )); 
    http_response_code(400); 
           
           }
        
    }
}

?>