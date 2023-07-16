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
// instantiate user object
$user = new User($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// get jwt
$name=isset($data->name) ? $data->name : ""; 

// if id is not empty
if($name){
    // if decode succeed, show user details
    try {

// set user property values
$user->ceo = $data->ceo;  
$user->name = $data->name; 
$user->tel = $data->tel; 
$user->mobile = $data->mobile;  
$user->country = $data->country;
$user->state = $data->state;
$user->city = $data->city;
$user->poBox = $data->poBox;
$user->address = $data->address;
$user->zipCode = $data->zipCode;
$user->email = $data->email;
$user->email2 = $data->email2;
$user->website = $data->website;

// update the user record
if($user->admin_update_company_info()){
// response in json format
echo json_encode(
        array(
            "status" => 200,
            "message" => "Company Data Updated Successfully."
        )
    );
}
// message if unable to update vehicle
else{
    echo json_encode(
        array(
            "status" => 400,
            "message" => "Company Date not Updated."
        )
    );
}
    }

    // if decode fails, it means jwt is invalid
catch (Exception $e){
    // set response code
    http_response_code(400);
    // show error message
    echo json_encode(array(
        "message" => "Error Occur, try again.",
        "error" => $e->getMessage()
    ));
}
}

// show error message if jwt is empty
else{
    // set response code
    http_response_code(400);
    // tell the user access denied
    echo json_encode(array("message" => "Input Comapny Name."));
}
?>