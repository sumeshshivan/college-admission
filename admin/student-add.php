<?php require_once("database.php"); ?>
<?php require_once("batch.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("functions.php"); ?>

<?php
  if(!$session->is_logged_in()) {
    redirect_to("login.php");
  } else if(!$session->is_staff()) {
    redirect_to("../student/index.php");
  }
?>

<?php

	if(isset($_GET["id"])) {

		$id=$_GET["id"];
	    $batch = Batch::find_by_id($id);

	    if ($batch) {

    	    $errors = array();

		    $required_fields = array('application_no', 'rank','dob', 'name', 'sex', 'category', 'course');
		    foreach($required_fields as $fieldname) {
		        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])) {
		            $errors[] = $fieldname;
		        }
		    }

		    if(empty($errors)) {

		      $student = new Student();

		      $student->application_no = $_POST['application_no'];
		      $student->name = $_POST['name'];
		      $date = new DateTime($_POST['dob']);
		      $student->dob = $date->format('Y-m-d');
		      $student->sex = $_POST['sex'];
		      $student->course = $_POST['course'];
		      $student->category = $_POST['category'];
		      $student->rank = $_POST['rank'];
		      $student->status = "created";
		      $student->batch = $batch->id;
		      $result = $student->create();

		      if ($result) {
		      	redirect_to("student-list.php?id={$id}&success");
		      } else {
		      	redirect_to("student-list.php?id={$id}&error");
		      }

		    } else {
		    	redirect_to("student-list.php?id={$id}&error");
		    }
	    	
	    } else {
	    	redirect_to("batch-list.php?error");
	    }

	} else {

		redirect_to("batch-list.php?error");
	}

?>