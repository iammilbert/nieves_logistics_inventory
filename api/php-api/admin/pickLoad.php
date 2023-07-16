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


$load_id = "";
$pickID = "";
$pickedupTime = "";
$pickedup_Date = "";
$pickedStatus ="";
$one = "";
$comment = ""; 
$status = "";
$truck = "";
$trailer = ""; 
$tractor = "";


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
$user->pickID = $data->pickID;
$user->pickedupTime = $data->pickedupTime;
$user->pickedup_Date = $data->pickedup_Date;
$user->pickedStatus = $data->pickedStatus;
$user->totalLoadPicked = $data->totalLoadPicked; 
$user->comment = $data->comment; 
$user->status = $data->status;
$user->truck = $data->truck; 
$user->trailer = $data->trailer; 
$user->tractor = $data->tractor;

    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

    $load_id = $data->load_id;
    $pickID = $data->pickID;
    $pickedupTime = $data->pickedupTime;
    $pickedup_Date = $data->pickedup_Date;
    $pickedStatus = $data->pickedStatus;
    $totalLoadPicked = $data->totalLoadPicked; 
    $comment = $data->comment; 
    $status = $data->status;
    $truck = $data->truck; 
    $trailer = $data->trailer; 
    $tractor = $data->tractor;


    $fetch_user_by_id = "SELECT * FROM `pickups` WHERE `id`=:pickID"; 
    $query_stmt = $conn->prepare($fetch_user_by_id); 
    $query_stmt->bindValue(':pickID', $pickID,PDO::PARAM_STR); 
    $query_stmt->execute();
    $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
    // $query_stmt->rowCount();

    if($query_stmt->rowCount()){
        $user->pick_load_pickups_update();
        $user->load_deliver_update_vehicles_tractor();
        $user->load_deliver_update_vehicles_trailer();
        $user->load_deliver_update_vehicles_truck();

        $query2 = "UPDATE loads 
        SET 
            status =:status, 
            totalLoadPicked = totalLoadPicked + 1,  
            pickedup_Date=:pickedup_Date, 
            pickedupTime =:pickedupTime 
            WHERE id =:load_id";
    
        // prepare the query
        $query_stmt2= $conn->prepare($query2);
        $query_stmt2->bindValue(':status', $status,PDO::PARAM_STR);           
        $query_stmt2->bindValue(':pickedup_Date', $pickedup_Date,PDO::PARAM_STR);   
        $query_stmt2->bindValue(':pickedupTime', $pickedupTime,PDO::PARAM_STR);  
        $query_stmt2->bindValue(':load_id', $load_id,PDO::PARAM_STR);   
        // execute the query 


        $query_1 = "UPDATE loads_assigned 
        SET 
            status =:status, 
            totalLoadPicked = totalLoadPicked + 1,  
            pickedup_Date=:pickedup_Date, 
            pickedupTime =:pickedupTime 
            WHERE load_id =:load_id";
    
        // prepare the query
        $query_stmt11= $conn->prepare($query_1);         
        $query_stmt11->bindValue(':pickedup_Date', $pickedup_Date, PDO::PARAM_STR);   
        $query_stmt11->bindValue(':pickedupTime', $pickedupTime, PDO::PARAM_STR);   
        $query_stmt11->bindValue(':status', $status, PDO::PARAM_STR);  
        $query_stmt11->bindValue(':load_id', $load_id, PDO::PARAM_STR);   
            // execute the query 
        $query_stmt11->execute();

        if($query_stmt2->execute()){

            echo json_encode(array(
                "Status"=>200,
                "message"=> "Load Picked, safe Trip."
            ));
    
        }else{
            echo json_encode(array(
                "Status"=>400,
                "message"=> "Load not Picked."
            ));
    }
    
    }else{

        echo json_encode(array(
            "Status"=>200,
            "message"=> "Pickup Id not Found."
        ));
    }


   
  
  
  



        

}

?> 