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


$date = '';
$time = '';
$load_id = '';
$city = '';
$state = '';
$stateZipCode = ''; 
$address = '';
$name = ''; 

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

$user->date = $data->date;
$user->time = $data->time;
$user->load_id = $data->load_id;
$user->city = $data->city;
$user->state = $data->state;
$user->stateZipCode = $data->stateZipCode;
$user->address = $data->address;
$user->name = $data->name;

// IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){
        if(!isset($data->date) 
            || !isset($data->load_id)
            || !isset($data->city) 
            || !isset($data->stateZipCode) 
            || !isset($data->address)
            || !isset($data->state) 
            || !isset($data->name) 
            || !isset($data->time) 
            || empty(trim($data->date))
            || empty(trim($data->load_id))
            || empty(trim($data->city))
            || empty(trim($data->state))
            || empty(trim($data->stateZipCode))
            || empty(trim($data->address))
            || empty(trim($data->name))
            || empty(trim($data->time))
            ){
            $returnData = ('Please Fill in all Required Fields!');
            echo json_encode(array($returnData));
  
        }
        else
        {

    $date = $data->date;
    $time = $data->time;
    $load_id = $data->load_id;
    $city = $data->city;
    $state = $data->state;
    $stateZipCode = $data->stateZipCode;
    $address = $data->address;
    $name = $data->name;
    
	$query = "UPDATE loads SET totalDrops =totalDrops + 1 WHERE loads.id = :load_id";
	// prepare the query
	$query_stmt1= $conn->prepare($query);
	$query_stmt1->bindValue(':load_id', $load_id,PDO::PARAM_STR);       
	// execute the query
	if($query_stmt1->execute()){
        $user->add_drop(); 
        echo json_encode(
            array(
                "status"=>200,
                "message" => "Drops registered Successfully."
            )
        );
	}else{

    }
	
	} 
}

?> 