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


//company Details
        $sql = "SELECT * FROM companyinfo"; 
        $query = $db->prepare($sql);  
    if($query->execute()){
      $row = $query->fetch(PDO::FETCH_ASSOC);
         $data = [ 
            'status' => 200,
            'message' => 'COMPANY DETAILS',
            'data' => array(
            'docs' => [
                'Comapny Name' => $row['name'],
                'Comapny Address' => $row['address'], 
                'Company PO BOX' => $row['poBox'],
                'Company State' => $row['state'], 
                 'City' => $row['city'] 
            ], 
            ),  
         ]; 
         echo json_encode($data);
     }else{
        echo json_encode(array( 
            'status' => 400,
            'message' => 'Company Details not Fetch Fetched'
            ));

     }




  //Load Assigned
        $sql2 = "SELECT * FROM loads_assigned
        WHERE loads_assigned.load_id =:loadID";  
        $query2 = $db->prepare($sql2); 
        $query2->bindValue(':loadID', $loadID,PDO::PARAM_STR); 
        $query2->execute();

 if($query2->rowCount()){
    $row = $query2->fetch(PDO::FETCH_ASSOC);

    $driver_id = $row['driver_id'];  
    $sql23 = "SELECT * FROM users
    WHERE users.id =:driver_id";  
    $query23 = $db->prepare($sql23); 
    $query23->bindValue(':driver_id', $driver_id,PDO::PARAM_STR); 
    $query23->execute();
    $row23 = $query23->fetch(PDO::FETCH_ASSOC); 
    
    
    $load_id = $row['load_id'];  
    $sql24 = "SELECT * FROM loads
    WHERE loads.id =:load_id";  
    $query24 = $db->prepare($sql24); 
    $query24->bindValue(':load_id', $load_id, PDO::PARAM_STR); 
    $query24->execute();
    $row24 = $query24->fetch(PDO::FETCH_ASSOC);
    
      $data = [
         'message' => 'LOAD ASSIGNED DETAILS',
         'data' => array(
            'docs' => [
         'Load ID' => $row24['id'],
         'Broker Name' => $row24['brokerName'],
         'Broker Email'=> $row24['brokerEmail'],
         'Broker Number'=> $row24["brokerNumber"],
         'Shipper Email' => $row24['shipperEmail'], 
         'Shipper Address' => $row24['shipperAddress'],
         'Driver Name' => $row23['name'],
         'Driver Email'=> $row23['email'],
         'Driver Number'=> $row23["tel"],
         'Shipper Email' => $row24['shipperEmail'], 
         'Shipper Address' => $row24['shipperAddress'],
         'Load Rate' =>"$"  .$row24['rate'], 
         'weight' => $row24['weight'],
          'Rate ConfirmationID' => $row24['rateConfirmationID'] 
            ],
            ),
        ];
        echo json_encode($data);

   }else{
      echo json_encode(array( 
          'status' => 400,
          'message' => 'Load Details not Fetch Fetched'
          ));
 
   }


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


    //Drops
    if($requestMethod == "GET"){
        $dropsList = getAlldrops();
        echo $dropsList;
        
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


    ?>
