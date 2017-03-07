<?php
require_once("database.php");

/**
* class for user functions
*/
class User {

	public $id;
	public $username;
	public $password;
	public $admin;

	public static function find_all() {
		// find all the users 
		return self::find_by_sql("SELECT * FROM users");
	}

	public static function find_by_id( $id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM users WHERE id={$id} LIMIT 1");
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

	public static function authenticate( $username="", $password="") {
		global $database;
		// $hashed_password = sha1($password);
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);

		$sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}';";
		//$sql = "LIMIT 1;";
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

		// single quote all values
		$sql = "INSERT INTO users (username,admin,password) VALUES ('";
		$sql .= $database->escape_value($this->username) . "', '";
		$sql .= $database->escape_value($this->admin) . "', '";
		$sql .= $database->escape_value($this->password) . "');";
		if($database->query($sql)){	
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function remove()
	{
			global $database;
			$sql= "DELETE FROM users "; 
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

?>