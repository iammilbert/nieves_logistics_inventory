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

// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));

// get jwt
$id=isset($data->id) ? $data->id : "";

// if jwt is not empty
if($id){
    // if decode succeed, show user details
    try {
         $fetch_by_id = "SELECT * FROM `vehicles` WHERE `id`=:id"; 
         $query_stmt = $db->prepare($fetch_by_id); 
         $query_stmt->bindValue(':id', $id,PDO::PARAM_STR); 
         $query_stmt->execute();

    if($query_stmt->rowCount()){
      $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
        // set response code

        echo json_encode(array( 
            'status' => 200,
            'message' => 'successfully Fetched',
            'vehicle Type' => $row['vehicleType'],
            'Vehicle Number' => $row['number'], 
            'Vehicle VIN' => $row['vin'],
            'Vehicle PlateNumber' => $row['plateNumber'], 
             'vehicle Status' => $row['status'],   
            )); 

     }

    } 
    // if decode fails, it means jwt is invalid 
    catch (Exception $e){
    // set response code
    http_response_code(401);
    // tell the user access denied  & show error message
    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
}
}

// show error message if jwt is empty
else{
    // set response code
    http_response_code(401);
    // tell the user access denied
    echo json_encode(array("message" => "Access denied."));
}
?>
