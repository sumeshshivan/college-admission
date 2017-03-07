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
  $staff_page = true;
?>

<?php
  if ($is_admin) {
    include("header_admin.php");
    include("navigation_admin.php");  
  } else {
     redirect_to("../");
  }

  $current_staff = false;

  if(isset($_GET['staff'])) {
    $staff_id = $_GET['staff'];
    $current_staff =  User::find_by_id($staff_id);
  } 

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staffs <a href="../admin/staff-list.php" class="btn btn-primary">Add New Staff</a>
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
         					<th>Type</th>
                  <th></th>
                  <th></th>
                </tr>

                <?php 
		          $staffs = User::find_all();

		          $index = 1;

		          foreach( $staffs as $staff) { 
		        
		              echo "<tr>";
		              echo "<td>{$index}</td>";
		              echo "<td><a href=\"../admin/staff-list.php?staff={$staff->id}\">". ucfirst($staff->username) . "</a></td>";

                  if ($staff->admin) {
                    echo "<td>" . "Admin" . "</td>";
                  } else {
                    echo "<td>" . "Staff" . "</td>";
                  }

		              echo "<td><a href=\"../admin/staff-list.php?staff={$staff->id}\">Edit</a></td>";
                  echo "<td><a href=\"staff-delete.php?id={$staff->id}\">Delete</a></td>";
		              echo "</tr>";

                  $index++;

		          }

	            ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php if($current_staff) echo 'Edit Staff - ' . $current_staff->username ; else echo "Create New Staff"; ?></h3>
                </div>
                <!-- /.box-header -->
            <!-- form start -->
                <form role="form" method="POST" action="staff-add.php<?php if($current_staff) echo '?id=' . $current_staff->id ; ?>">
                    <div class="box-body">
                        <div class="form-group">
                  	         <label for="username">Username:</label>
                  	         <input type="text" class="form-control" placeholder="Username" name="username" value="<?php if($current_staff) echo $current_staff->username ; ?>" required>
                        </div>
                        <div class="form-group">
                              <label>Is Admin <input type="checkbox" name="admin" value="Yes" <?php if($current_staff && $current_staff->admin) echo 'checked' ; ?> /></label>
                        </div>
               	        <div class="form-group">
                  	         <label for="password">Password:</label>
                  	         <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                             <label for="confirmpassword">Password:</label>
                             <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
  </div>

<?php include("footer.php"); ?>