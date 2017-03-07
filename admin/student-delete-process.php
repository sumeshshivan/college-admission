<?php require_once("database.php"); ?>
<?php require_once("batch.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("functions.php"); ?>

<?php
    $id=$_GET["id"];
    $student = Student::find_by_id($id);
    $result= $student->remove();
    $batch_id=$student->batch;
    redirect_to("students.php?id={$batch_id}");
    
?>
