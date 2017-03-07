<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("batch.php"); ?>
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
  $fill_info_page = true;
?>

<?php
  
    $application_no = $_SESSION['student_id'];
    $student = Student::find_by_application_no($application_no);

    $upload_errors = array(
      UPLOAD_ERR_OK     => "No errors.",
      UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
      UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
      UPLOAD_ERR_PARTIAL  => "Partial upload.",
      UPLOAD_ERR_NO_FILE  => "No file.",
      UPLOAD_ERR_NO_TMP_DIR   => "No temporary directory.",
      UPLOAD_ERR_CANT_WRITE   => "Can't write to disk.",
      UPLOAD_ERR_EXTENSION  => "File upload stopped by extension."
    );
    
    $errors = array();

    $required_fields = array('house','place','post','district','state','pin','adhar_no','contact','email','date_of_admn');
    
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])) {
            $errors[] = $fieldname;
        }
    }


    if(empty($errors)) {
      $student->house = $_POST['house'];
      $student->place = $_POST['place'];
      $student->post = $_POST['post'];
      $student->district = $_POST['district'];
      $student->state = $_POST['state'];
      $student->pin = $_POST['pin'];
      $student->adhar_no = $_POST['adhar_no'];
      $student->contact = $_POST['contact'];
      $student->email = $_POST['email'];
      $student->date_of_admn = $_POST['date_of_admn'];


      $tmp_file = $_FILES['photo']['tmp_name'];
      $file_name = $_FILES['photo']['name'];
      $ext = pathinfo($file_name, PATHINFO_EXTENSION);

      $ext = strtolower($ext);

      if( $ext == 'jpg' || $ext == 'jpeg' || $ext =='png') {

          $target_file = $student->application_no . "_" . uniqid ($prefix="faculty-photo-") . "." . $ext;
          $upload_dir = "../photos";
          
          if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {
            $message = "File uploaded successfully.";

            resizejpeg("../photos/", $target_file, 600, 600, 400, 300);
          } else {
            $error = $_FILES['photo']['error'];
            $message = $upload_errors[$error];
          }

          if ($file_name) {
            $student->photo = $target_file;
          }

          $result = $student->update();

          if ($result) {
              redirect_to("fill-details.php?tab=2&&success");
          } else {
              redirect_to("fill-details.php?tab=1&&error");
          }

      } else {
          redirect_to("fill-details.php?tab=1&&error=image-extension");
      }

    }  else {
        redirect_to("fill-details.php?tab=1&&error");
    }

?>