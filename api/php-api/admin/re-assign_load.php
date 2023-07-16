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
$driver_id = '';

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
$user->driver_id = $data->driver_id;

    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

$load_id = $data->load_id;                                                
$driver_id = $data->driver_id;
 
    //Re-Assign Load All Queries

        $user->reassign_pickup_update(); 
        $user->reassign_drops_update();
        $user->reassign_load_update();
        $user->reassign_loads_assigned_update();

            echo json_encode(array(
                "status" => 'success', 
                "message"=> "Load Re-assigned Successfully.",
                "code" => 200, 
            )); 
            http_response_code(200); 


}else{
            echo json_encode(array(
                "status" => 'failed', 
                "message"=> "Error Occur",
                "code" => 400, 
            )); 
            http_response_code(400); 
            
}
?> 