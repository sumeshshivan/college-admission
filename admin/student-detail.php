<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("student.php"); ?>
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
  if ($is_admin) {
    include("header_admin.php");
    include("navigation_admin.php");  
  } else {
    include("header_staff.php");
    include("navigation_staff.php");  
  }

?>

<?php
  $id=$_GET["id"];
  $student = Student::find_by_id($id);
?>

<header>
  <section class="main">

      <div class="panel panel-default">
        <div class="panel-heading">
          <center><h3>Admission List</h3></center>
          <p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Edit</button>
              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Student</h4>
                    </div>
                    <div class="modal-body">
<!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <center>
                      <form class="form-horizontal" method="POST" action="index.php">
    
    <div class="form-group">
        <label class="control-label col-sm-2" for="application_no">Application No:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="application_no" placeholder="Application No" value= <?php echo $student->application_no; ?>   name="application_no">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="rank">Entrance Rank:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="rank" placeholder="Enter Entrance Rank"  value= <?php echo $student->rank; ?>   name="rank">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value= <?php echo $student->dob; ?>   name="dob">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Enter Full Name"  value= <?php echo $student->name; ?>  readonly name="name">
        </div>
    </div>

        <div class="form-group">
              <label class="control-label col-sm-2" for="sex">Sex:</label>
              <div class="col-sm-10">
              <input class="form-control " id="sex" value= <?php echo $student->sex; ?>   name="sex">
              </div>
        </div>

        <div class="form-group">
              <label class="control-label col-sm-2" for="category">Category:</label>
              <div class="col-sm-10">
              <input class="form-control " id="category" value= <?php echo $student->category; ?>   name="category">
               </div>
         </div>

         <div class="form-group">
              <label class="control-label col-sm-2" for="course">Course:</label>
              <div class="col-sm-10">
              <input type="" name="" class="form-control " id="course" value= <?php echo $student->course; ?>  readonly name="course">
                
              </div>
         </div>

         <div class="form-group">
          <label class="control-label col-sm-2" for="house">House:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="house" placeholder="house" name="house">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="place">Place:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="place" placeholder="Place" name="place">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="post">Post:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="post" placeholder="Post" name="post">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="district">District:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="district" placeholder="District" name="district">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="state">State:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="state" placeholder="State" name="state">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pin">Pin:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pin" placeholder="Pin" name="pin">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="adhar_no">Adhar No:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="adhar_no" placeholder="Adhar No" name="adhar_no">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="contact">Contact:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="contact" placeholder="Contact" name="contact">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="date_of_admn">Date of Admission:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value=<?php echo date('Y-m-d'); ?>  name="date_of_admn">
          </div>
        </div>

         <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- <button type="button"  class="btn btn-default" onclick="window.print()"/>Print</button> -->
          </div>
    </div>

</form>
                    </center>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
            </p>

        </div>
      <div class="panel-body">

<div class="row">
    <table class="table">
         <tr>
        <td>Status</td>
        <td><?php echo ($student->status); ?> </td> 
        </tr>
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
        </tr>        <tr>
        <td>Place</td>
        <td><?php echo ucfirst($student->place); ?> </td> 
        </tr>
        <tr>
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
        </tr> <tr>
        <td>Pin</td>
        <td><?php echo ucfirst($student->pin); ?> </td> 
        </tr> <tr>
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
    <form action="POST">
    <input type="checkbox" name="status" value="approved"><br>
    <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Approve</button>
                          </div>
                        </div>
    </form>

      </div>
  </section>
</header>

<?php include("footer.php"); ?>