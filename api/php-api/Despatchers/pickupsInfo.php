<?php

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
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

include('../objects/listFunctions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

// get database connection
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));

// get ID
$loadID=isset($data->loadID) ? $data->loadID : "";

if($requestMethod = "GET"){


    //Pickups
    if($requestMethod == "GET"){
        $pickupsList = getAllpickups();
        echo $pickupsList;
        
        }
        else
        {
                $data = [
                        'status' => 404,
                        'message' => 'Method not Allowed',
                    ];
                    header("HTTP/1.0 404 Method not Allowed");
                    return json_encode($data);
        }
    }
   ?>
