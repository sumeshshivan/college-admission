<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("degree.php"); ?>
<?php require_once("h_school.php"); ?>
<?php require_once("school.php"); ?>
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
     $errors = array();

     $required_fields = array('s_name','s_no','s_board','s_year','s_mark','h_name','h_no','h_board','h_year','h_mark','d_name','d_no','d_board','d_year','d_mark');
    

    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])) {
            $errors[] = $fieldname;
        }

    }

    if(empty($errors)) {

      $school = new School();

      $school->id = $student->id;
      $school->name = $_POST['s_name'];
      $school->reg_no = $_POST['s_no'];
      $school->board = $_POST['s_board'];
      $school->year = $_POST['s_year'];
      $school->mark = $_POST['s_mark'];
      $result1 = $school->create();

      $hschool = new HSchool();

      $hschool->id = $student->id;
      $hschool->name = $_POST['h_name'];
      $hschool->reg_no = $_POST['h_no'];
      $hschool->board = $_POST['h_board'];
      $hschool->year = $_POST['h_year'];
      $hschool->mark = $_POST['h_mark'];
      $result2 = $hschool->create();

      $degree = new Degree();

      $degree->id = $student->id;
      $degree->name = $_POST['d_name'];
      $degree->reg_no = $_POST['d_no'];
      $degree->board = $_POST['d_board'];
      $degree->year = $_POST['d_year'];
      $degree->mark = $_POST['d_mark'];
      $result3 = $degree->create();

      if ($result1 && $result2 && $result3) {
          redirect_to("fill-details.php?success");
      } else {
          redirect_to("fill-details.php?error");
      }

    }  

?>