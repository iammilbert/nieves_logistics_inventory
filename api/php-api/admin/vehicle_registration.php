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

$vehicleType = '';
$number = '';
$vin = '';
$plateNumber = '';
$status = '';


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

$user->vehicleType = $data->vehicleType;
$user->number = $data->number;
$user->vin = $data->vin;
$user->plateNumber = $data->plateNumber;
$user->status = $data->status;


    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){
    $vehicleType = $data->vehicleType;
    $number = $data->number;
    $vin = $data->vin;
    $plateNumber = $data->plateNumber;
    $status = $data->status;


    if(!isset($data->vehicleType) 
    || !isset($data->number)
    || !isset($data->vin)
    || !isset($data->plateNumber)
    || empty(trim($data->vehicleType))
    || empty(trim($data->number))
    || empty(trim($data->vin))
    || empty(trim($data->plateNumber))
    ){

    $fields = ['fields' => ['vehicleType','number', 'vin', 'plateNumber']];
    $returnData = ('Please Fill in all Required Fields!');
    echo json_encode(array($returnData, $fields));
  }
  else{
 
    $fetch_vehicle_by_number = "SELECT * FROM vehicles WHERE number =:number";
     $query_stmt = $conn->prepare($fetch_vehicle_by_number); 
     $query_stmt->bindValue(':number', $number,PDO::PARAM_STR); 
     $query_stmt->execute();
     $num = $query_stmt->rowCount();

     $fetch_vehicle_by_plateNumber = "SELECT * FROM vehicles WHERE plateNumber =:plateNumber";
     $query_stmt_plate = $conn->prepare($fetch_vehicle_by_plateNumber); 
     $query_stmt_plate->bindValue(':plateNumber', $plateNumber,PDO::PARAM_STR); 
     $query_stmt_plate->execute();
     $num_plateNumber = $query_stmt_plate->rowCount();

     $fetch_vehicle_by_vin = "SELECT * FROM vehicles WHERE vin =:vin";
     $query_stmt_vin = $conn->prepare($fetch_vehicle_by_vin); 
     $query_stmt_vin->bindValue(':vin', $vin,PDO::PARAM_STR); 
     $query_stmt_vin->execute();
     $num_vin = $query_stmt_vin->rowCount();

    // if email exists
    if($num>0){
       echo json_encode(
          array(
            "status" => 400,
            "message" => "vehicle number Already Exist"
        )); 
    }
    elseif($num_plateNumber>0){
       echo json_encode(
          array(
            "status" => 400,
            "message" => "Vehicle Plate Number Already Exist"
        )); 
    }

    elseif($num_vin>0){
       echo json_encode(
        array(
        "status" => 400, 
        "message" => "vehicle VIN already Exist"
    )); 
    } 
   else{
    if($user->register_vehicle()){
        echo json_encode(
            array(
                "status" => 200,
                "message" => "Vehicle Succesfully Registered."
            )); 
    }
    else{  
            http_response_code(400); 
            echo json_encode(array("message" => "Registration not Successful.")); 
    }
}

   } 

}


 
?> 