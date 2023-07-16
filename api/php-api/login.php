<?php
use \Firebase\JWT\JWT;
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function msg($success, $status, $message, $extra = []) {
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ], $extra);
}

// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate user object
$user = new User($db);

// get posted data
$jsonData = file_get_contents('php://input');

// Decode the JSON data into an associative array
$requestData = json_decode($jsonData, true);

// Check if the 'data' key exists
if (isset($requestData['email'])) {
    // Retrieve email and password from the 'data' object
    $email = $requestData['email'];
    $password = $requestData['password'];
    $key = 'my-key';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $returnData = msg(0, 422, 'Invalid Email Address!');
        echo json_encode($returnData);
        return;
    }

    if (strlen($password) < 8) {
        $returnData = msg(0, 422, 'Your password must be at least 8 characters long!');
        echo json_encode($returnData);
        return;
    } else {
        // Check if email exists in the database
        $user->email = $email;
        $email_exists = $user->emailExists();

        if ($email_exists) {

            // Fetch user details from the database
            try {
                $fetch_user_by_email = "SELECT * FROM `users` WHERE `email`=:email";
                $query_stmt = $db->prepare($fetch_user_by_email);
                $query_stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $query_stmt->execute();

                // If the user is found by email
                if ($query_stmt->rowCount()) {
                    $row = $query_stmt->fetch(PDO::FETCH_ASSOC);

                    // $check_password = password_verify($password, );

                    if ($password == $row['password']) {
                        // Generate JWT
                        include_once 'config/core.php';
                        include_once 'libs/php-jwt-master/src/BeforeValidException.php';
                        include_once 'libs/php-jwt-master/src/ExpiredException.php';
                        include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
                        include_once 'libs/php-jwt-master/src/JWT.php';

                        $token = array(
                            "iat" => date('Y-m-d H:i:s'),//$issued_at,
                            // "exp" => $expiration_time,
                            "iss" => "Nieves",
                            "data" => array(
                                "id" => $row['id'],
                                "name" => $row['name'],
                                "email" => $row['email']
                            )
                        );
                        $jwt = JWT::encode($token, $key);

                        $response = array(
                            'success' => 200,
                            'message' => 'You have successfully logged in.',
                            'data' => array(
                                'token' => $jwt,
                            ),
                            'user-info' => array(
                                'id' => $row['id'],
                                'name' => $row['name'],
                                'email' => $row['email'],
                                'role' => $row['role'],
                                'image' => $row['picture'] ? $row['picture'] : 'https://nieveslogistics.com/api/php-api/picture/avatar.jpg',
                            )
                        );

                        echo json_encode($response);

                    } else {
                        echo json_encode(array(
                            "status" => 'error',
                            "message" => "Incorrect Password",
                            "code" => 400,
                        ));
                    }
                } else {
                    echo json_encode(array(
                        "status" => 'error',
                        "data" => [],
                        "message" => "Email does not exist.",
                        "code" => 400,
                    ));
                }
            } catch (PDOException $e) {
            $returnData = msg(0, 400, $e->getMessage());
            echo json_encode($returnData);
            }
        } else {
            $returnData = msg(0, 422, 'Account not found!');
            echo json_encode($returnData);
        }
    }
}else{
    echo 'Did not get data';
}

