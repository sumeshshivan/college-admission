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

    $parent = Parents::find_by_id($student->id);

    $school = School::find_by_id($student->id);

    $hschool = HSchool::find_by_id($student->id);

    $degree = Degree::find_by_id($student->id);

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../static/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../static/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
<style type="text/css">
  
  td {
    font-weight: bold;
  }

</style>

<section class="invoice">

<div class="row">
    <div class="col-xs-2">
    <center>
      <img src="../static/dist/img/rit.jpg" width="80">
    </center>
        
    </div>
    <div class="col-xs-8">
    <center>    

    <h3>RAJIV GANDHI INSTITUTE OF TECHNOLOGY</h3>

    <h4>VELLOOR P.O, KOTTAYAM - 686 501</h4>

    </center>

    </div>
</div>

<hr/>
<div class="row">
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Personal Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-6">
                    <table class="table .table-bordered">

                    <tr>
                    <td>Application No:</td>
                    <td><?php echo ucfirst($student->application_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Name</td>
                    <td><?php echo ucfirst($student->name); ?> </td> 
                    </tr>

                    <tr>
                    <td>rank</td>
                    <td><?php echo ucfirst($student->rank); ?> </td> 
                    </tr>

                    <tr>
                    <td>course</td>
                    <td><?php echo ucfirst($student->course); ?> </td> 
                    </tr>

                    <tr>
                    <td>Date of Birth</td>
                    <td><?php echo ucfirst($student->dob); ?> </td> 
                    </tr>

                    <tr>
                    <td>Sex</td>
                    <td><?php echo ucfirst($student->sex); ?> </td> 
                    </tr>

                    <tr>
                    <td>House</td>
                    <td><?php echo ucfirst($student->house); ?> </td> 
                    </tr>        

                    <tr>
                    <td>Place</td>
                    <td><?php echo ucfirst($student->place); ?> </td> 
                    </tr>

                    <tr>
                    <td>Post</td>
                    <td><?php echo ucfirst($student->post); ?> </td> 
                    </tr>

                    <tr>
                    <td>District</td>
                    <td><?php echo ucfirst($student->district); ?> </td> 
                    </tr>

                    <tr>
                    <td>State</td>
                    <td><?php echo ucfirst($student->state); ?> </td> 
                    </tr> 

                    <tr>
                    <td>Pin</td>
                    <td><?php echo ucfirst($student->pin); ?> </td> 
                    </tr>

                </table>

            </div>

            <div class="col-md-6">

                <div class="row">

                    <div class="col-md-4">
                    </div>

                    <div class="col-md-4">
                        <img id="student-photo" src="../photos/<?php echo $student->photo; ?>" width="150" alt="your image" />
                    </div>

                    <div class="col-md-4">
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <table class="table .table-striped" style="border: none;">

                        <tr>
                        <td>Category</td>
                        <td><?php echo ucfirst($student->category); ?> </td> 
                        </tr>

                <tr>
                <td>Date of Admission</td>
                <td><?php echo ucfirst($student->date_of_admn); ?> </td> 
                </tr> 
                <tr>
                <td>Adhar No</td>
                <td><?php echo ucfirst($student->adhar_no); ?> </td> 
                </tr>
                <tr>
                <td>contact</td>
                <td><?php echo ucfirst($student->contact); ?> </td> 
                </tr>
                <tr>
                <td>email</td>
                <td><?php echo ucfirst($student->email); ?> </td> 
                </tr>
          </table>
        </div>

      </div>

    </div>
  </div>
</div>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
<!-- -------------------------------------------------------------------- -->


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Parent Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Father Name</td>
                    <td><?php echo ucfirst($parent->father); ?> </td> 
                    </tr>

                    <tr>
                    <td>Mother Name</td>
                    <td><?php echo ucfirst($parent->mother); ?> </td> 
                    </tr>

                    <tr>
                    <td>Guardian</td>
                    <td><?php echo ucfirst($parent->guardian); ?> </td> 
                    </tr>

                    </table>

                </div>

                                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Salary</td>
                    <td><?php echo ucfirst($student->application_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Contact</td>
                    <td><?php echo ucfirst($parent->contact); ?> </td> 
                    </tr>

                    <tr>
                    <td>Email</td>
                    <td><?php echo ucfirst($parent->email); ?> </td> 
                    </tr>

                    </tr>

                    </table>
                    
                </div>

            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------- -->


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Academic Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Institution Name</td>
                    <td><?php echo ucfirst($school->name); ?> </td> 
                    </tr>

                    <tr>
                    <td>Register No</td>
                    <td><?php echo ucfirst($school->reg_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Guardian</td>
                    <td><?php echo ucfirst($school->year); ?> </td> 
                    </tr>

                     <tr>
                    <td>Guardian</td>
                    <td><?php echo ucfirst($school->board); ?> </td> 
                    </tr>
                   


                    </table>

                </div>

                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Institution Name</td>
                    <td><?php echo ucfirst($hschool->name); ?> </td> 
                    </tr>

                    <tr>
                    <td>Contact</td>
                    <td><?php echo ucfirst($hschool->reg_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Email</td>
                    <td><?php echo ucfirst($hschool->board); ?> </td> 
                    </tr>

                    </tr>

                    </table>
                    
                </div>

            </div>
        </div>
    </div>
</div>
</section>

</div>

<!-- <div class="form-group"> 
    <div class="col-sm-offset-10 col-sm-10">
        <button type="submit" class="btn btn-primary" id="create_pdf">Generate PDF</button>
    </div>
</div>
 -->
<button type="submit" class="btn btn-primary" id="create_pdf">Generate PDF</button>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="../static/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../static/dist/js/html2canvas.js"></script>
<script src="../static/dist/js/print.js"></script>
</body>
</html>
