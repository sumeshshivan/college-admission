<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("session.php"); ?>

<?php
  if(!$session->is_logged_in()) {
    redirect_to("login.php");
  } else if(!$session->is_staff()) {
    redirect_to("../student/index.php");
  } else {
    $user = User::find_by_id($_SESSION['user_id']);
  }

?>

<?php
  
    if(isset($_GET["id"])) {

      $id=$_GET["id"];
      $student = Student::find_by_id($id);
    } else {
      redirect_to("../admin/index.php");
    }

    $student->status = "verified";

    $result = $student->update();

    if ($result) {
        redirect_to("fill-details.php?id={$id}&success");
    } else {
        redirect_to("fill-details.php?id={$id}&error");
    }

?>