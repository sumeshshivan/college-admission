<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php
    //unset the session variables
    $_SESSION = array();
    
    //destroy the session cookie
    if(isset($_COOKIE[session_name()])){
	setcookie(session_name(), '', time()-42000, '/');
    }
    
    //destroy the session
    session_destroy();
    
    //redirect to index page
    redirect_to("index.php");
    
?>