<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("session.php"); ?>

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

  $staff = false;

  if(isset($_GET['id'])) {
    $staff_id = $_GET['staff'];
    $staff =  User::find_by_id($staff_id);
  } 

?>

<?php
 
    $errors = array();
    //Form validation
    $required_fields = array('username','password');
    foreach($required_fields as $fieldname){
        if(!isset($_POST[$fieldname])||empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    if(!empty($errors)) {
        redirect_to("staff-list.php?error=fields".$errors[0]);
    }  else {

        if ($staff) {

            $staff->username = $_POST['username'];
            $staff->password =$_POST['password'];

            if(isset($_POST['admin']) && $_POST['admin'] == 'Yes') 
            {
                $staff->admin = true;
            } else {
                $staff->admin = false;
            }

            $result = $staff->update();

            if ($result) {
                redirect_to("staff-list.php?success");
            } else {
                redirect_to("staff-list.php?error");
            }
            
        } else {
            $staff = new User();
            $staff->username = $_POST['username'];
            $staff->password =$_POST['password'];

            if(isset($_POST['admin']) && $_POST['admin'] == 'Yes') 
            {
                $staff->admin = true;
            } else {
                $staff->admin = false;
            }

            $result = $staff->create();

            if ($result) {
                redirect_to("staff-list.php?success");
            } else {
                redirect_to("staff-list.php?error");
            }
        }

    }
?>