<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// required to decode jwt
// include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
// retrieve gieve jwt here

// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/user.php';

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
        // decode jwt
         $fetch_user_by_id = "SELECT * FROM `users` WHERE `id`=:id"; 
         $query_stmt = $db->prepare($fetch_user_by_id); 
         $query_stmt->bindValue(':id', $id,PDO::PARAM_STR); 
         $query_stmt->execute();

    if($query_stmt->rowCount()){
      $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
        // set response code

         echo json_encode(array( 
              'success' => 200,
              'message' => 'successfully Fetched',
                'id' => $row['id'],
                'name' => $row['name'], 
              'email' => $row['email'], 
              'role' => $row['role'],
              'password' => $row['password'], 
              'tel' => $row['tel'],
               'accountNumber' => $row['accountNumber'], 
              'bankName' => $row['bankName'],
              'address' => $row['address'], 
              'picture' => $row['picture'], 
              'image' => $row['picture'] ? $row['picture'] : 'https://nieveslogistics.com/api/php-api/picture/avatar.jpg',
              )); 
     }

    }

    // if decode fails, it means jwt is invalid
catch (Exception $e){
    // set response code
    http_response_code(400);
    // tell the user access denied  & show error message
        echo json_encode(
            array(
                "error" => $e->getMessage(), 
                "data" => [],
                "message" => "Access denied.",
                "code" => 400,  
            )); 
}
}

// show error message if jwt is empty
else{
    // set response code
    http_response_code(400);
    // tell the user access denied
    echo json_encode(array(
        "error" => $e->getMessage(), 
        "data" => [],
        "message" => "Access denied.",
        "code" => 400,  
    ));
}
?>
