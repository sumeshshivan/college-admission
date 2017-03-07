<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php
    
    $errors = array();
    //Form validation
    $required_fields = array('username', 'password');
    foreach($required_fields as $fieldname){
        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    if(!empty($errors)){
        redirect_to("login.php?errors");
    }  else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = User::authenticate( $username, $password );
        if($user) {
            $session->login($user);
            redirect_to("index.php");

        } else {

	       redirect_to("login.php?errors");    
	   }
    }
?>
