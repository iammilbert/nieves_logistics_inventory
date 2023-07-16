<?php
// 'user' object
class User{
	// database connection and table name
	private $conn;
	private $table_name = "users";
	private $table_load = "loads";
	private $table_pickups = "pickups";
	private $table_drops = "drops";
	private $table_assign = "loads_assigned";
	private $table_vehicles_assigned = "vehicles_assigned";
	private $table_vehicle = "vehicles";
	private $table_companyInfo = "companyinfo";

	// object properties
	public $id;
	public $dropID;
	public $name;
	public $totalPickups;
	public $tel;
	public $role;
	public $email;
	public $number;
	public $password;
	public $cpassword;
	public $accountNumber;
	public $accountName;
	public $bankName;
	public $licenseID;
	public $address;
	public $status;
	public $fileName;
	public $pickID;
	public $total; 

	public $ceo;  
	public $mobile;  
	public $country;
	public $state;
	public $city;
	public $poBox;
	public $zipCode;
	public $email2;
	public $website;

	public $vehicleType;
	public $truck;
	public $trailer;
	public $tractor;
	public $vin;
	public $plateNumber;
//loads
	public $brokerName;
	public $brokerNumber;
	public $brokerEmail;
	public $shipperEmail;
	public $shipperAddress;
	public $loadDescription;
	public $rate;
	public $rateConfirmationID;
	public $dateRegistered;
	public $weight;
	public $registeredBy;
	public $driver_id;
	public $load_id;
	public $subDispatcher;

	public $layover;
	public $dropped_Date;
	public $layOverAmount;

	public $droppedTime;
	public $expenses_Type;
	public $amount_Spent;
	public $expenses_Description;
	public $droppedBy;
	public $comment;

//pickups
	public $date;
	public $time;
	public $stateZipCode;
	public $date_assigned;
    public $assignedBy; 

    public $pickedup_Date;
	public $pickedupTime;
	public $pickedStatus;
	public $totalLoadPicked;
	public $totalLoadDropped;

	// constructor
	public function __construct($db){
		$this->conn = $db;
	}
	// create new user record
	public function create($data){
	// insert query
	$query = "INSERT INTO " . $this->table_name . "
            (name, tel, role, email, status, password)
            VALUES
            (:name, :tel, :role, :email, :status, :password)";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->name = $data['name'];
	$this->tel = $data['tel'];
	$this->role = $data['role'];
	$this->email = $data['email'];
	$this->password = $data['password'];
	$this->status = $data['status'];

	// bind the values
	$stmt->bindParam(':name', $this->name);
	$stmt->bindParam(':tel', $this->tel);
	$stmt->bindParam(':role', $this->role);
	$stmt->bindParam(':email', $this->email);
	$stmt->bindParam(':status', $this->status);

	// hash the password before saving to database 
	$stmt->bindParam(':password', $this->password);
	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}

// check if given email exist in the database
public function emailExists(){
	// query to check if email exists
	$query = "SELECT id, name, password
			FROM " . $this->table_name . "
			WHERE email = ?
			LIMIT 0,1";
	// prepare the query
	$stmt = $this->conn->prepare( $query );
	// sanitize
	$this->email=htmlspecialchars(strip_tags($this->email));
	// bind given email value
	$stmt->bindParam(1, $this->email);
	// execute the query
	$stmt->execute();
	// get number of rows
	$num = $stmt->rowCount();
	// if email exists, assign values to object properties for easy access and use for php sessions
	if($num>0){
		// get record details / values
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// assign values to object properties
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->password = $row['password'];
		// return true because email exists in the database
		return true;
	}
	// return false if email does not exist in the database
	return false;
}


// update() method will be here
// update a user record
public function update($data){
	$query = "UPDATE " . $this->table_name . "
			SET
				name = :name,
				tel = :tel,
				address = :address,
				accountNumber = :accountNumber,
				bankName = :bankName,
				licenseID = :licenseID,
				email = :email
			WHERE id = :id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->name = $data['name'];
	$this->tel = $data['tel'];
	$this->address = $data['address'];
	$this->email = $data['email'];
	$this->accountNumber = $data['accountNumber'];
	$this->bankName = $data['bankName'];
	$this->licenseID = $data['licenseID'];
	$this->id = $data['id'];

	// bind the values from the form
	$stmt->bindParam(':name', $this->name);
	$stmt->bindParam(':tel', $this->tel);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':email', $this->email);
	$stmt->bindParam(':accountNumber', $this->accountNumber);
	$stmt->bindParam(':bankName', $this->bankName);
	$stmt->bindParam(':licenseID', $this->licenseID);
	// unique ID of record to be edited
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

//update Password

public function update_password(){
	// if password needs to be updated
	$password_set=!empty($this->password) ? ", password = :password" : "";
	// if no posted password, do not update the password
	$query = "UPDATE " . $this->table_name . "
			SET
			password =:password
			WHERE id = :id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	if(!empty($this->password)){
		$this->password=htmlspecialchars(strip_tags($this->password));
		$password_hash = password_hash($this->password, PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password_hash);
	}
	// unique ID of record to be edited
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


//load registration

public function register_load(){
	// insert query
	$query = "INSERT INTO " . $this->table_load . "
            SET
				brokerName = :brokerName,
				brokerNumber = :brokerNumber,
				shipperEmail = :shipperEmail,
				shipperAddress = :shipperAddress,
				status = :status,
				loadDescription = :loadDescription,
				rate = :rate,
				rateConfirmationID = :rateConfirmationID,
				dateRegistered = :dateRegistered,
				weight = :weight,
				registeredBy = :registeredBy";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->brokerName=htmlspecialchars(strip_tags($this->brokerName));
	$this->brokerNumber=htmlspecialchars(strip_tags($this->brokerNumber));
	$this->shipperEmail=htmlspecialchars(strip_tags($this->shipperEmail));
	$this->shipperAddress=htmlspecialchars(strip_tags($this->shipperAddress));
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->loadDescription=htmlspecialchars(strip_tags($this->loadDescription));
	$this->rate=htmlspecialchars(strip_tags($this->rate));
	$this->rateConfirmationID=htmlspecialchars(strip_tags($this->rateConfirmationID));
	$this->dateRegistered=htmlspecialchars(strip_tags($this->dateRegistered));
	$this->weight=htmlspecialchars(strip_tags($this->weight));
	$this->registeredBy=htmlspecialchars(strip_tags($this->registeredBy));

	// bind the values
	$stmt->bindParam(':brokerName', $this->brokerName);
	$stmt->bindParam(':brokerNumber', $this->brokerNumber);
	$stmt->bindParam(':shipperEmail', $this->shipperEmail);
	$stmt->bindParam(':shipperAddress', $this->shipperAddress);
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':loadDescription', $this->loadDescription);
	$stmt->bindParam(':rate', $this->rate);
	$stmt->bindParam(':rateConfirmationID', $this->rateConfirmationID);
	$stmt->bindParam(':dateRegistered', $this->dateRegistered);
	$stmt->bindParam(':weight', $this->weight);
	$stmt->bindParam(':registeredBy', $this->registeredBy);
	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}


//Pickups registration

public function add_pickup(){
	// insert query
	$query = "INSERT INTO " . $this->table_pickups . "
            SET
				date = :date,
				time = :time,
				load_id = :load_id,
				city = :city,
				state = :state,
				stateZipCode = :stateZipCode,
				address = :address,
				name = :name";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->date=htmlspecialchars(strip_tags($this->date));
	$this->time=htmlspecialchars(strip_tags($this->time));
	$this->load_id=htmlspecialchars(strip_tags($this->load_id));
	$this->city=htmlspecialchars(strip_tags($this->city));
	$this->state=htmlspecialchars(strip_tags($this->state));
	$this->stateZipCode=htmlspecialchars(strip_tags($this->stateZipCode));
	$this->address=htmlspecialchars(strip_tags($this->address));
	$this->name=htmlspecialchars(strip_tags($this->name));

	// bind the values
	$stmt->bindParam(':date', $this->date);
	$stmt->bindParam(':time', $this->time);
	$stmt->bindParam(':load_id', $this->load_id);
	$stmt->bindParam(':city', $this->city);
	$stmt->bindParam(':state', $this->state);
	$stmt->bindParam(':stateZipCode', $this->stateZipCode);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':name', $this->name);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}



//Pickups registration

public function add_drop(){
	// insert query
	$query = "INSERT INTO " . $this->table_drops . "
            SET
				date = :date,
				time = :time,
				load_id = :load_id,
				city = :city,
				state = :state,
				stateZipCode = :stateZipCode,
				address = :address,
				name = :name";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->date=htmlspecialchars(strip_tags($this->date));
	$this->time=htmlspecialchars(strip_tags($this->time));
	$this->load_id=htmlspecialchars(strip_tags($this->load_id));
	$this->city=htmlspecialchars(strip_tags($this->city));
	$this->state=htmlspecialchars(strip_tags($this->state));
	$this->stateZipCode=htmlspecialchars(strip_tags($this->stateZipCode));
	$this->address=htmlspecialchars(strip_tags($this->address));
	$this->name=htmlspecialchars(strip_tags($this->name));

	// bind the values
	$stmt->bindParam(':date', $this->date);
	$stmt->bindParam(':time', $this->time);
	$stmt->bindParam(':load_id', $this->load_id);
	$stmt->bindParam(':city', $this->city);
	$stmt->bindParam(':state', $this->state);
	$stmt->bindParam(':stateZipCode', $this->stateZipCode);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':name', $this->name);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}


// update load Details
public function edit_load(){
	$query = "UPDATE " . $this->table_load . "
			SET
				brokerName = :brokerName,
				brokerNumber = :brokerNumber,
				shipperEmail = :shipperEmail,
				shipperAddress = :shipperAddress,
				loadDescription = :loadDescription,
				rate = :rate,
				rateConfirmationID = :rateConfirmationID,
				weight = :weight
			WHERE id = :id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->brokerName=htmlspecialchars(strip_tags($this->brokerName));
	$this->brokerNumber=htmlspecialchars(strip_tags($this->brokerNumber));
	$this->shipperEmail=htmlspecialchars(strip_tags($this->shipperEmail));
	$this->shipperAddress=htmlspecialchars(strip_tags($this->shipperAddress));
	$this->loadDescription=htmlspecialchars(strip_tags($this->loadDescription));
	$this->rate=htmlspecialchars(strip_tags($this->rate));
	$this->rateConfirmationID=htmlspecialchars(strip_tags($this->rateConfirmationID));
	$this->weight=htmlspecialchars(strip_tags($this->weight));
	// bind the values from the form
	$stmt->bindParam(':brokerName', $this->brokerName);
	$stmt->bindParam(':brokerNumber', $this->brokerNumber);
	$stmt->bindParam(':shipperEmail', $this->shipperEmail);
	$stmt->bindParam(':shipperAddress', $this->shipperAddress);
	$stmt->bindParam(':loadDescription', $this->loadDescription);
	$stmt->bindParam(':rate', $this->rate);
	$stmt->bindParam(':rateConfirmationID', $this->rateConfirmationID);
	$stmt->bindParam(':weight', $this->weight);
	// unique ID of record to be edited
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


//Assign Load All Queries (UPDATE AND INSERT)

//1. LOAD

public function assign_load_update(){
	$query = "UPDATE " . $this->table_load . "
			SET
			status =:status,
			driver_id =:driver_id
			WHERE id = :load_id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


//2. PICKUPS
public function assign_pickup_update(){
	$query = "UPDATE " . $this->table_pickups . "
			SET
			driver_id =:driver_id
			WHERE load_id = :load_id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

//3. DROPS
public function assign_drops_update(){
	$query = "UPDATE " . $this->table_drops . "
			SET
			driver_id =:driver_id
			WHERE load_id = :load_id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$this->load_id=htmlspecialchars(strip_tags($this->load_id));
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

//3. LOAD ASSIGNED

public function assign_loadsAssigned_insert(){
	// insert query
	$query = "INSERT INTO " . $this->table_assign . "
            SET
				status = :status,
				date_assigned = :date_assigned,
				assignedBy = :assignedBy,
				subDispatcher=:subDispatcher,
				load_id = :load_id,
				driver_id = :driver_id";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->load_id=htmlspecialchars(strip_tags($this->load_id));
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$this->date_assigned=htmlspecialchars(strip_tags($this->date_assigned));
	$this->assignedBy=htmlspecialchars(strip_tags($this->assignedBy));
	$this->subDispatcher=htmlspecialchars(strip_tags($this->subDispatcher));

	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':load_id', $this->load_id);
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':date_assigned', $this->date_assigned);
	$stmt->bindParam(':assignedBy', $this->assignedBy);
	$stmt->bindParam(':subDispatcher', $this->subDispatcher);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}

//4. VEHICLE ASSIGNED

public function assign_vehiclesAssigned_insert(){
	// insert query
	$query = "INSERT INTO " . $this->table_vehicles_assigned . "
            SET
				date_assigned = :date_assigned,
				status = :status,
				load_id = :load_id,
				truck = :truck,
				driver_id = :driver_id,
				tractor = :tractor,
				trailer = :trailer";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->date_assigned=htmlspecialchars(strip_tags($this->date_assigned));
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->load_id=htmlspecialchars(strip_tags($this->load_id));
	$this->truck=htmlspecialchars(strip_tags($this->truck));
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$this->tractor=htmlspecialchars(strip_tags($this->tractor));
	$this->trailer=htmlspecialchars(strip_tags($this->trailer));

	// bind the values
	$stmt->bindParam(':date_assigned', $this->date_assigned);
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':load_id', $this->load_id);
	$stmt->bindParam(':truck', $this->truck);
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':tractor', $this->tractor);
	$stmt->bindParam(':trailer', $this->trailer);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}

     //2. Update vehicle Assign trailer
public function assign_vehicle_update_trailer(){
	$query = "UPDATE " . $this->table_vehicle . "
			SET
			status =:status
			WHERE number = :trailer";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->status=htmlspecialchars(strip_tags($this->status));
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':trailer', $this->trailer);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
} 

     //2. Update vehicle Assign tractor
	 public function assign_vehicle_update_tractor(){
		$query = "UPDATE " . $this->table_vehicle . "
				SET
				status =:status
				WHERE number = :tractor";
		// prepare the query
		$stmt = $this->conn->prepare($query);
		$this->status=htmlspecialchars(strip_tags($this->status));
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':tractor', $this->tractor);
		// execute the query
		if($stmt->execute()){
			return true;
		}
		return false;
	} 

     //2. Update vehicle Assign truck
	 public function assign_vehicle_update_truck(){
		$query = "UPDATE " . $this->table_vehicle . "
				SET
				status =:status
				WHERE number = :truck";
		// prepare the query
		$stmt = $this->conn->prepare($query);
		$this->status=htmlspecialchars(strip_tags($this->status));
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':truck', $this->truck);
		// execute the query
		if($stmt->execute()){
			return true;
		}
		return false;
	} 

	public function register_vehicle(){
	// insert query
	$query = "INSERT INTO " . $this->table_vehicle . "
            SET
				vehicleType = :vehicleType,
				number = :number,
				vin = :vin,
				plateNumber = :plateNumber,
				status = :status";

	$stmt = $this->conn->prepare($query);
	$this->vehicleType=htmlspecialchars(strip_tags($this->vehicleType));
	$this->number=htmlspecialchars(strip_tags($this->number));
	$this->vin=htmlspecialchars(strip_tags($this->vin));
	$this->plateNumber=htmlspecialchars(strip_tags($this->plateNumber));
	$this->status=htmlspecialchars(strip_tags($this->status));


	$stmt->bindParam(':vehicleType', $this->vehicleType);
	$stmt->bindParam(':number', $this->number);
	$stmt->bindParam(':vin', $this->vin);
	$stmt->bindParam(':plateNumber', $this->plateNumber);
	$stmt->bindParam(':status', $this->status);

	if($stmt->execute()){
		return true;
	}
	return false;
}  


public function register_users(){
	// insert query
	$query = "INSERT INTO " . $this->table_name . "
            SET
			name = :name,
			tel = :tel,
			email = :email,
			role = :role,
			password = :password,
			address = :address,
			licenseID = :licenseID,
			accountNumber = :accountNumber,
			bankName = :bankName,
			accountName = :accountName";

	$stmt = $this->conn->prepare($query);
	$this->name=htmlspecialchars(strip_tags($this->name));
	$this->tel=htmlspecialchars(strip_tags($this->tel));
	$this->email=htmlspecialchars(strip_tags($this->email));
	$this->role=htmlspecialchars(strip_tags($this->role));
	$this->password=htmlspecialchars(strip_tags($this->password));
	$this->address=htmlspecialchars(strip_tags($this->address));
	$this->licenseID=htmlspecialchars(strip_tags($this->licenseID));
	$this->accountNumber=htmlspecialchars(strip_tags($this->accountNumber));
	$this->bankName=htmlspecialchars(strip_tags($this->bankName));
	$this->accountName=htmlspecialchars(strip_tags($this->accountName));


	$stmt->bindParam(':name', $this->name);
	$stmt->bindParam(':tel', $this->tel);
	$stmt->bindParam(':email', $this->email);
	$stmt->bindParam(':role', $this->role);
	$stmt->bindParam(':password', $this->password);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':licenseID', $this->licenseID);
	$stmt->bindParam(':accountNumber', $this->accountNumber);
	$stmt->bindParam(':bankName', $this->bankName);
	$stmt->bindParam(':accountName', $this->accountName);

	$stmt->bindParam(':password', $this->password);

	if($stmt->execute()){
		return true;
	}
	return false;
}  


  // update Vehicle Details
public function edit_vehicle(){
	$query = "UPDATE " . $this->table_vehicle . "
			SET
				vehicleType = :vehicleType,
				number = :number,
				vin = :vin,
				plateNumber = :plateNumber
			WHERE id = :id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->vehicleType=htmlspecialchars(strip_tags($this->vehicleType));
	$this->number=htmlspecialchars(strip_tags($this->number));
	$this->vin=htmlspecialchars(strip_tags($this->vin));
	$this->plateNumber=htmlspecialchars(strip_tags($this->plateNumber));

	// bind the values from the form
	$stmt->bindParam(':vehicleType', $this->vehicleType);
	$stmt->bindParam(':number', $this->number);
	$stmt->bindParam(':vin', $this->vin);
	$stmt->bindParam(':plateNumber', $this->plateNumber);

	// unique ID of record to be edited
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


   // update a user record
public function admin_update_users(){
	$query = "UPDATE " . $this->table_name . "
			SET
				name = :name,
				tel = :tel,
				address = :address,
				accountNumber = :accountNumber,
				bankName = :bankName,
				accountName = :accountName,
				licenseID = :licenseID,
				password = :password,
				email = :email
			WHERE id = :id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->name=htmlspecialchars(strip_tags($this->name));
	$this->tel=htmlspecialchars(strip_tags($this->tel));
	$this->address=htmlspecialchars(strip_tags($this->address));
	$this->email=htmlspecialchars(strip_tags($this->email));
	$this->accountNumber=htmlspecialchars(strip_tags($this->accountNumber));
	$this->bankName=htmlspecialchars(strip_tags($this->bankName));
	$this->accountName=htmlspecialchars(strip_tags($this->accountName));
	$this->licenseID=htmlspecialchars(strip_tags($this->licenseID));
	$this->password=htmlspecialchars(strip_tags($this->password));
	// bind the values from the form
	$stmt->bindParam(':name', $this->name);
	$stmt->bindParam(':tel', $this->tel);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':email', $this->email);
	$stmt->bindParam(':accountNumber', $this->accountNumber);
	$stmt->bindParam(':bankName', $this->bankName);
	$stmt->bindParam(':accountName', $this->accountName);
	$stmt->bindParam(':licenseID', $this->licenseID);

	// hash the password before saving to database
	$password_hash = password_hash($this->password, PASSWORD_BCRYPT);
	$stmt->bindParam(':password', $password_hash);
	// unique ID of record to be edited
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}



   // update a Pickup record
public function admin_edit_pickups(){
	$query = "UPDATE " . $this->table_pickups . "
			SET
				date = :date,
				time = :time,
				load_id = :load_id,
				city = :city,
				state = :state,
				stateZipCode = :stateZipCode,
				address = :address,
				name = :name
			WHERE id = :id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->date=htmlspecialchars(strip_tags($this->date));
	$this->time=htmlspecialchars(strip_tags($this->time));
	$this->load_id=htmlspecialchars(strip_tags($this->load_id));
	$this->city=htmlspecialchars(strip_tags($this->city));
	$this->state=htmlspecialchars(strip_tags($this->state));
	$this->stateZipCode=htmlspecialchars(strip_tags($this->stateZipCode));
	$this->address=htmlspecialchars(strip_tags($this->address));
	$this->name=htmlspecialchars(strip_tags($this->name));

	// bind the values
	$stmt->bindParam(':date', $this->date);
	$stmt->bindParam(':time', $this->time);
	$stmt->bindParam(':load_id', $this->load_id);
	$stmt->bindParam(':city', $this->city);
	$stmt->bindParam(':state', $this->state);
	$stmt->bindParam(':stateZipCode', $this->stateZipCode);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':name', $this->name);

	// unique ID of record to be edited
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

   

   public function admin_edit_drops(){
	$query = "UPDATE " . $this->table_drops . "
			SET
				date = :date,
				time = :time,
				load_id = :load_id,
				city = :city,
				state = :state,
				stateZipCode = :stateZipCode,
				address = :address,
				name = :name
			WHERE id = :id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->date=htmlspecialchars(strip_tags($this->date));
	$this->time=htmlspecialchars(strip_tags($this->time));
	$this->load_id=htmlspecialchars(strip_tags($this->load_id));
	$this->city=htmlspecialchars(strip_tags($this->city));
	$this->state=htmlspecialchars(strip_tags($this->state));
	$this->stateZipCode=htmlspecialchars(strip_tags($this->stateZipCode));
	$this->address=htmlspecialchars(strip_tags($this->address));
	$this->name=htmlspecialchars(strip_tags($this->name));

	// bind the values
	$stmt->bindParam(':date', $this->date);
	$stmt->bindParam(':time', $this->time);
	$stmt->bindParam(':load_id', $this->load_id);
	$stmt->bindParam(':city', $this->city);
	$stmt->bindParam(':state', $this->state);
	$stmt->bindParam(':stateZipCode', $this->stateZipCode);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':name', $this->name);

	// unique ID of record to be edited
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


   // update a Pickup record
   public function admin_update_company_info(){
	$query = "UPDATE " . $this->table_companyInfo . "
			SET
				ceo = :ceo,
				tel = :tel,
				name = :name,
				mobile = :mobile,
				country = :country,
				state = :state,
				city = :city,
				poBox = :poBox,
				address = :address,
				zipCode = :zipCode,
				email = :email,
				email2 = :email2,
				website = :website";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->ceo=htmlspecialchars(strip_tags($this->ceo));
	$this->tel=htmlspecialchars(strip_tags($this->tel));
	$this->name=htmlspecialchars(strip_tags($this->name));
	$this->mobile=htmlspecialchars(strip_tags($this->mobile));
	$this->country=htmlspecialchars(strip_tags($this->country));
	$this->state=htmlspecialchars(strip_tags($this->state));
	$this->city=htmlspecialchars(strip_tags($this->city));
	$this->poBox=htmlspecialchars(strip_tags($this->poBox));
	$this->address=htmlspecialchars(strip_tags($this->address));
	$this->zipCode=htmlspecialchars(strip_tags($this->zipCode));
	$this->email=htmlspecialchars(strip_tags($this->email));
	$this->email2=htmlspecialchars(strip_tags($this->email2));
	$this->website=htmlspecialchars(strip_tags($this->website));

	// bind the values
	$stmt->bindParam(':ceo', $this->ceo);
	$stmt->bindParam(':tel', $this->tel);
	$stmt->bindParam(':name', $this->name);
	$stmt->bindParam(':mobile', $this->mobile);
	$stmt->bindParam(':country', $this->country);
	$stmt->bindParam(':state', $this->state);
	$stmt->bindParam(':city', $this->city);
	$stmt->bindParam(':poBox', $this->poBox);
	$stmt->bindParam(':address', $this->address);
	$stmt->bindParam(':zipCode', $this->zipCode);
	$stmt->bindParam(':email', $this->email);
	$stmt->bindParam(':email2', $this->email2);
	$stmt->bindParam(':website', $this->website);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


// update a Pickup record
   public function cancel_pickups_assigned(){
	$query = "UPDATE " . $this->table_pickups . "
			SET
				pickedup_Date = :pickedup_Date,
				pickedupTime = :pickedupTime,
				pickedStatus = :pickedStatus,
				comment = :comment
				WHERE id =:id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->pickedup_Date=htmlspecialchars(strip_tags($this->pickedup_Date));
	$this->pickedupTime=htmlspecialchars(strip_tags($this->pickedupTime));
	$this->pickedStatus=htmlspecialchars(strip_tags($this->pickedStatus));
	$this->comment=htmlspecialchars(strip_tags($this->comment));

	// bind the values
	$stmt->bindParam(':pickedup_Date', $this->pickedup_Date);
	$stmt->bindParam(':pickedupTime', $this->pickedupTime);
	$stmt->bindParam(':pickedStatus', $this->pickedStatus);
	$stmt->bindParam(':comment', $this->comment);
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function update_load_assigned_Cancel(){
	// insert query
	$query = "UPDATE " . $this->table_assign . "
            SET 
            totalLoadPicked = totalLoadPicked + 1 
            WHERE load_id =:load_id";
              
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->totalLoadPicked=htmlspecialchars(strip_tags($this->totalLoadPicked));

	// bind the values
	$stmt->bindParam(':load_id', $this->load_id);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function update_loads_cancel(){
	// insert query
	$query = "UPDATE " . $this->table_load . "
            SET 
            totalLoadPicked = totalLoadPicked + 1 
            WHERE id =:load_id";
              
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->totalLoadPicked=htmlspecialchars(strip_tags($this->totalLoadPicked));

	// bind the values
	$stmt->bindParam(':load_id', $this->load_id);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}



// update a Pickup record
public function cancel_drops_assigned(){
	$query = "UPDATE " . $this->table_drops . "
			SET
				dropped_Date = :dropped_Date,
				droppedTime = :droppedTime,
				status = :status,
				comment = :comment
				WHERE id =:id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->dropped_Date=htmlspecialchars(strip_tags($this->dropped_Date));
	$this->droppedTime=htmlspecialchars(strip_tags($this->droppedTime));
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->comment=htmlspecialchars(strip_tags($this->comment));

	// bind the values
	$stmt->bindParam(':dropped_Date', $this->dropped_Date);
	$stmt->bindParam(':droppedTime', $this->droppedTime);
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':comment', $this->comment);
	$stmt->bindParam(':id', $this->id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function update_load_assigned_drops_Cancel(){
	// insert query
	$query = "UPDATE " . $this->table_assign . "
            SET 
            totalLoadDropped = totalLoadDropped + 1 
            WHERE load_id =:load_id";
              
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->totalLoadDropped=htmlspecialchars(strip_tags($this->totalLoadDropped));

	// bind the values
	$stmt->bindParam(':load_id', $this->load_id);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function update_loads_drops_cancel(){
	// insert query
	$query = "UPDATE " . $this->table_load . "
            SET 
            totalLoadDropped = totalLoadDropped + 1 
            WHERE id =:load_id";
              
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->totalLoadDropped=htmlspecialchars(strip_tags($this->totalLoadDropped));

	// bind the values
	$stmt->bindParam(':load_id', $this->load_id);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}



//PICK Load All Queries (UPDATE AND INSERT)

//1. LOAD

public function pick_load_pickups_update(){
	$query = "UPDATE " . $this->table_pickups . "
			SET
			pickedupTime =:pickedupTime,
			pickedup_Date =:pickedup_Date,
			pickedStatus =:pickedStatus,
			comment =:comment
			WHERE pickups.id = :pickID";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->pickedupTime=htmlspecialchars(strip_tags($this->pickedupTime));
	$this->pickedup_Date=htmlspecialchars(strip_tags($this->pickedup_Date));
	$this->pickedStatus=htmlspecialchars(strip_tags($this->pickedStatus));
	$this->comment=htmlspecialchars(strip_tags($this->comment));
	$stmt->bindParam(':pickedupTime', $this->pickedupTime);
	$stmt->bindParam(':pickedup_Date', $this->pickedup_Date);
	$stmt->bindParam(':pickedStatus', $this->pickedStatus);
	$stmt->bindParam(':comment', $this->comment);
	$stmt->bindParam(':pickID', $this->pickID);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


//4. PICK VEHICLE ASSIGNED

public function pick_vehiclesAssigned_insert(){
	// insert query
	$query = "INSERT INTO " . $this->table_vehicles_assigned . "
            SET
				status = :status
				WHERE vehicles_assigned.load_id =:load_id";

				// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));
	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}

     //2. Update vehicle Assign trailer
public function pick_vehicle_update_truck(){

	$query = "UPDATE " . $this->table_vehicle . "
			SET
			status =:status
			WHERE vehicles.number = :truck";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->status=htmlspecialchars(strip_tags($this->status));
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':truck', $this->truck);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
} 

     //2. Update vehicle Assign tractor
	 public function pick_vehicle_update_tractor(){
		$query = "UPDATE " . $this->table_vehicle . "
				SET
				status =:status
				WHERE number = :tractor";
		// prepare the query
		$stmt = $this->conn->prepare($query);
		$this->status=htmlspecialchars(strip_tags($this->status));
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':tractor', $this->tractor);
		// execute the query
		if($stmt->execute()){
			return true;
		}
		return false;
	} 

     //2. Update vehicle Assign truck
	 public function pick_vehicle_update_trailer(){
		$query = "UPDATE " . $this->table_vehicle . "
				SET
				status =:status
				WHERE number = :trailer";
		// prepare the query
		$stmt = $this->conn->prepare($query);
		$this->status=htmlspecialchars(strip_tags($this->status));
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':trailer', $this->trailer);
		// execute the query
		if($stmt->execute()){
			return true;
		}
		return false;
	} 


	//RE-ssign Load All Queries (UPDATE AND INSERT)

//1. LOAD
public function reassign_load_update(){
	$query = "UPDATE " . $this->table_load . "
			SET
			driver_id =:driver_id
			WHERE id = :load_id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


//2. PICKUPS
public function reassign_pickup_update(){
	$query = "UPDATE " . $this->table_pickups . "
			SET
			driver_id =:driver_id
			WHERE load_id = :load_id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

//3. DROPS
public function reassign_drops_update(){
	$query = "UPDATE " . $this->table_drops . "
			SET
			driver_id =:driver_id
			WHERE load_id = :load_id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

//3. LOAD ASSIGNED

//3. DROPS
public function reassign_loads_assigned_update(){
	$query = "UPDATE " . $this->table_assign . "
			SET
			driver_id =:driver_id
			WHERE load_id = :load_id";
	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->driver_id=htmlspecialchars(strip_tags($this->driver_id));
	$stmt->bindParam(':driver_id', $this->driver_id);
	$stmt->bindParam(':load_id', $this->load_id);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


//Drop Load

public function load_deliver_update_drops(){

	$query = "UPDATE " . $this->table_drops . " 
	SET 
		droppedTime =:droppedTime, 
		expenses_Type =:expenses_Type, 
		amount_Spent =:amount_Spent, 
		expenses_Description =:expenses_Description,
		droppedBy =:droppedBy, 
		dropped_Date =:dropped_Date, 
		status =:status, 
		comment =:comment, 
		layover =:layover, 
		layOverAmount =:layOverAmount
		WHERE drops.id =:dropID"; 

	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->droppedTime=htmlspecialchars(strip_tags($this->droppedTime));
	$this->expenses_Type=htmlspecialchars(strip_tags($this->expenses_Type));
	$this->amount_Spent=htmlspecialchars(strip_tags($this->amount_Spent));
	$this->expenses_Description=htmlspecialchars(strip_tags($this->expenses_Description));
	$this->droppedBy=htmlspecialchars(strip_tags($this->droppedBy));
	$this->dropped_Date=htmlspecialchars(strip_tags($this->dropped_Date));
	$this->comment=htmlspecialchars(strip_tags($this->comment));
	$this->layover=htmlspecialchars(strip_tags($this->layover));
	$this->layOverAmount=htmlspecialchars(strip_tags($this->layOverAmount));

	
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':droppedTime', $this->droppedTime);
	$stmt->bindParam(':expenses_Type', $this->expenses_Type);
	$stmt->bindParam(':amount_Spent', $this->amount_Spent);
	$stmt->bindParam(':expenses_Description', $this->expenses_Description);
	$stmt->bindParam(':droppedBy', $this->droppedBy);
	$stmt->bindParam(':dropped_Date', $this->dropped_Date);
	$stmt->bindParam(':comment', $this->comment);
	$stmt->bindParam(':layover', $this->layover);
	$stmt->bindParam(':layOverAmount', $this->layOverAmount);
	$stmt->bindParam(':dropID', $this->dropID);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
} 

	public function load_deliver_update_vehicleAssigned(){

		$query = "UPDATE " . $this->table_vehicles_assigned. "
		SET 
			layover =:layover, 
			dropped_Date =:dropped_Date, 
			layOverAmount =:layOverAmount,
			status =:status 
			WHERE load_id =:load_id"; 
	
		// prepare the query
		$stmt = $this->conn->prepare($query);
		$this->status=htmlspecialchars(strip_tags($this->status));
		$this->dropped_Date=htmlspecialchars(strip_tags($this->dropped_Date));
		$this->layover=htmlspecialchars(strip_tags($this->layover));
		$this->layOverAmount=htmlspecialchars(strip_tags($this->layOverAmount));

		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':dropped_Date', $this->dropped_Date);
		$stmt->bindParam(':layover', $this->layover);
		$stmt->bindParam(':layOverAmount', $this->layOverAmount);
		$stmt->bindParam(':load_id', $this->load_id);
		// execute the query
		if($stmt->execute()){
			return true;
		}
		return false;
	}


public function load_deliver_update_vehicles_truck(){

	$query = "UPDATE " . $this->table_vehicle. "
	SET 
		status =:status 
		WHERE vehicles.number =:truck"; 

	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->status=htmlspecialchars(strip_tags($this->status));

	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':truck', $this->truck);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

public function load_deliver_update_vehicles_trailer(){

	$query = "UPDATE " . $this->table_vehicle. "
	SET 
		status =:status 
		WHERE vehicles.number =:trailer"; 

	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->status=htmlspecialchars(strip_tags($this->status));

	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':trailer', $this->trailer);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}

public function load_deliver_update_vehicles_tractor(){

	$query = "UPDATE " . $this->table_vehicle. "
	SET 
		status =:status 
		WHERE vehicles.number =:tractor"; 

	// prepare the query
	$stmt = $this->conn->prepare($query);
	$this->status=htmlspecialchars(strip_tags($this->status));

	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':tractor', $this->tractor);
	// execute the query
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function dropLoad_drop_update(){
	// insert query
	$query = "UPDATE  ".$this->table_drops."
            SET
				droppedTime = :droppedTime,
				expenses_Type = :expenses_Type,
				amount_Spent = :amount_Spent,
				expenses_Description = :expenses_Description,
				droppedBy = :droppedBy,
				dropped_Date = :dropped_Date,
				status = :status,
				layover = :layover,
				layOverAmount = :layOverAmount,
				comment = :comment
				WHERE drops.id = :dropID";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->droppedTime=htmlspecialchars(strip_tags($this->droppedTime));
	$this->expenses_Type=htmlspecialchars(strip_tags($this->expenses_Type));
	$this->amount_Spent=htmlspecialchars(strip_tags($this->amount_Spent));
	$this->expenses_Description=htmlspecialchars(strip_tags($this->expenses_Description));
	$this->droppedBy=htmlspecialchars(strip_tags($this->droppedBy));
	$this->dropped_Date=htmlspecialchars(strip_tags($this->dropped_Date));
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->layover=htmlspecialchars(strip_tags($this->layover));
	$this->layOverAmount=htmlspecialchars(strip_tags($this->layOverAmount));
	$this->comment=htmlspecialchars(strip_tags($this->comment));

	// bind the values
	$stmt->bindParam(':droppedTime', $this->droppedTime);
	$stmt->bindParam(':expenses_Type', $this->expenses_Type);
	$stmt->bindParam(':amount_Spent', $this->amount_Spent);
	$stmt->bindParam(':expenses_Description', $this->expenses_Description);
	$stmt->bindParam(':droppedBy', $this->droppedBy);
	$stmt->bindParam(':dropped_Date', $this->dropped_Date);
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':layover', $this->layover);
	$stmt->bindParam(':layOverAmount', $this->layOverAmount);
	$stmt->bindParam(':comment', $this->comment);
	$stmt->bindParam(':dropID', $this->dropID);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}



public function dropLoad_vehicle_assigned_update(){
	// insert query
	$query = "UPDATE " . $this->table_vehicles_assigned . "
            SET
				status = :status,
				layover = :layover,
				dropped_Date = :dropped_Date,
				layOverAmount = :layOverAmount
				WHERE load_id =:load_id";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->layover=htmlspecialchars(strip_tags($this->layover));
	$this->dropped_Date=htmlspecialchars(strip_tags($this->dropped_Date));
	$this->layOverAmount=htmlspecialchars(strip_tags($this->layOverAmount));

	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':layover', $this->layover);
	$stmt->bindParam(':dropped_Date', $this->dropped_Date);
	$stmt->bindParam(':layOverAmount', $this->layOverAmount);
	$stmt->bindParam(':load_id', $this->load_id);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}



 public function dropLoad_loads_update(){
	// insert query
	$query = "UPDATE " . $this->table_load . "
            SET
				status = :status,
				droppedBy = :droppedBy,
				totalLoadDropped = totalLoadDropped + 1,
				dropped_Date = :dropped_Date,
				droppedTime = :droppedTime,
				layOverAmount = :layOverAmount
				WHERE id =:load_id";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->droppedBy=htmlspecialchars(strip_tags($this->droppedBy));
	$this->totalLoadDropped=htmlspecialchars(strip_tags($this->totalLoadDropped));
	$this->dropped_Date=htmlspecialchars(strip_tags($this->dropped_Date));
	$this->droppedTime=htmlspecialchars(strip_tags($this->droppedTime));
	$this->layOverAmount=htmlspecialchars(strip_tags($this->layOverAmount));

	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':droppedBy', $this->droppedBy);
	$stmt->bindParam(':dropped_Date', $this->dropped_Date);
	$stmt->bindParam(':droppedTime', $this->droppedTime);
	$stmt->bindParam(':layOverAmount', $this->layOverAmount);
	$stmt->bindParam(':load_id', $this->load_id);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function dropLoad_loads_assigned_update(){
	// insert query
	$query = "UPDATE " . $this->table_assign . "
            SET
				status = :status,
				totalLoadDropped = totalLoadDropped + 1,
				dropped_Date, = :dropped_Date,
				droppedTime = :droppedTime
				WHERE load_id =:load_id";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));
	$this->totalLoadDropped=htmlspecialchars(strip_tags($this->totalLoadDropped));
	$this->dropped_Date=htmlspecialchars(strip_tags($this->dropped_Date));
	$this->droppedTime=htmlspecialchars(strip_tags($this->droppedTime));

	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':totalLoadDropped', $this->totalLoadDropped);
	$stmt->bindParam(':dropped_Date', $this->dropped_Date);
	$stmt->bindParam(':droppedTime', $this->droppedTime);
	$stmt->bindParam(':load_id', $this->load_id);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function dropLoad_vehicles_update_truck(){
	// insert query
	$query = "UPDATE " . $this->table_vehicle . "
            SET
				status = :status
				WHERE number =:truck";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));

	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':truck', $this->truck);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}



public function dropLoad_vehicles_update_trailer(){
	// insert query
	$query = "UPDATE " . $this->table_vehicle . "
            SET
				status = :status
				WHERE number =:trailer";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));

	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':trailer', $this->trailer);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}


public function dropLoad_vehicles_update_tractor(){
	// insert query
	$query = "UPDATE " . $this->table_vehicle . "
            SET
				status = :status
				WHERE number =:tractor";

	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	$this->status=htmlspecialchars(strip_tags($this->status));

	// bind the values
	$stmt->bindParam(':status', $this->status);
	$stmt->bindParam(':tractor', $this->tractor);

	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}

			

}

?>

