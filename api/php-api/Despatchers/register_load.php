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

$brokerName = '';
$brokerEmail = '';
$brokerNumber = '';
$shipperEmail = '';
$shipperAddress =''; 
$loadDescription = '';  
$rate  = '';
$rateConfirmationID ='';    
$dateRegistered = '';
$weight = '';
$status = '';
$registeredBy = '';

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

$user->brokerEmail = $data->brokerEmail;
$user->brokerName = $data->brokerName;
$user->brokerNumber = $data->brokerNumber;
$user->shipperEmail = $data->shipperEmail;
$user->shipperAddress = $data->shipperAddress;
$user->loadDescription = $data->loadDescription;
$user->rate = $data->rate;
$user->rateConfirmationID = $data->rateConfirmationID;
$user->dateRegistered = $data->dateRegistered;
$user->weight = $data->weight;
$user->registeredBy = $data->registeredBy;
$user->status = $data->status;


    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

$brokerEmail = $data->brokerEmail;
$brokerName = $data->brokerName;
$brokerNumber = $data->brokerNumber;
$shipperEmail = $data->shipperEmail;
$shipperAddress = $data->shipperAddress;
$loadDescription = $data->loadDescription;
$rate = $data->rate;
$rateConfirmationID = $data->rateConfirmationID;
$dateRegistered = $data->dateRegistered;
$weight = $data->weight;
$registeredBy = $data->registeredBy;
$status = $data->status;


if(!isset($data->brokerEmail) 
    || !isset($data->brokerName)
    || !isset($data->rateConfirmationID)
    || !isset($data->rate)
    || empty(trim($data->rateConfirmationID))
    || empty(trim($data->rate))
    || empty(trim($data->brokerEmail))
    || empty(trim($data->brokerName))
    ){

    $fields = ['fields' => ['brokerEmail','brokerName', 'rateConfirmationID', 'rate']];
    $returnData = ('Please Fill in all Required Fields!');
    echo json_encode(array($returnData, $fields));
  }
  else{


  $fetch_by_rateCon = "SELECT * FROM loads WHERE rateConfirmationID =:rateConfirmationID";
$query_stmt = $conn->prepare($fetch_by_rateCon); 
$query_stmt->bindValue(':rateConfirmationID', $rateConfirmationID,PDO::PARAM_STR); 
$query_stmt->execute();
$num = $query_stmt->rowCount();

    // if rateCon exists
    if($num>0){
       echo json_encode(
        array(
            "status" => 400,
            "message" => "Rate Confirmation ID already Exist"
        )); 
    }
   else{
    if($user->register_load()){
    echo json_encode(
        array(
            "status" => 200,
            "message" => "Load registered Successfully"
        )); 
    }
    else{  
            echo json_encode( 
                    array(
            "status" => 400,
            "message" => "Registration not Successful"
        )); 
    }
}

   }
}

?> 