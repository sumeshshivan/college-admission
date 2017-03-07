<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("parent.php"); ?>
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

     $required_fields = array('father','mother','guardian','income','address','contact','email');
    

    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])) {
            $errors[] = $fieldname;
        }

    }

    if(empty($errors)) {

      $parent = Parents::find_by_id($student->id);

      if (!$parent) {
        $parent = new Parents();
        $created = true;
      }

      $parent->id = $student->id;
      $parent->father = $_POST['father'];
      $parent->mother = $_POST['mother'];
      $parent->guardian = $_POST['guardian'];
      $parent->guardian = $_POST['income'];
      $parent->address = $_POST['address'];
      $parent->contact = $_POST['contact'];
      $parent->email = $_POST['email'];

      if ($created) {
        $result = $parent->create();
      } else {
        $result = $parent->update();
      }
      
      if ($result) {
          redirect_to("fill-details.php?success");
      } else {
          redirect_to("fill-details.php?error");
      }

    }  else {
      redirect_to("fill-details.php?error");
    }

?>