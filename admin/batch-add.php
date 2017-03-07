<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("batch.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("session.php"); ?>
<?php
  if(!$session->is_logged_in()) {
    redirect_to("login.php");
  } else if(!$session->is_staff()) {
    redirect_to("../student/index.php");
  }
?>

<?php
    
    $errors = array();

    $required_fields = array('name', 'year');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])) {
            $errors[] = $fieldname;
        }
    }

    if(empty($errors)) {

      $batch = new Batch();

      $batch->name = $_POST['name'];
      $batch->year = $_POST['year'];
      $result = $batch->create();

      if ($result) {
        redirect_to("batch-list.php?success");
      } else {
        redirect_to("batch-list.php?error");
      }

    } else {
      redirect_to("batch-list.php?error");
    }
?>
