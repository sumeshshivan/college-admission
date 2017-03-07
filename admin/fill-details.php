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
  } else if(!$session->is_staff()) {
    redirect_to("../student/index.php");
  } else {
    $user = User::find_by_id($_SESSION['user_id']);
    $is_admin = $user->admin == "true"? true : false;
  }

?>

<?php
  $fill_info_page = true;
?>

<?php

    if(isset($_GET["id"])) {

      $id=$_GET["id"];
      $student = Student::find_by_id($id);
    } else {
      redirect_to("../admin/index.php");
    }

    // if ($student->status!="created") {
    //     redirect_to("../");
    // }

    $tab = 1;

    $parent = Parents::find_by_id($student->id);

    $school = School::find_by_id($student->id);

    $hschool = HSchool::find_by_id($student->id);

    $degree = Degree::find_by_id($student->id);


    if (isset($_GET['tab'])) {
      $tab = $_GET['tab'];
    }

?>

<?php
  if ($is_admin) {
    include("header_admin.php");
    include("navigation_admin.php");  
  } else {
    include("header_staff.php");
    include("navigation_staff.php");  
  }

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Details

        <?php 

          if ($is_admin) {

            if ($student->status == "verified") {
              echo '<a href="../admin/student-approve.php?id=' . $id . '" class="btn btn-primary">Aprove Student</a>';
            } 

          } else {

            if ($student->status == "submitted") {
              echo '<a href="../admin/student-verify.php?id=' . $id . '" class="btn btn-primary">Verify Student</a>';
            }
            
          }

        ?>

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

                    if($tab==2)  {
                      echo '<li class="active">';
                    } else {
                      echo '<li>';
                    }
                      
                    echo '<a href="#tab_2" data-toggle="tab">Parent Info</a></li>';

                      if($tab==3)  {
                      echo '<li class="active">';
                      } else {
                      echo '<li>';
                      }

                      echo '<a href="#tab_3" data-toggle="tab">Academic Info</a></li>';

              ?>
            </ul>
            <div class="tab-content">

              <div class="tab-pane <?php if($tab==1) echo "active"; ?>" id="tab_1">

                <?php include("personal_info_form.php"); ?>

              </div>


              <?php

                  include("parent_info_form.php");

                  include("academic_info_form.php");
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
