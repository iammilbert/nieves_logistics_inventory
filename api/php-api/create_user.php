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


    $name = '';
    $tel = '';
    $role = '';
    $email = '';
    $password = '';
    $cpassword = '';
    $status = '';

    $conn = null;

    // files needed to connect to database
    include_once 'config/database.php';
    include_once 'objects/user.php';
    // get database connection
    $database = new Database();
    $conn = $database->getConnection();
    // instantiate user object
    $user = new User($conn);

    $data = json_decode(file_get_contents("php://input"), true);
    
    // IF REQUEST METHOD IS NOT POST
    if($data){

        $name = trim($data['name']);
        $email = trim($data['email']);
        $password = trim($data['password']);
        $cpassword = trim($data['cpassword']);
        $status = trim($data['status']);
        $role = trim($data['role']);
        $tel = trim($data['tel']);

        $sanitizedData = [
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'cpassword'=>$cpassword,
            'status'=>$status,
            'role'=>$role,
            'tel'=>$tel
        ];

        if(!empty($name) && !empty($email) && !empty($password) && !empty($tel)){


            $fetch_user_by_email = "SELECT * FROM users WHERE email =:email";
            $query_stmt = $conn->prepare($fetch_user_by_email); 
            $query_stmt->bindValue(':email', $email,PDO::PARAM_STR); 
            $query_stmt->execute();
            $num = $query_stmt->rowCount();

            $fetch_user_by_tel = "SELECT * FROM users WHERE tel =:tel";
            $query_stmt_tel = $conn->prepare($fetch_user_by_tel); 
            $query_stmt_tel->bindValue(':tel', $tel,PDO::PARAM_STR); 
            $query_stmt_tel->execute();
            $num_tel = $query_stmt_tel->rowCount();

            // if email exists
            if($num>0){
               echo json_encode(
                  array(
                    "status" => 400,
                    "message" => "Email Already exists"
                )); 
            }elseif($num_tel>0){
                echo json_encode(
                    array(
                        "status" => 400, 
                        "message" => "Phone number already exists"
                    )
                ); 
            }elseif($password != $cpassword){
                echo json_encode(array(
                "status" => 'error', 
                "data" => [],
                "message" => "Password does not match",
                "code" => 400, 
                )); 
            }else{
                if($user->create($sanitizedData)){
                    echo json_encode(
                        array(
                            "status" => "success",
                            "code" => 200,
                            "message" => "Registration Successful."
                        )
                    ); 
                }else{  
                    http_response_code(400); 
                    echo json_encode(array(
                        "status" => 'failed', 
                        "data" => [],
                        "message" => "Registration not Successful.",
                        "code" => 400, 
                    )); 
                }
            }

        }else{
            
            $fields = [
                'fields' => ['Name','Email', 'Password', 'Confirm Password', 'tel']
            ];

            $returnData = ['message' => 'Please Fill in all Required Fields!'];
            echo json_encode($returnData, $fields);

        } 

    }