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

	    	$result= $batch->remove();

	    	if ($result) {

	    		redirect_to("batch-list.php?success");
	    	} else {

	    		redirect_to("batch-list.php?error");
	    	}
	    	
	    } else {
	    	redirect_to("batch-list.php?error");
	    }

	} else {

		redirect_to("batch-list.php?error");
	}


?>
