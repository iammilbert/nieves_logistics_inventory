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
$date_assigned = '';
$truck = '';
$trailer =''; 
$tractor = '';  
$status ='';    
$assignedBy = '';
$subDispatcher = '';

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
$user->status = $data->status;
$user->assignedBy = $data->assignedBy;                                                     
$user->date_assigned = $data->date_assigned;
$user->subDispatcher = $data->subDispatcher;
$user->truck = $data->truck;                                                     
$user->tractor = $data->tractor;
$user->trailer = $data->trailer;

    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

$load_id = $data->load_id;                                                
$driver_id = $data->driver_id;
$status = $data->status;
$assignedBy = $data->assignedBy;                                                     
$date_assigned = $data->date_assigned;
$subDispatcher = $data->subDispatcher;
$truck = $data->truck;                                                     
$tractor = $data->tractor;
$trailer = $data->trailer;

$fetch_by_rateCon = "SELECT * FROM loads_assigned WHERE load_id =:load_id";
$query_stmt = $conn->prepare($fetch_by_rateCon); 
$query_stmt->bindValue(':load_id', $load_id,PDO::PARAM_STR); 
$query_stmt->execute();
$num = $query_stmt->rowCount();


$fetch_by_veh = "SELECT * FROM vehicles_assigned WHERE load_id =:load_id";
$query_stmt_veh = $conn->prepare($fetch_by_veh); 
$query_stmt_veh->bindValue(':load_id', $load_id,PDO::PARAM_STR); 
$query_stmt_veh->execute();
$num_veh = $query_stmt_veh->rowCount();
    // if rateCon exists
    if($num>0 || $num_veh>0){
       echo json_encode(
        array(
            "status"=>400,
            "message" => "Load is already Assigned"
        )
    );
   }
    else{  
        $user->assign_load_update(); 
        $user->assign_pickup_update(); 
        $user->assign_drops_update();
        $user->assign_loadsAssigned_insert();
        $user->assign_vehiclesAssigned_insert();
        $user->assign_vehicle_update_truck();
        $user->assign_vehicle_update_trailer();
        $user->assign_vehicle_update_tractor();

            echo json_encode(
                array(
                    "status" => 200,
                    "message" => "Load Successfully assigned."
                )); 

    } 

}else{
    echo json_encode(
            array(
                "status" => 400,
                "message"=> "Load not Asigned."
            )); 
}
?> 