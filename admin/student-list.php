<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("batch.php"); ?>
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

    if(isset($_GET["id"])) {

        $id=$_GET["id"];
        $batch = Batch::find_by_id($id);

        if (!$batch) {
            redirect_to("batch-list.php?error");
        }

    } else {

        redirect_to("batch-list.php?error");
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
        <?php  echo  ucfirst($batch->name); ?>
        <small>Students List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../admin/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="../admin/batch-list.php"><i class="fa fa-users"></i> Batch</a></li>
        <li class="active">Students</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
 					<th>Name</th>
                    <th>Course</th>
                    <th>status</th>
                    <th></th>
                </tr>

                <?php 

		          $index = 1;

                  $students = $batch->students();
                  foreach( $students as $student)
                  {
                      
                      echo "<tr>";
                      echo "<td>{$index}</td>";
                      echo "<td><a href=\"fill-details.php?id={$student->id}\">". ucfirst($student->name) . "</a></td>";
                      echo "<td><a href=\"fill-details.php?id={$student->id}\">". ucfirst($student->course) . "</a></td>";
                      echo "<td><a href=\"fill-details.php?id={$student->id}\">". ucfirst($student->status) . "</a></td>";
                      echo "<td><a href=\"student-delete-process.php?id={$student->id}\">" . "Delete"."</a></td>";
                      echo "</tr>";

                      $index++;

                  }

	            ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
           <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Student</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="student-add.php?id=<?php echo $batch->id ; ?>" >
                    <div class="box-body">
                        <div class="form-group">
                             <label for="application_no">Application No</label>
                             <input type="text" class="form-control" id="application_no" placeholder="Application No" name="application_no">
                        </div>
                        <div class="form-group">
                             <label for="rank">Enter Entrance Rank</label>
                             <input type="text" class="form-control" id="rank" placeholder="Enter Entrance Rank" name="rank">
                        </div>
                        <div class="form-group">
                             <label for="dob">Date of Birth</label>
                             <input type="text" class="form-control" data-provide="datepicker" name="dob">
                        </div>
                        <div class="form-group">
                             <label for="name">Enter Full Name</label>
                             <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
                        </div>
                        <div class="form-group">
                             <label for="sex">Sex</label>
                              <select class="form-control " id="sex" name="sex">
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                        </div>
                        <div class="form-group">
                             <label for="category">Category</label>
                             <select class="form-control " id="category" name="category">
                                <option>General</option>
                                <option>OBC</option>
                                <option>SC</option>
                                <option>ST</option>
                             </select>
                        </div>
                        <div class="form-group">
                             <label for="graduation">Graduation</label>
                              <select class="form-control" id="graduation" name="graduation">
                                <option disabled selected value> -- select -- </option>
                                <option>UG</option>
                                <option>PG</option>
                              </select>
                        </div>
                        <div class="form-group">
                             <label for="course">Course</label>
                               <select class="form-control " id="course" name="course">
 <!--                                    <option>Computer Science</option>
                                    <option>Civil</option>
                                    <option>Mechanical</option>
                                    <option>MCA</option>
                                    <option>Electronics</option> -->
                               </select>
                        </div>

                    <button type="submit" class="btn btn-default">Submit</button>
            </form>
           </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->
  </div>
<script src="../static/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>

$(document).ready(function(){

  $('#graduation').on('change', function() {
    // alert( this.value );

    if (this.value == "UG") {
      $('#course').html("<option>Computer Science</option><option>Civil</option><option>Mechanical</option>");
    } else if (this.value == "PG") {
      $('#course').html("<option>MCA</option>");
    } else {
       $('#course').html("");
    }

  });
    // $('#graduation').keyup(function(){
    //     var search_term = $(this).val();

    //     if (search_term.length < 3) {
    //       $('.search-result').html("");
    //     } else {
    //         $.get("student-search.php?query=" + search_term , function(data, status){
    //         $('.search-result').html(data);
    //     });
    //     }

    // });
});

</script>

<?php include("footer.php"); ?>