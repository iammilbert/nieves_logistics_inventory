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

    $name = '';
    $tel = '';
    $email = '';
    $role = '';
    $password = '';
    $address = '';
    $licenseID = '';
    $accountNumber = '';
    $bankName = '';
    $accountName = '';


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

$user->name = $data->name;
$user->tel = $data->tel;
$user->email = $data->email;
$user->role = $data->role;
$user->password = $data->password;
$user->address = $data->address;
$user->licenseID = $data->licenseID;
$user->accountNumber = $data->accountNumber;
$user->bankName = $data->bankName;
$user->accountName = $data->accountName;


    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] = "POST"){

$name = $data->name;
$tel = $data->tel;
$email = $data->email;
$role = $data->role;
$password = $data->password;
$address = $data->address;
$licenseID = $data->licenseID;
$accountNumber = $data->accountNumber;
$bankName = $data->bankName;
$accountName = $data->accountName;



    if(!isset($data->name) 
    || !isset($data->tel)
    || !isset($data->email)
    || !isset($data->role)
    || !isset($data->password)
    || !isset($data->address)
    || !isset($data->licenseID)
    || !isset($data->accountNumber)
    || !isset($data->bankName)
    || !isset($data->accountName)
    || empty(trim($data->name))
    || empty(trim($data->tel))
    || empty(trim($data->email))
    || empty(trim($data->role))
    || empty(trim($data->password))
    || empty(trim($data->address))
    || empty(trim($data->licenseID))
    || empty(trim($data->accountNumber))
    || empty(trim($data->bankName))
    || empty(trim($data->accountName))

    ){

    $fields = ['fields' => ['name','tel', 'email', 'role', 'password','address', 'licenseID', 'accountNumber', 'bankName','accountName']];
    $returnData = ('Please Fill in all Required Fields!');
    echo json_encode(array($returnData, $fields));
  }
  else{
 
    $fetch_tel_by_number = "SELECT * FROM users WHERE tel =:tel";
     $query_stmt = $conn->prepare($fetch_tel_by_number); 
     $query_stmt->bindValue(':tel', $tel,PDO::PARAM_STR); 
     $query_stmt->execute();
     $num = $query_stmt->rowCount();

     $fetch_user_by_email = "SELECT * FROM users WHERE email =:email";
     $query_stmt_email = $conn->prepare($fetch_user_by_email); 
     $query_stmt_email->bindValue(':email', $email,PDO::PARAM_STR); 
     $query_stmt_email->execute();
     $num_email = $query_stmt_email->rowCount();

     $fetch_user_accountNumber = "SELECT * FROM users WHERE accountNumber =:accountNumber";
     $query_stmt_accountNumber = $conn->prepare($fetch_user_accountNumber); 
     $query_stmt_accountNumber->bindValue(':accountNumber', $accountNumber,PDO::PARAM_STR); 
     $query_stmt_accountNumber->execute();
     $num_accountNumber = $query_stmt_accountNumber->rowCount();

      $fetch_user_licenseID = "SELECT * FROM users WHERE licenseID =:licenseID";
     $query_stmt_licenseID = $conn->prepare($fetch_user_licenseID); 
     $query_stmt_licenseID->bindValue(':licenseID', $licenseID,PDO::PARAM_STR); 
     $query_stmt_licenseID->execute();
     $num_licenseID = $query_stmt_licenseID->rowCount();


    // if email exists
    if($num>0){
       echo json_encode(
          array(
            "status" => 400,
            "message" => "Phone number Already Exist"
        )); 
    }
    elseif($num_email>0){
       echo json_encode(
          array(
            "status" => 400,
            "message" => "Email Already Exist"
        )); 
    }

    elseif($num_accountNumber>0){
       echo json_encode(
        array(
        "status" => 400, 
        "message" => "Account Number already Exist"
    )); 
    }

     elseif($num_licenseID>0){
       echo json_encode(
        array(
        "status" => 400, 
        "message" => "license ID already Exist"
    )); 
    } 
   else{
    if($user->register_users()){
        echo json_encode(
            array(
                "status" => 200,
                "message" => "Registration Succesful."
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