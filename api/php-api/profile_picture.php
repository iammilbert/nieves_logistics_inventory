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
include_once 'config/database.php';
// include_once 'config/local_database.php';
include_once 'objects/user.php';

// get the database connection
$database = new Database();
$db = $database->getConnection();

// instantiate the user object
$user = new User($db);

// check email existence here

// get posted data
$email = $_POST['email'];

// check if image was uploaded successfully
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image']['tmp_name'];

    $local = "http://localhost/NIEVES_WORKSPACE/nieves/";
    $live = "https://nieveslogistics.com/";

    if (!empty($email)) {
        $email = trim($email);

        // Generate a unique filename
        $filename = uniqid() . '.jpg'; // You can use any desired file extension

        // Specify the directory to save the image
        $directory = '../picture/';

        if (!is_dir($directory)) {
            mkdir($directory);
        }

        $sql = "SELECT id FROM users WHERE email = :email";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
            $data = $stmt->fetchAll();

            if (count($data) > 0) {
                // User exists for the provided email
                // Move the uploaded image to the specified directory
                $file = $directory . $filename;
                move_uploaded_file($image, $file);
                $file_path = $live . 'api/picture/' . $filename;
                $sql = "UPDATE users SET picture = '$file_path' WHERE email = '$email' LIMIT 1";

                try {
                    $db->query($sql);
                    echo json_encode(
                        array(
                            "status" => 'success',
                            "data" => [
                                'image' => $live . 'api/picture/' . $filename,
                            ],
                            "message" => "Image uploaded successfully.",
                            "code" => 200,
                        )
                    );
                } catch (PDOException $e) {
                    $returnData = msg(0, 400, $e->getMessage());
                    echo json_encode($returnData);
                }
            }
        }
    }
} else {
    // Image upload failed
    $returnData = msg(0, 400, "Failed to upload the image.");
    echo json_encode($returnData);
}