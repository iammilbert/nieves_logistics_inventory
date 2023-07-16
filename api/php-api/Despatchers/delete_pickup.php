<?php
// required headers

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
// instantiate user object
$user = new User($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// get jwt
$pickupID=isset($data->pickupID) ? $data->pickupID : "";

// if jwt is not empty
if($pickupID){
    // if decode succeed, show user details
    try {

         $fetch_by_pickupID = "DELETE FROM `pickups` WHERE `id`=:pickupID"; 
         $query_stmt = $db->prepare($fetch_by_pickupID); 
         $query_stmt->bindValue(':pickupID', $pickupID,PDO::PARAM_STR); 
         $query_stmt->execute();

    if($query_stmt->rowCount()){

         echo json_encode(array( 
              'success' => 200,
              'message' => 'Pickup successfully Deleted',

              )); 
     }

    else{

         echo json_encode(array( 
              'success' => 400,
              'message' => 'Error Occur!.',

              )); 
     }
    }

    
catch (Exception $e){
    // set response code
    http_response_code(401);
    // show error message
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
    echo json_encode(array(
        "success"=>400,
        "message" => "Pickup ID not Valid."
    ));
}
?>





