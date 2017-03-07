<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("student.php"); ?>
<?php require_once("batch.php"); ?>
<?php require_once("parent.php"); ?>
<?php require_once("school.php"); ?>
<?php require_once("degree.php"); ?>
<?php require_once("h_school.php"); ?>
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

    if ($student->status!="created") {
        redirect_to("../");
    }

    $tab = 1;

    if ($student->email) {
        $personal_info_added = true;
        $tab = 2;
    } else {
      $personal_info_added = false;
    }

    $parent = Parents::find_by_id($student->id);

    if ($parent) {
        $parent_info_added = true;
        $tab = 3;
    } else {
      $parent_info_added = false;
    }

    $school = School::find_by_id($student->id);

    $hschool = HSchool::find_by_id($student->id);

    $degree = Degree::find_by_id($student->id);

    if ($school && $hschool ) {
        $academic_info_added = true;
        $tab = 4;
    } else {
      $academic_info_added = false;
    }

    if (isset($_GET['tab'])) {
      $tab = $_GET['tab'];
    }

?>

<?php include("header_student.php"); ?>
<?php include("navigation_student.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li <?php if($tab==1) echo 'class="active"'; ?> ><a href="#tab_1" data-toggle="tab">Personal Info</a></li>

              <?php

                  if ($personal_info_added) {

                    if($tab==2)  {
                      echo '<li class="active">';
                    } else {
                      echo '<li>';
                    }
                      
                    echo '<a href="#tab_2" data-toggle="tab">Parent Info</a></li>';

                  }

                  if ($parent_info_added) {

                      if($tab==3)  {
                      echo '<li class="active">';
                      } else {
                      echo '<li>';
                      }

                      echo '<a href="#tab_3" data-toggle="tab">Academic Info</a></li>';
                  }

                  if ($academic_info_added) {

                      if($tab==4)  {
                      echo '<li class="active">';
                      } else {
                      echo '<li>';
                      }

                      echo '<a href="#tab_4" data-toggle="tab">View and Submit</a></li>';
                  }

              ?>
            </ul>
            <div class="tab-content">

              <div class="tab-pane <?php if($tab==1) echo "active"; ?>" id="tab_1">

                <?php include("personal_info_form.php"); ?>

              </div>


              <?php

                  if ($personal_info_added) {
                      include("parent_info_form.php");
                  }

                  if ($parent_info_added) {
                      include("academic_info_form.php");
                  }

                  if ($academic_info_added) {

                      if($tab==4)  {
                        echo '<div class="tab-pane active id="tab_4">';
                      } else {
                        echo '<div class="tab-pane" id="tab_4">';
                      }
                      
                      include("view.php");
                  }

              ?>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>
