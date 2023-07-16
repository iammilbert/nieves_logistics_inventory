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
$droppedTime = '';
$dropped_Date = '';
$status = '';
$totalLoadDropped =''; 
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
$user->status = $data->status;
$user->droppedTime = $data->droppedTime;
$user->dropped_Date = $data->dropped_Date;                                                     
$user->comment = $data->comment;
$user->id = $data->id;
$user->totalLoadDropped = $data->totalLoadDropped;                                                     

    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

        $load_id = $data->load_id;                                                     
        $status = $data->status;
        $droppedTime = $data->droppedTime;
        $dropped_Date = $data->dropped_Date;                                                     
        $comment = $data->comment;
        $id = $data->id;
        $totalLoadDropped = $data->totalLoadDropped;  

        $user->cancel_drops_assigned(); 
        $user->update_load_assigned_drops_Cancel(); 
        $user->update_loads_drops_cancel(); 

            $data = [
                "Status"=>200,
                "message"=> "Drops Successfully Cancelled."
            ];
            echo json_encode(array($data));


}else{
      $data = [
                "Status"=>400,
                "message"=> "Drops not Cancel."
            ];
            echo json_encode(array($data));
}
?> 