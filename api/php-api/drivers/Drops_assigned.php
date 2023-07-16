<?php

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../objects/listFunctions.php');



$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == "GET" || $requestMethod == "POST"){

$load_drops = getAllLoadDropsAssignedToDriver();
echo $load_drops;

}
else
{
        $data = [
                'status' => 400,
                'message' => 'Method not Allowed',
            ];
            header("HTTP/1.0 400 Method not Allowed");
            return json_encode($data);
}



?>
