<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php
    
    $errors = array();
    //Form validation
    $required_fields = array('application_no', 'dob');
    foreach($required_fields as $fieldname){
        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    if(!empty($errors)){

        // echo "errors" . $errors[0];
        redirect_to("login.php?validation_error");
    }  else {
        $application_no = $_POST['application_no'];
        $date = new DateTime($_POST['dob']);
        $dob = $date->format('Y-m-d');
        $student = Student::authenticate( $application_no, $dob );
        if($student) {
            $session->student_login($student);
            redirect_to("index.php");

            // echo "success" . $student->name;
        } else {
    	    redirect_to("login.php?error");    
            // echo $date;
    	}
    }
?>
