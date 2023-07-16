<?php 

require '../config/dbcon.php';
	
function getLoadList(){ 
	global $conn;

	$query = "SELECT * FROM loads";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
			
		return json_encode(array(
			'status' => 'success',
			"message" => 'Loads List Fetch Successfully',
			"code" => 200,  
			'data' => array(
					'docs' =>$res 
			)
		));
	header("HTTP/1.0 200 ok");

		}else{

		return json_encode(array(
				'status' => 'success',
				"message" => "No Load Found.",
				"code" => 200,  
				'data' => array(
						'docs' => [] 
				)
		));
			header("HTTP/1.0 200 No Load Found");
		}
	}
	
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error', 
				"data" => [],
				"code" => 400,  
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data); 
		}
	}



	
function getLoadListDespatcher(){ 
	global $conn;

	$data = json_decode(file_get_contents("php://input")); 
	$Despatcher_id=isset($data->Despatcher_id) ? $data->Despatcher_id : "";

	$query = "SELECT loads.id, users.name AS registeredBy, loads.brokerName, loads.brokerNumber, loads.brokerEmail, loads.shipperEmail, loads.shipperAddress, loads.rate, loads.rateConfirmationID, loads.dateRegistered, loads.loadDescription, loads.totalPickups, loads.totalDrops, loads.driver_id, loads.subDispatcher, loads.status, loads.totalLoadPicked, loads.totalLoadDropped, loads.pickedupTime, loads.pickedup_Date, loads.dropped_Date, loads.droppedTime, loads.droppedBy, loads.totalLoadCancel, loads.layover, loads.layOverAmount, loads.netPay, loads.payrollStatus, loads.paymentStatus, loads.paidBy, loads.datePaid, loads.timePaid, loads.loadType, loads.weight, loads.bol, loads.bolStatus, loads.bol_comment, loads.date_uploaded, loads.time_uploaded FROM users
	INNER JOIN loads
	ON loads.registeredBy = users.id 
	WHERE loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadDropped < loads.totalDrops AND loads.registeredBy = '".$Despatcher_id."' || loads.totalDrops = 0 AND loads.registeredBy = '".$Despatcher_id."' || loads.totalPickups = 0 AND loads.registeredBy = '".$Despatcher_id."'";
	$query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
			
		return json_encode(array(
			'status' => 'success',
			"message" => 'Loads List Fetch Successfully',
			"code" => 200,  
			'data' => array(
					'docs' =>$res 
			)
		));
	header("HTTP/1.0 200 ok");

		}else{

		return json_encode(array(
				'status' => 'success',
				"message" => "No Load Found.",
				"code" => 200,  
				'data' => array(
						'docs' => [] 
				)
		));
			header("HTTP/1.0 200 No Load Found");
		}
	}
	
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error', 
				"data" => [],
				"code" => 400,  
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data); 
		}
	}



function getLoadDeliveredListDespatcher(){ 
	global $conn;

	$data = json_decode(file_get_contents("php://input")); 
	$Despatcher_id=isset($data->Despatcher_id) ? $data->Despatcher_id : "";

	$query = "SELECT loads_assigned.totalLoadPicked, loads_assigned.driver_id, loads.rateConfirmationID, loads_assigned.totalLoadDropped, loads.totalPickups, loads.id, loads.bolStatus, loads.bol, loads.paymentStatus, loads.payrollStatus, loads.totalDrops FROM loads 
	INNER JOIN loads_assigned
	ON loads_assigned.load_id = loads.id WHERE loads.totalPickups = loads_assigned.totalLoadPicked AND loads.registeredBy = '".$Despatcher_id."' AND loads.totalDrops = loads_assigned.totalLoadDropped AND loads.payrollStatus = 0 AND loads.pickedupTime != 0 AND loads.droppedTime != 0";
	
	$query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

			return json_encode(array(
				'status' => "success",
				'message' => 'Loads Delivered List Fetch Successfully',
				'data' => array(
					'docs' =>$res 
			)
			));
			header("HTTP/1.0 200 ok");


		}else{

			return json_encode(array(
				'status' => 'success',
				'message' => 'No Load Delivered!',
				"code" => 200,  
				'data' => array(
						'docs' => [] 
				)
			));
			header("HTTP/1.0 200 No Load Delivered");
		}
		
	}
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error',
				"status" => 'success', 
				"data" => [],
				"code" => 400,  
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}






function getLoadDeliveredList(){ 
	global $conn;

	$query = "SELECT loads_assigned.totalLoadPicked, loads_assigned.driver_id, loads.rateConfirmationID, loads_assigned.totalLoadDropped, loads.totalPickups, loads.id, loads.bolStatus, loads.bol, loads.paymentStatus, loads.payrollStatus, loads.totalDrops FROM loads 
	INNER JOIN loads_assigned
	ON loads_assigned.load_id = loads.id WHERE loads.totalPickups = loads_assigned.totalLoadPicked AND loads.totalDrops = loads_assigned.totalLoadDropped AND loads.payrollStatus = 0 AND loads.pickedupTime != 0 AND loads.droppedTime != 0"; 
	
	$query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

			return json_encode(array(
				'status' => "success",
				'message' => 'Loads Delivered List Fetch Successfully',
				'data' => array(
					'docs' =>$res 
			)
			));
			header("HTTP/1.0 200 ok");


		}else{

			return json_encode(array(
				'status' => 'success',
				'message' => 'No Load Delivered!',
				"code" => 200,  
				'data' => array(
						'docs' => [] 
				)
			));
			header("HTTP/1.0 200 No Load Delivered");
		}
		
	}
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error',
				"status" => 'success', 
				"data" => [],
				"code" => 400,  
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
function getUsersList(){
       
	global $conn;

	$query = "SELECT * FROM users ";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

			return json_encode(array(
				'status' => "success",
				'message' => 'Users List Fetch Successfully',
				'data' => array(
					'docs' => array_map('addAvatarPath',$res) 
				)
			));
			header("HTTP/1.0 200 ok");



		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No User Found',
				"code" => 200,  
				'data' => array(
					'docs' => [] 
				)
			));
			header("HTTP/1.0 200 No User Found");
		}
		
	}
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error',
				"status" => 'success', 
				"data" => [],
				"code" => 400,  
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getdriversList(){
       

	global $conn;
	$driver = "Driver";

	$query = "SELECT * FROM users  WHERE users.role = '".$driver."' ";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

			return json_encode(array(
				'status' => "success",
				'message' => 'Drivers List Fetch Successfully',
				'data' => array(
					'docs' => array_map('addAvatarPath',$res) 
				)
			));
			header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Driver Found',
				"code" => 200,  
				'data' => array(
						'docs' => [] 
				)
			));
			header("HTTP/1.0 200 No Driver Found");
		}
		
	}
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,  
			];
		header("HTTP/1.0 400 Internal Server Error");
		return json_encode($data);
	}


}


function getdriversList_email_name_ID(){   

	global $conn;
	$driver = "Driver";

	$query = "SELECT name, email, id, picture FROM users  WHERE users.role = '".$driver."' ";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);


			return json_encode(array(
				'status' => "success",
				'message' => 'Drivers List Fetch Successfully',
				'data' => array(
					'docs' => array_map('addAvatarPath',$res) 
			) 
		)); 
			header("HTTP/1.0 200 ok");
			


		}else{
		return json_encode(array(
				'status' => 'success',
				'message' => 'No Driver Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)	
		));
			header("HTTP/1.0 200 No Driver Found"); 
		}
		
	}
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,  
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}



function getVehiclesList(){
	global $conn;

	$query = "SELECT * FROM vehicles";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);


			return json_encode(array(
			'status' => "success",
			'message' => 'vehicles List Fetch Successfully',
			'data' => array(
					'docs' => $res 
			) 
						));
			header("HTTP/1.0 200 ok");
			


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No vehicle Found',
				"code" => 200,
				'data' => array(
					'docs' =>[] 
				)
			));
			header("HTTP/1.0 200 No vehicle Found");
		}
		
	}
	else
	{
		$data = [
				'status' => 'error',
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getAdminList(){
	global $conn;
	$Admin = "Admin";

	$query = "SELECT * FROM users WHERE users.role = '".$Admin."' ";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

					return json_encode(array(
				'status' => "success",
				'message' => 'Addmin List Fetch Successfully',
				'data' => array(
					'docs' => array_map('addAvatarPath',$res) 
			) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'error',
				'message' => 'No Admin Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				),
				
			));
			header("HTTP/1.0 200 No Admin Found");
			
		}
		
	}
	else
	{
		$data = [
			'status' => 'error',
			'message' => 'Internal Server Error',
			"data" => [],
			"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}



function getStaffList(){
	global $conn;
	$Admin = "Admin";

	$query = "SELECT * FROM users WHERE users.role = 'Staff' OR users.role = 'Despatcher' OR users.role = 'Accountant'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

					return json_encode(array(
						'status' => "success",
						'message' => 'Staff List Fetch Successfully',
						'data' => array(
							'docs' => array_map('addAvatarPath',$res) 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{

			return json_encode(array(
				'status' => 'success',
				'message' => 'No Staff Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Staff Found");
		}
		
	}
	else
	{
		$data = [
			"data" => [],
			"message"=> 'Internal Server Error',
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}




function getActiveDriversList(){
    
	global $conn;

	  $query = "SELECT users.id, users.name, users.tel, loads.rateConfirmationID, users.licenseID, loads.totalLoadDropped, loads.totalLoadPicked, loads.pickedup_Date, loads.pickedupTime, loads.totalPickups, loads.totalDrops, loads.status, loads.id AS load_id, users.email FROM loads 
                  INNER JOIN users
                  ON loads.driver_id = users.id 
                  WHERE loads.totalLoadPicked > 0 AND loads.totalDrops > loads.totalLoadDropped";;
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

					return json_encode(array(
						'status' => "success",
						'message' => 'Active Drivers List Fetch Successfully',
						'data' => array(
							'docs' => $res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{

			return json_encode(array(
				'status' => 'success',
				"message"=> ' No Active Driver Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Active Driver Found");
		}
		
	}
	else
	{
		$data = [
			"data" => [],
			"message"=> 'Internal Server Error',
			"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}

// Function to add avatar path to each user collection
function addAvatarPath($item) {
    
    $avatarPath = 'https://nieveslogistics.com/api/php-api/picture/avatar.jpg';
    
    // Add the picture path to the item
    $item['avatar'] = $avatarPath;

    return $item;
}


function getNonActiveDriversList(){
    
	global $conn;
	$driver = "Driver";

	$query = "SELECT * FROM loads WHERE loads.status < 2 || loads.status > 2";
	$query_run = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($query_run);

	$query1 = "SELECT * FROM users WHERE role = '".$driver."' AND users.id = '".$row["driver_id"]."' || role = '".$driver."' AND users.id != '".$row["driver_id"]."'";
	$query_run1 = mysqli_query($conn, $query1);

	if ($query_run1) {
			$res = mysqli_fetch_all($query_run1, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Non Active Drivers List Fetch Successfully',
						'data' => array(
							'docs' => array_map('addAvatarPath',$res) 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				"message"=> ' All Drivers Are Currently Active or not  registered',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 All Drivers Are Currently Active or not  registered");
		}

}




function getActiveVehiclesDespatcher(){
    
	global $conn;
	
	$data = json_decode(file_get_contents("php://input")); 
	$Despatcher_id=isset($data->Despatcher_id) ? $data->Despatcher_id : "";

	$sql = "SELECT loads.totalPickups, loads.totalDrops, loads.rateConfirmationID, loads.totalLoadPicked, loads.totalLoadDropped, vehicles_assigned.load_id, vehicles_assigned.truck, vehicles_assigned.status, vehicles_assigned.trailer, vehicles_assigned.tractor, vehicles_assigned.load_id, loads.rateConfirmationID, users.name FROM vehicles_assigned 
	   INNER JOIN loads
	   ON vehicles_assigned.load_id = loads.id 
	   INNER JOIN users 
	   ON vehicles_assigned.driver_id = users.id 
   WHERE loads.totalLoadDropped < loads.totalDrops AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups AND loads.registeredBy = '".$iDespatcher_idd."' || loads.totalPickups > loads.totalLoadPicked AND loads.totalDrops > loads.totalLoadDropped AND loads.registeredBy = '".$Despatcher_id."'";
   $query_run = mysqli_query($conn, $sql) or die(mysqli_error($conn));


	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Active vehicles List Fetch Successfully',
						'data' => array( 
							'docs' => $res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				"message"=> 'No Active vehicle Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Active vehicle Found");
		}
		
	}
	else
	{
		$data = [
			"data" => [],
			"message"=> ' Internal Server Error',
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}







function getActiveVehicles(){
    
	global $conn;

	    $date = date("d-m-Y");
        $query = "SELECT vehicles.vin, vehicles.plateNumber, vehicles.status, vehicles.number, vehicles.vehicleType, vehicles.id FROM vehicles WHERE vehicles.status = 2";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Active vehicles List Fetch Successfully',
						'data' => array( 
							'docs' => $res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				"message"=> 'No Active vehicle Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Active vehicle Found");
		}
		
	}
	else
	{
		$data = [
			"data" => [],
			"message"=> ' Internal Server Error',
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getNonActiveVehicles(){
    
	global $conn;

	    $date = date("d-m-Y");
        $query = "SELECT * FROM vehicles WHERE vehicles.status = 1 || vehicles.status = 0 || vehicles.status > 2";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
			return json_encode(array(
				'status' => "success",
				'message' => 'None Active vehicles List Fetch Successfully',
				'data' => array(
					'docs' => $res 
			) 
			)); 
			header("HTTP/1.0 200 ok");

		}else{

			return json_encode(array(
				'status' => 'success',
				'message' => 'All Vehicles are curently active or not registered',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 All Vehicles are curently active or not registered'");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				'status' => 'error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}





function getAllpickups(){
    
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$loadID=isset($data->loadID) ? $data->loadID : "";

	$query = "SELECT * FROM pickups WHERE pickups.load_id = '".$loadID."' ";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'LOAD PICKUPS',
						'data' => array( 
							'docs' => $res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{

			return json_encode(array(
				'status' => 'success',
				'message' => 'No pickup Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No pickup Found");

		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}



function getAlldrops(){
    
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$loadID=isset($data->loadID) ? $data->loadID : "";

	$query = "SELECT * FROM drops WHERE drops.load_id = '".$loadID."' ";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'LOAD DROPS',
						'data' => array( 
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Drop Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Drop Found");

		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getAllPickupsAssigned(){
    
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$loadID=isset($data->loadID) ? $data->loadID : "";

   $query = "SELECT loads.rateConfirmationID, pickups.id, pickups.pickedStatus, loads.loadDescription, loads.dateRegistered, pickups.load_id, pickups.name AS pickupName FROM pickups 
   INNER JOIN loads  
   ON pickups.load_id = loads.id 
   WHERE pickups.load_id = '".$loadID."' ORDER BY loads.dateRegistered DESC";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

					return json_encode(array(
						'status' => "success",
						'message' => 'Pickups Assigned Fetch Successfully',
						'data' => array( 
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Pickups Assigned ',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Pickups Assigned ");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}




function getAllPickupsAssignedDriver(){
    
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$loadID=isset($data->loadID) ? $data->loadID : "";
	$Driver_id=isset($data->Driver_id) ? $data->Driver_id : "";

   $query = "SELECT loads.rateConfirmationID, pickups.id, pickups.pickedStatus, loads.loadDescription, loads.dateRegistered, pickups.load_id, pickups.name, pickups.state, pickups.city, pickups.date, pickups.time, pickups.address AS pickupName FROM pickups 
   INNER JOIN loads  
   ON pickups.load_id = loads.id 
   WHERE pickups.load_id = '".$loadID."' AND loads.driver_id = '".$Driver_id."' ORDER BY loads.dateRegistered DESC";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

					return json_encode(array(
						'status' => "success",
						'message' => 'Pickups Assigned Fetch Successfully',
						'data' => array( 
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Pickups Assigned ',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Pickups Assigned ");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}



function getAllLoadsAssigned(){
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$loadID=isset($data->loadID) ? $data->loadID : "";

	 $query = "SELECT loads_assigned.driver_id, loads.brokerName, loads_assigned.id, loads_assigned.load_id, loads.brokerNumber, loads.shipperAddress, loads.totalPickups, loads.totalDrops, loads.totalLoadPicked, loads.totalLoadDropped, loads_assigned.id AS loadAssignedID, loads.rateConfirmationID, users.name, loads_assigned.status, users.licenseID, loads.rate FROM loads 
	 INNER JOIN users 
	 ON loads.driver_id = users.id 
	 INNER JOIN loads_assigned 
	 ON loads_assigned.load_id = loads.id WHERE loads.totalLoadDropped < loads.totalDrops || loads.totalLoadPicked < loads.totalPickups || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups || loads.totalPickups > loads.totalLoadPicked AND loads.totalDrops > loads.totalLoadDropped";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Assigned Loads Fetch Successfully',
						'data' => array(
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => '200 No Load Assigned',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Load Assigned");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				'status' => 'error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}



function getAllLoadsAssignedDespatcher(){
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$Despatcher_id=isset($data->Despatcher_id) ? $data->Despatcher_id : "";

	 $query = "SELECT loads_assigned.driver_id, loads.brokerName, loads_assigned.id, loads_assigned.load_id, loads.brokerNumber, loads.shipperAddress, loads.totalPickups, loads.totalDrops, loads.totalLoadPicked, loads.totalLoadDropped, loads_assigned.id AS loadAssignedID, loads.rateConfirmationID, users.name, loads_assigned.status, users.licenseID, loads.rate FROM loads 
	 INNER JOIN users 
	 ON loads.driver_id = users.id 
	 INNER JOIN loads_assigned 
	 ON loads_assigned.load_id = loads.id WHERE loads.totalLoadDropped < loads.totalDrops AND loads.registeredBy = '".$Despatcher_id."'  || loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups AND loads.registeredBy = '".$Despatcher_id."' || loads.totalPickups > loads.totalLoadPicked AND loads.totalDrops > loads.totalLoadDropped AND loads.registeredBy = '".$Despatcher_id."'";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Assigned Loads Fetch Successfully',
						'data' => array(
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Load Assigned',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Load Assigned");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				'status' => 'error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getAllLoadsAssignedDriver(){
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$Driver_id=isset($data->Driver_id) ? $data->Driver_id : "";

	 $query = "SELECT loads_assigned.driver_id, loads.brokerName, loads_assigned.id, loads_assigned.load_id, loads.brokerNumber, loads.shipperAddress, loads.totalPickups, loads.totalDrops, loads.totalLoadPicked, loads.totalLoadDropped, loads_assigned.id AS loadAssignedID, loads.rateConfirmationID, users.name, loads_assigned.status, users.licenseID, loads.rate FROM loads 
	 INNER JOIN users 
	 ON loads.driver_id = users.id 
	 INNER JOIN loads_assigned 
	 ON loads_assigned.load_id = loads.id WHERE loads.totalLoadDropped < loads.totalDrops AND loads_assigned.driver_id = '".$Driver_id."'  || loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$Driver_id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$Driver_id."' || loads.totalLoadDropped = loads.totalDrops AND loads.totalLoadPicked < loads.totalPickups AND loads_assigned.driver_id = '".$Driver_id."' || loads.totalLoadDropped < loads.totalDrops AND loads.totalLoadPicked = loads.totalPickups AND loads_assigned.driver_id = '".$Driver_id."'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Assigned Loads Fetch Successfully',
						'data' => array(
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Load Assigned',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Load Assigned");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				'status' => 'error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}

function getAllLoadCancelledByDriver(){
		global $conn; 
		$data = json_decode(file_get_contents("php://input")); 
		$Driver_id=isset($data->Driver_id) ? $data->Driver_id : "";
	
		$sql = "SELECT * FROM loads WHERE loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops = loads.totalLoadDropped AND loads.driver_id = '".$Driver_id."' AND loads.pickedupTime = 0 AND loads.droppedTime = 0 AND loads.totalLoadPicked != 0";
		$query_run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		if ($query_run) {
	
			if(mysqli_num_rows($query_run) > 0){
				$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
						return json_encode(array(
							'status' => "success",
							'message' => 'Cancelled Loads Fetch Successfully',
							'data' => array(
								'docs' =>$res 
								) 
						)); 
						header("HTTP/1.0 200 ok");
	
	
			}else{
				return json_encode(array(
					'status' => 'success',
					'message' => 'No Load Cancelled',
					"code" => 200,
					"data" => array(
						'docs'=>[]
					)
				));
				header("HTTP/1.0 200 No Load Cancelled");
			}
			
		}
		else
		{
			$data = [
					'message' => 'Internal Server Error',
					'status' => 'error',
					"data" => [],
					"code" => 400,
				];
				header("HTTP/1.0 400 Internal Server Error");
				return json_encode($data);
		}
	
	
	}



	function getAllLoadDeliveredByDriver(){
		global $conn; 
		$data = json_decode(file_get_contents("php://input")); 
		$Driver_id=isset($data->Driver_id) ? $data->Driver_id : "";
	
		$sql = "SELECT * FROM loads WHERE loads.totalPickups = loads.totalLoadPicked AND loads.totalDrops = loads.totalLoadDropped AND loads.paymentStatus =0 AND loads.pickedupTime != 0 AND loads.droppedTime != 0  AND loads.driver_id = '".$Driver_id."' ";
		$query_run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		if ($query_run) {
	
			if(mysqli_num_rows($query_run) > 0){
				$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
						return json_encode(array(
							'status' => "success",
							'message' => 'Loads Delivered Fetch Successfully',
							'data' => array(
								'docs' =>$res 
								) 
						)); 
						header("HTTP/1.0 200 ok");
	
	
			}else{
				return json_encode(array(
					'status' => 'success',
					'message' => 'No Load Delivered',
					"code" => 200,
					"data" => array(
						'docs'=>[]
					)
				));
				header("HTTP/1.0 200 No Load Delivered");
			}
			
		}
		else
		{
			$data = [
					'message' => 'Internal Server Error',
					'status' => 'error',
					"data" => [],
					"code" => 400,
				];
				header("HTTP/1.0 400 Internal Server Error");
				return json_encode($data);
		}
	
	
	}



function getAllLoadDropsAssignedToDriver(){
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$Driver_id=isset($data->Driver_id) ? $data->Driver_id : "";
	$load_id=isset($data->load_id) ? $data->load_id : "";

	$sql = "SELECT loads.rateConfirmationID, drops.id, drops.status, loads.loadDescription, loads.dateRegistered, drops.load_id, drops.name, drops.state, drops.city, drops.date, drops.time, drops.address FROM drops
	INNER JOIN loads
	ON drops.load_id = loads.id
	WHERE drops.driver_id = '".$Driver_id."' AND drops.load_id = '".$load_id."'";
	$query_run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Loads(Drops) Fetch Successfully',
						'data' => array(
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Drops registered',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Drops registered");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				'status' => 'error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}






function getAlldropsAssigned(){
    
	global $conn; 
	$data = json_decode(file_get_contents("php://input")); 
	$loadID=isset($data->loadID) ? $data->loadID : "";

   $query = "SELECT loads.rateConfirmationID, drops.id, drops.status, loads.loadDescription, loads.dateRegistered, drops.load_id, drops.name FROM drops 
   INNER JOIN loads 
   ON drops.load_id = loads.id 
   WHERE drops.load_id = '".$loadID."' ORDER BY loads.dateRegistered DESC";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Drops Assigned Fetch Successfully',
						'data' => array(
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Drops Assigned ',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Drops Assigned ");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				'status' => 'error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}




function getTruckList(){
	global $conn;
	$truck = "Truck";

	$query = "SELECT * FROM vehicles WHERE vehicleType = '".$truck."'";
	$query_run = mysqli_query($conn, $query);
	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

					return json_encode(array(
						'status' => "success",
						'message' => 'Trucks List Fetch Successfully',
						'data' => array( 
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Truck Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Truck Found");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getTrailerList(){
	global $conn;
	$trailer = "Trailer";

	$query = "SELECT * FROM vehicles WHERE vehicleType = '".$trailer."'";
	$query_run = mysqli_query($conn, $query);
	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Trailer List Fetch Successfully',
						'data' => array( 
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Trailer Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Trailer Found");

		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getTractorList(){
	global $conn;
	$tractor = "Tractor";

	$query = "SELECT * FROM vehicles WHERE vehicleType = '".$tractor."'";
	$query_run = mysqli_query($conn, $query);
	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
			return json_encode(array(
				'status' => 'success',
				'message' => 'Tractors List Fetch Successfully',
				"code" => 200,
				"data" => array(
					'docs'=>$res
				)
			));
		header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Tractor Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Tractor Found");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}



function getDispatcherList(){
	global $conn;
	$Despatcher = "Despatcher";

	$query = "SELECT * FROM users WHERE users.role = '".$Despatcher."'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'Dispatchers List Fetch Successfully',
						'data' => array( 
							'docs' => array_map('addAvatarPath',$res) 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No Dispatcher Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No Dispatcher Found");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}


function getNewUsersList(){
	global $conn;
	$User = "Staff";

	$query = "SELECT * FROM users WHERE users.role = '".$User."'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		if(mysqli_num_rows($query_run) > 0){
			$res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'NEW Users List Fetch Successfully',
						'data' => array( 
							'docs' => array_map('addAvatarPath',$res) 
							) 
					)); 
					header("HTTP/1.0 200 ok");


		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No NEW User Found',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No NEW User Found");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}


}



function driversDueForPayment(){
	global $conn;

	$sql = "SELECT distinct loads.driver_id, users.name, users.id from loads 
	INNER JOIN users 
	ON loads.driver_id = users.id WHERE loads.payrollStatus = 1 AND loads.paymentStatus = 0 AND loads.status = 3 order by driver_id"; 
	$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($query) {

		if(mysqli_num_rows($query) > 0){
			$res = mysqli_fetch_all($query, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'LIST OF DRIVERS DUE FOR PAYMENT',
						'data' => array( 
							'docs' =>$res 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No DRIVERS IS CURRENTLY DUE FOR PAYMENT',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No DRIVERS IS CURRENTLY DUE FOR PAYMENT");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}

}



function staffDueForPayment(){
	global $conn;
	$months = date("Y-M"); 
	$month = strtotime($months);

	$sql="SELECT * FROM users WHERE users.role = 'Staff' AND users.lastPaymentMonth != '".$month."' || users.role = 'Despatcher' AND users.lastPaymentMonth != '".$month."' || users.role = 'Accountant' AND users.lastPaymentMonth != '".$month."' || users.role = 'Admin' AND users.lastPaymentMonth != '".$month."'";
	$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($query) {
		if(mysqli_num_rows($query) > 0){
			$res = mysqli_fetch_all($query, MYSQLI_ASSOC);
					return json_encode(array(
						'status' => "success",
						'message' => 'LIST OF STAFF DUE FOR PAYMENT',
						'data' => array( 
							'docs' => array_map('addAvatarPath',$res) 
							) 
					)); 
					header("HTTP/1.0 200 ok");

		}else{
			return json_encode(array(
				'status' => 'success',
				'message' => 'No STAFF IS CURRENTLY DUE FOR PAYMENT',
				"code" => 200,
				"data" => array(
					'docs'=>[]
				)
			));
			header("HTTP/1.0 200 No STAFF IS CURRENTLY DUE FOR PAYMENT");
		}
		
	}
	else
	{
		$data = [
				'message' => 'Internal Server Error',
				"data" => [],
				"code" => 400,
			];
			header("HTTP/1.0 400 Internal Server Error");
			return json_encode($data);
	}

}



function driversWeeklyPayroll(){
		global $conn;

		$data = json_decode(file_get_contents("php://input")); 
		$id=isset($data->id) ? $data->id : "";
		$startDate=isset($data->startDate) ? $data->startDate : "";
		$endDate=isset($data->endDate) ? $data->endDate : "";

		$sql = "SELECT drivers_pay_roll.load_id, drivers_pay_roll.driver_id, drivers_pay_roll.netPay, loads.rateConfirmationID, loads.id, loads.paymentStatus, loads.layover, loads.payrollStatus, users.id AS usersID, users.name FROM loads 
		INNER JOIN drivers_pay_roll
		ON drivers_pay_roll.load_id = loads.id 
		INNER JOIN users 
		ON drivers_pay_roll.driver_id = users.id WHERE loads.paymentStatus = 0 AND loads.driver_id = '".$id."' AND loads.dropped_Date  BETWEEN '".$startDate."' AND '".$endDate."'";
		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	
		if ($query) {
	
			if(mysqli_num_rows($query) > 0){
				$res = mysqli_fetch_all($query, MYSQLI_ASSOC);
						return json_encode(array(
							'status' => "success",
							'message' => 'LIST OF DRIVERS WEEKLY PAY ROLL',
							'data' => array( 
								'docs' =>$res 
								) 
						)); 
						header("HTTP/1.0 200 ok");
	
			}else{
				return json_encode(array(
					'status' => 'success',
					'message' => 'No Loads Deliver yet or no Pay roll Prepaid yet',
					"code" => 200,
					"data" => array(
						'docs'=>[]
					)
				));
				header("HTTP/1.0 200 No Loads Deliver yet or no Pay roll Prepaid yet ");
			}
			
		}
		else
		{
			$data = [
					'message' => 'Internal Server Error',
					"data" => [],
					"code" => 400,
				];
				header("HTTP/1.0 400 Internal Server Error");
				return json_encode($data);
		}

	}
?>


