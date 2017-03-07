<?php
require_once("database.php");

/**
* class for batch functions
*/
class HSchool {
	public $id;
	public $name;
	public $reg_no;
	public $board;
	public $year;
	public $mark;
	
	public static function find_by_id( $id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM higher_secondary WHERE id={$id} LIMIT 1");
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

		$sql = "INSERT INTO higher_secondary (id,name,reg_no,board,year) VALUES ('";
		$sql.= $database->escape_value($this->id) . "','";
		$sql.= $database->escape_value($this->name) . "','";
		$sql.= $database->escape_value($this->reg_no) . "','";
		$sql.= $database->escape_value($this->board) . "','";
		$sql.= $database->escape_value($this->year) . "');";
		if($database->query($sql)){	
			return true;
		} else {
			return false;
		}
	}


	public function update(){
		global $database;
		$sql="UPDATE higher_secondary SET "; 
		$sql.= "name='" .$database->escape_value($this->name)."',";
		$sql.= "reg_no='" .$database->escape_value($this->reg_no)."',";
	 	$sql.= "board='".$database->escape_value($this->board)."',";
	 	$sql.= "year='".$database->escape_value($this->year)."'";
	 	$sql.= " WHERE id=".$database->escape_value($this->id).";";

	 	if($database->query($sql)){	
			return true;
		} else {
			return false;
		}
	}

		
}