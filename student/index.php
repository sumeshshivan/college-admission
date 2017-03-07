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
  $home_page = true;
?>

<?php
  
    $application_no = $_SESSION['student_id'];
    $student = Student::find_by_application_no($application_no);

?>

<?php 

  switch ($student->status) {
    case 'created':
      $created = true;
      break;

    case 'submitted':
      $submitted = true;
      break;

    case 'verified':
      $verified = true;
      break;

    case 'approved':
      $approved = true;
      break;
    
    default:
      # code...
      break;
  }

?>

<?php include("header_student.php"); ?>
<?php include("navigation_student.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box  <?php if($created) echo "bg-green" ; else echo "bg-gray" ;?> ">
            <div class="inner">
              <h3>Created</h3>

              <p>Fill Your Info</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="fill-details.php" class="small-box-footer">
              Fill Your Info <i class="fa fa-arrow-circle-right"></i>
            </a>

          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box <?php if($submitted) echo "bg-green" ; else echo "bg-gray" ;?>">
            <div class="inner">
              <h3>Submitted</h3>

              <p>Print Form</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="generate-pdf.php" class="small-box-footer">
              Print Form <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box <?php if($verified) echo "bg-green" ; else echo "bg-gray" ;?>">
            <div class="inner">
              <h3>Verified</h3>

              <p>Verified</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box <?php if($approved) echo "bg-green" ; else echo "bg-gray" ;?>">
            <div class="inner">
              <h3>Approved</h3>

              <p>Approved</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>