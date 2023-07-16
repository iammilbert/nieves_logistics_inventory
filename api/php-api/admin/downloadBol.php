<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/pdf'; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use \Firebase\JWT\JWT;


$DBhost = "localhost";
$DBuser = "root";
$DBpassword ="";
$DBname="db";

$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname); 

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$table_name = "loads";
$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
$file_id = isset($data->file_id) ? $data->file_id : "";

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT bol FROM loads WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    while($info = mysqli_fetch_array($result)){
        ?>

        <embed type="application/pdf" src="../drivers/bol/qw.jpeg; ?>" width="100%" height="100%"></embed>
        
        <?php
    }
}


?>