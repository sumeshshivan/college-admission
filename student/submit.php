<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("session.php"); ?>
<?php
  if(!$session->is_logged_in()) {
    redirect_to("login.php");
  } else if($session->is_staff()) {
    redirect_to("../admin/index.php");
  }
?>

<?php
  
    $application_no = $_SESSION['student_id'];
    $student = Student::find_by_application_no($application_no);

    $student->status = "submitted";

    $result = $student->update();

    if ($result) {
        redirect_to("../");
    } else {
        redirect_to("fill-details.php?tab=4&&error");
    }

?>