<?php

/**
* A class to work with sessions 
* to manage logging users in and out
*/
class Session {
	
	private $logged_in = false;
	private $staff = false;
	public $user_id; 
	public $student_id; 

	function __construct() {
		session_start();
		$this->check_login();
	}

	public function is_logged_in() {
		return $this->logged_in;
	}

	public function is_staff() {
		return $this->staff;
	}

	public function login($user) {
		if($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->logged_in = true;
			$this->staff = true;
		}
	}

	public function student_login($student) {
		if($student) {
			$this->student_id = $_SESSION['student_id'] = $student->application_no;
			$this->logged_in = true;
			$this->staff = false;
		}
	}

	public function logout() {
		unset($_SESSION['user_id']);
		unset($_SESSION['student_id']);
		unset($this->user_id);
		unset($this->student_id);
		$this->logged_in = false;
		$this->staff = false;
	}

	private function check_login() {
		if(isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
			$this->staff = true;
		} else if(isset($_SESSION['student_id'])) {
			$this->student_id = $_SESSION['student_id'];
			$this->logged_in = true;
			$this->staff = false;
		} else {
			unset($this->user_id);
			unset($this->student_id);
			$this->logged_in = false;
			$this->staff = false;
		}
	}
}


$session = new Session();

?>