<?php
require_once("database.php");

/**
* class for batch functions
*/
class Parents {
	public $id;
	public $father;
	public $mother;
	public $guardian;
	public $income;
	public $address;
	public $contact;
	public $email;

	
	public static function find_by_id( $id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM parent_info WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	} 

	public static function find_by_sql( $sql="") {
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	

	private static function instantiate( $record) {
		
		$object = new self;

		foreach ($record as $attribute => $value) {
			if ($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}

		}

		return $object;
	}

	private function has_attribute($attribute) {
		$object_vars = get_object_vars($this);
		return array_key_exists($attribute, $object_vars);
	}

	public function create() {
		global $database;

		// $this->status = 0;

		$sql = "INSERT INTO parent_info (id,father,mother,guardian,income,address,contact,email) VALUES ('";
		$sql.= $database->escape_value($this->id) . "','";
		$sql.= $database->escape_value($this->father) . "','";
		$sql.= $database->escape_value($this->mother) . "','";
		$sql.= $database->escape_value($this->guardian) . "','";
		$sql.= $database->escape_value($this->income) . "','";
		$sql.= $database->escape_value($this->address) . "','";
		$sql.= $database->escape_value($this->contact) . "','";
		$sql.= $database->escape_value($this->email) . "');";
		if($database->query($sql)){	
			// $this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update(){
		global $database;
		$sql="UPDATE parent_info SET "; 
		$sql.= "father='" .$database->escape_value($this->father)."',";
		$sql.= "mother='" .$database->escape_value($this->mother)."',";
	 	$sql.= "guardian='" .$database->escape_value($this->guardian)."',";
		$sql.= "address='".$database->escape_value($this->address)."',";
	 	$sql.= "income='".$database->escape_value($this->income)."',";
	 	$sql.= "contact='".$database->escape_value($this->contact)."',";
	 	$sql.= "email='".$database->escape_value($this->email)."'";
	 	$sql.= " WHERE id=".$database->escape_value($this->id).";";

	 	if($database->query($sql)){	
			return true;
		} else {
			return false;
		}
	}


		
}