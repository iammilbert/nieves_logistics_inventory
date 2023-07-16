<?php
    use \Firebase\JWT\JWT;
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    // required to encode json web token
    // include_once 'config/core.php';
    include_once 'libs/php-jwt-master/src/BeforeValidException.php';
    include_once 'libs/php-jwt-master/src/ExpiredException.php';
    include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
    include_once 'libs/php-jwt-master/src/JWT.php';

    // files needed to connect to database
    include_once 'config/database.php';
    include_once 'objects/user.php';
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    // instantiate user object
    $user = new User($db);

    // get posted data
    $data = json_decode(file_get_contents("php://input"), true);
    // get jwt
    $jwt = isset($data['jwt']) ? $data['jwt'] : "";


// if jwt is not empty
if($jwt){
    // if decode succeed, show user details
    try {
        // decode jwt
        $key = 'my-key';
        $decoded = JWT::decode($jwt, $key, array('HS256'));

        // set user property values
        $name = $data['name'];
        $tel = $data['tel'];
        $address = $data['address'];
        $email = $data['email'];
        $accountNumber = $data['accountNumber'];
        $bankName = $data['bankName'];
        $licenseID = $data['licenseID'];
        $id = $data['id'];

        $sanitizedData = [
            'name' => $name,
            'tel' => $tel,
            'address' => $address,
            'email' => $email,
            'accountNumber' => $accountNumber,
            'bankName' => $bankName,
            'licenseID' => $licenseID,
            'id' => $id
        ];

        // update the user record
        if($user->update($sanitizedData)){
            // we need to re-generate jwt because user details might be different
            $token = array(
               "iat" => $issued_at,
               // "exp" => $expiration_time,
               "iss" => $issuer,
               "data" => array(
                   "id" => $user->id,
                   "name" => $user->name,
                   "address" => $user->address,
                   "tel" => $user->tel,
                   "email" => $user->email
               )
            );
            $jwt = JWT::encode($token, $key);
            // set response code
            http_response_code(200);
            // response in json format
            echo json_encode(
                array(
                    "message" => "User was updated.",
                    "jwt" => $jwt
                )
            );
        }else{
            // set response code
            http_response_code(400);
            // show error message
            echo json_encode(array("message" => "Unable to update user."));
        }
    }catch (Exception $e){
        // if decode fails, it means jwt is invalid
        // set response code
        http_response_code(400);
        // show error message
        echo json_encode(array(
            "message" => "Invalid token. Access denied.",
            "error" => $e->getMessage()
        ));
    }
}

// show error message if jwt is empty
else{
    // set response code
    http_response_code(400);
    // tell the user access denied
    echo json_encode(array("message" => "Token not Valid"));
}
?>