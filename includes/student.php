<?php
require_once("database.php");

/**
* class for batch functions
*/
class Student {

	public $id;
	public $application_no;
	public $name;
	public $dob;
	public $graduation;
	public $course;
	public $rank;
	public $sex;
	public $category;
	public $batch;
	public $house;
	public $place;
	public $post;
	public $district;
	public $state;
	public $pin;
	public $adhar_no;
	public $contact;
	public $email;
	public $date_of_admn;
	public $photo;
	public $admission_no;
	// public $father;
	// public $mother;
	// public $guardian;
	// public $parent_contact;
	public $status;

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM student");
	}

	public static function search($query_string="") {
		return self::find_by_sql("SELECT * FROM student WHERE name LIKE '%{$query_string}%' OR application_no LIKE '%{$query_string}%' LIMIT 5");
	}

	public static function find_all_approved() {
		return self::find_by_sql("SELECT * FROM student WHERE status=approved");
	}

	public static function find_all_created() {
		return self::find_by_sql("SELECT * FROM student WHERE status=created");
	}

	public static function find_last() {
		$result_array = self::find_by_sql("SELECT * FROM student ORDER BY id DESC LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_id( $id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM student WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	} 

	public static function find_by_application_no( $application_no) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM student WHERE application_no={$application_no} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	// public static function search( $key=""){
	// 	$result_array = self::find_by_sql("SELECT * FROM Student WHERE name='{$key}' OR application_no='{$key}'");
	// 	return $result_array;
	// }

	public static function find_by_batch( $batch_id=0) {
		return self::find_by_sql("SELECT * FROM student WHERE batch={$batch_id}");
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

	public static function authenticate( $application_no="", $dob="") {
		global $database;
		$application_no = $database->escape_value($application_no);
		$dob = $database->escape_value($dob);

		$sql = "SELECT * FROM student WHERE application_no='{$application_no}' AND dob='{$dob}';";

		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
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

		$sql = "INSERT INTO student (application_no,name,dob,rank,graduation,course,sex,batch,status,category) VALUES ('";
		$sql.= $database->escape_value($this->application_no) . "','";
		$sql.= $database->escape_value($this->name) . "','";
		$sql.= $database->escape_value($this->dob) . "','";
		$sql.= $database->escape_value($this->rank) . "','";
		$sql.= $database->escape_value($this->graduation) . "','";
		$sql.= $database->escape_value($this->course) . "','";
		$sql.= $database->escape_value($this->sex) . "','";
		$sql.= $database->escape_value($this->batch) . "','";
		$sql.= $database->escape_value($this->status) . "','";
		$sql.= $database->escape_value($this->category) . "');";
		if($database->query($sql)){	
			// $this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}
	

	public function update(){
		global $database;
		$sql="UPDATE student SET "; 
		$sql.= "house='" .$database->escape_value($this->house)."',";
		$sql.= "place='" .$database->escape_value($this->place)."',";
	 	$sql.= "post='" .$database->escape_value($this->post)."',";
		$sql.= "district='".$database->escape_value($this->district)."',";
	 	$sql.= "state='".$database->escape_value($this->state)."',";
		$sql.= "pin='".$database->escape_value($this->pin)."',";
		$sql.= "adhar_no='".$database->escape_value($this->adhar_no)."',";
	 	$sql.= "email='".$database->escape_value($this->email)."',";
	 	$sql.= "status='".$database->escape_value($this->status)."',";
	 	$sql.= "contact='".$database->escape_value($this->contact)."',";
	 	$sql.= "admission_no='".$database->escape_value($this->admission_no)."',";
	 	$sql.= "date_of_admn='".$database->escape_value($this->date_of_admn)."',";
	 	$sql.= "photo='".$database->escape_value($this->photo)."'";
	 	$sql.= " WHERE id=".$database->escape_value($this->id).";";

	 	if($database->query($sql)){	
			return true;
		} else {
			return false;
		}
	}
	public function remove()
	{
			global $database;
			$sql= "DELETE FROM student "; 
	 		$sql.= "WHERE id=".$database->escape_value($this->id).";";
			if($database->query($sql))
			{	return true;
			}
			else 
			{
			return false;
			}

	}

		
}