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
$truck = '';
$trailer = '';
$tractor = '';
$dropID = '';
$droppedTime = '';
$dropped_Date = '';
$comment = ''; 
$status = ''; 
$droppedBy = '';
$amount_Spent = '';
$expenses_Type = '';
$expenses_Description = '';
$layover = '';
$layOverAmount = '';


$conn = null;

// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/user.php';


include('../objects/listFunctions.php');


// get database connection
$database = new Database();
$conn = $database->getConnection();
// instantiate user object
$user = new User($conn);

$data = json_decode(file_get_contents("php://input"));

$user->load_id = $data->load_id;
$user->truck = $data->truck;
$user->trailer = $data->trailer;
$user->tractor = $data->tractor;
$user->dropID = $data->dropID;
$user->droppedTime = $data->droppedTime;
$user->dropped_Date = $data->dropped_Date;
$user->comment = $data->comment; 
$user->status = $data->status; 
$user->droppedBy = $data->droppedBy;
$user->amount_Spent = $data->amount_Spent;
$user->expenses_Type = $data->expenses_Type;
$user->expenses_Description = $data->expenses_Description;
$user->layover = $data->layover;
$user->layOverAmount = $data->layOverAmount;

    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

    $load_id = $data->load_id;
    $truck = $data->truck;
    $trailer = $data->trailer;
    $tractor = $data->tractor;
    $dropID = $data->dropID;
    $droppedTime = $data->droppedTime;
    $dropped_Date = $data->dropped_Date;
    $comment = $data->comment; 
    $status = $data->status; 
    $droppedBy = $data->droppedBy;
    $amount_Spent = $data->amount_Spent;
    $expenses_Type = $data->expenses_Type;
    $expenses_Description = $data->expenses_Description;
    $layover = $data->layover;
    $layOverAmount = $data->layOverAmount;

            $fetch_user_by_id = "SELECT * FROM `loads` WHERE `id`=:load_id"; 
            $query_stmt = $conn->prepare($fetch_user_by_id); 
            $query_stmt->bindValue(':load_id', $load_id,PDO::PARAM_STR); 
            $query_stmt->execute();
            $row = $query_stmt->fetch(PDO::FETCH_ASSOC);

          if($row["totalLoadPicked"] < 1){
            
            http_response_code(200); 
            echo json_encode(array(
                "status" => 'failed', 
                "message" => "No load Picked, Ensure the load is Picked before Delivery.",
                "code" => 200, 
            )); 
        }
        elseif($row["totalLoadPicked"] > 0){

            $user->dropLoad_loads_assigned_update();
            $user->dropLoad_drop_update();
            $user->dropLoad_vehicle_assigned_update();
            $user->dropLoad_loads_update();
            $user->dropLoad_vehicles_update_truck();
            $user->dropLoad_vehicles_update_trailer();
            $user->dropLoad_vehicles_update_tractor();
            
            echo json_encode(array(
                "status" => 'success', 
                "message"=> "Load Successfully Delivered.",
                "code" => 200, 
            )); 
            http_response_code(200); 

    }else{

        echo json_encode(array(
            "status" => 'success', 
            "message"=> "Unknown Error Occur, Try again.",
            "code" => 400, 
        )); 
        http_response_code(400); 
}
}

?> 