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
 
// select the image 
$query = "select * from users WHERE id =:id"; 
$stmt = $db->prepare( $query );
 
// bind the id of the image you want to select
$stmt->bindValue(':id', $id,PDO::PARAM_STR); 
$stmt->execute();
 
// to verify if a record is found
$num = $stmt->rowCount();
 
if( $num ){
    // if found
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // specify header with content type,
    // you can do header("Content-type: image/jpg"); for jpg,
    // header("Content-type: image/gif"); for gif, etc.

    
    //display the image data
         echo json_encode(array( 
              'success' => 200,
              'message' => 'successfully Fetched',
              'name' => $row['name'], 
              'picture' => $row['picture'],  
              )); 
}else{
    echo json_encode(array( 
        'success' => 400,
        'message' => 'Error Occure',
        'id' => $id, 
        )); 
}
?>