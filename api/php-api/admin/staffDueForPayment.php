<?php

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../objects/listFunctions.php');


$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == "GET"){

$staffDue = staffDueForPayment();
echo $staffDue;

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
