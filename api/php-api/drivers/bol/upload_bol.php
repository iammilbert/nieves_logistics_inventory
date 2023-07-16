<?php
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

// files needed to connect to the database
include_once '../../config/database.php';
// include_once '../../config/local_database.php';
include_once '../../objects/user.php';

// get the database connection
$database = new Database();
$db = $database->getConnection();
// echo $_POST['load_id'];

if(isset($_POST['load_id'])){

	$load_id = trim($_POST['load_id']);
	$driver_id = trim($_POST['driver_id']);

	$sql = "SELECT loads.id, loads.bolStatus, loads.bol, loads_assigned.driver_id  
        FROM loads 
        INNER JOIN loads_assigned ON loads_assigned.load_id = loads.id 
        WHERE loads.id = :load_id 
        AND loads_assigned.driver_id = :driver_id";

	$stmt = $db->prepare($sql);
	$stmt->bindParam(':load_id', $load_id);
	$stmt->bindParam(':driver_id', $driver_id);
	$stmt->execute();

	$query = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(count($query) > 0){

		foreach ($query as $row) {
			if($row['bol'] != null){
				$returnData = msg(0, 400, "Failed to upload BOL. BOL already exists!");
			    echo json_encode($returnData);
			    return;
			}
		}

		// check if image was selected
		if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
		    $image = $_FILES['image']['tmp_name'];

		    $local = "http://localhost/NIEVES_WORKSPACE/nieves/";
		    $live = "https://nieveslogistics.com/";

	        // Generate a unique filename
	        $filename = $load_id . '.jpg'; // You can use any desired file extension

	        // Specify the directory to save the image
	        $directory = '../bol_uploads/';

	        if (!is_dir($directory)) {
	            mkdir($directory);
	        }

            $file = $directory . $filename;
            move_uploaded_file($image, $file);
            $file_path = $live . 'api/php-api/drivers/bol_uploads/' . $filename;
            $sql = "UPDATE loads SET bol = '$file_path', bolStatus = '1' WHERE id = '$load_id' LIMIT 1";

            try {
                $db->query($sql);
                echo json_encode(
                    array(
                        "status" => 'success',
                        "data" => [
                            'bol' => $live . 'api/php-api/drivers/bol_uploads/' . $filename,
                        ],
                        "message" => "BOL uploaded successfully.",
                        "code" => 200,
                    )
                );
            } catch (PDOException $e) {
                $returnData = msg(0, 400, $e->getMessage());
                echo json_encode($returnData);
            }
	        

	    } else {
		    // Image upload failed
		    $returnData = msg(0, 400, "Failed to upload the image.");
		    echo json_encode($returnData);
		}
	}else{
		// Image upload failed
	    $returnData = msg(0, 400, "Invalid parameters supplied.");
	    echo json_encode($returnData);
	}

}else{
	// Image upload failed
	$returnData = msg(0, 400, "Invalid method.");
	echo json_encode($returnData);
}