<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>

<?php

if (isset($_REQUEST['query'])) {
    
    $query = $_REQUEST['query'];

    $students = Student::search($query);

    $result = "";

    foreach ($students as $student) {

        $result.= '<li><a href="fill-details.php?id=' . $student->id . '"><span>' . $student->name .'</span></a></li>';
        
    }

    echo $result;

}

?>
