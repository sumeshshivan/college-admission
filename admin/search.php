<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("Student.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("session.php"); ?>
<?php
  if(!$session->is_logged_in()) {
    redirect_to("login.php");
  } 
?>
<?php include("header_logedin.php"); ?>
<header>
  <section class="main">
    <div id="content">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>Search Results for <?php echo $_GET['search']; ?></h3>
        </div>
      <div class="panel-footer">
        <div id="footer-content">
        <div class="media">
        <?php
          $search = $_GET['search'];
          $keys = explode(" ", $search);
          $students = array();
          foreach( $keys as $key)
          {
           // echo $key . "<hr/>";
         
          $students = array_merge($students,Student::search($key));
          // $members = Member::search($key);
         
          }
          
          $new = array();
          
          foreach( $students as $student)
          {
            if (!in_array($student,$new))
            {
              array_push($new,$student);
            }
          }
          
          if(empty($new))
          {
            echo "<div class=\"alert alert-danger\">No Persons Found</div>";
          }
          else
          {
            echo "<div class=\"alert alert-success\">" . count($new) . " Results Found</div>";
            foreach( $new as $student)
            {
                echo "<a class=\"pull-left\" href=\"student-detail.php?id=" . $student->id . "\">";
                echo  "<h4 class=\"media-heading\">" . ucfirst($student->name) ."</h4>";
                echo "</a>";
            }
          }          
          ?>
         </div>
        </div>
      </div>
     </div>
    </div>
  </section>
</header>

<?php include("footer.php"); ?>
