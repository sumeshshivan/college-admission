<?php
require_once("database.php");
require_once("student.php");

/**
* class for batch functions
*/
class Batch {

	public $id;
	public $name;
	public $year;
	

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM batch");
	}

	public static function find_by_id( $id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM batch WHERE id={$id} LIMIT 1");
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
		$sql = "INSERT INTO batch (name,year) VALUES ('";
		$sql.= $database->escape_value($this->name) . "','";
		$sql.= $database->escape_value($this->year) . "');";
		if($database->query($sql)){	
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function remove(){
		global $database;

		$sql= "DELETE FROM batch "; 
	 	$sql.= "WHERE id=".$database->escape_value($this->id).";";

	 	if($database->query($sql)){	
			return true;
		} else {
			return false;
		}
	}

	public function students() {
		$students = Student::find_by_batch($this->id);
		return $students;
	}
}

?>