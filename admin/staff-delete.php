<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>

<?php
  if(!$session->is_logged_in()) {
    redirect_to("login.php");
  } else if(!$session->is_staff()) {
    redirect_to("../student/index.php");
  } else {
    $user = User::find_by_id($_SESSION['user_id']);
    $is_admin = $user->admin == "true"? true : false;

	  if (!$is_admin) {
	     redirect_to("../admin/");
	  }
  }
?>

<?php

	if(isset($_GET["id"])) {

		$id=$_GET["id"];
	    $user = User::find_by_id($id);

	    if ($user) {

	    	$result= $user->remove();

	    	if ($result) {

	    		redirect_to("staff-list.php?success");
	    	} else {

	    		redirect_to("staff-list.php?error");
	    	}
	    	
	    } else {
	    	redirect_to("staff-list.php?error");
	    }

	} else {

		redirect_to("staff-list.php?error");
	}


?>