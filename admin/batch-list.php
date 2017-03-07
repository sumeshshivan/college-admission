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
  $batch_page = true;
?>


<?php 

    // if ($is_admin) {
    //   include("header_admin.php");
    // } else {
    //   include("header_logedin.php");
    // } 

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
        All Batch List
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Batches</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-7">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
 					<th>Name</th>
 					<th>Year</th>
		            <?php
		              if ($is_admin) {
		                echo "<th></th>";
		              }
		            ?>
                </tr>

                <?php 
		          $batches = Batch::find_all();

		          $index = 1;

		          foreach( $batches as $batch)
		          { 
		        
		              echo "<tr>";
		              echo "<td>{$index}</td>";
		              echo "<td><a href=\"student-list.php?id={$batch->id}\">". ucfirst($batch->name) . "</a></td>";
		              echo "<td><a href=\"student-list.php?id={$batch->id}\">" . $batch->year . "</a></td>";
		              if ($is_admin) {
		                echo "<td><a href=\"batch-delete.php?id={$batch->id}\">" . "Delete" . "</a></td>";

		              }
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

        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New Batch</h3>
                </div>
                <!-- /.box-header -->
            <!-- form start -->
                <form role="form" method="POST" action="batch-add.php">
                    <div class="box-body">
                        <div class="form-group">
                  	         <label for="name">Name:</label>
                  	         <input type="text" class="form-control" id="name" name="name">
                        </div>
               	        <div class="form-group">
                  	         <label for="year">Year:</label>
                  	         <input type="text" class="form-control" id="year" name="year">
                        </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
          <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
  </div>

<?php include("footer.php"); ?>