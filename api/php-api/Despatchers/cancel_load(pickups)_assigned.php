<?php

header("Access-Control-Allow-Origin: * ");
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

$load_id = '';
$pickedupTime = '';
$pickedup_Date = '';
$pickedStatus = '';
$totalLoadPicked =''; 
$comment = '';  
$id ='';  

$conn = null;

// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/user.php';
// get database connection
$database = new Database();
$conn = $database->getConnection();
// instantiate user object
$user = new User($conn);

$data = json_decode(file_get_contents("php://input"));

$user->load_id = $data->load_id;                                                     
$user->pickedStatus = $data->pickedStatus;
$user->pickedupTime = $data->pickedupTime;
$user->pickedup_Date = $data->pickedup_Date;                                                     
$user->comment = $data->comment;
$user->id = $data->id;
$user->totalLoadPicked = $data->totalLoadPicked;                                                     

    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

        $load_id = $data->load_id;                                                     
        $pickedStatus = $data->pickedStatus;
        $pickedupTime = $data->pickedupTime;
        $pickedup_Date = $data->pickedup_Date;                                                     
        $comment = $data->comment;
        $id = $data->id;
        $totalLoadPicked = $data->totalLoadPicked;  

        $user->cancel_pickups_assigned(); 
        $user->update_load_assigned_Cancel(); 
        $user->update_loads_cancel(); 

            $data = [
                "Status"=>200,
                "message"=> "Pickup Successfully Cancelled."
            ];
            echo json_encode(array($data));


}else{
      $data = [
                "Status"=>400,
                "message"=> "Pickup not Cancel."
            ];
            echo json_encode(array($data));
}
?> 