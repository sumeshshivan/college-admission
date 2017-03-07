<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("member.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("session.php"); ?>
<?php
  if(!$session->is_logged_in()) {
    redirect_to("login.php");
  } 
?>
<?php include("header_logedin.php"); ?>

<?php
  $id=$_GET["id"];
  $member = Member::find_by_id($id);
?>
<header>
  <section class="main">
    <div id="content">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>Person Details</h3>
        </div>
      <div class="panel-footer">
        
       <div id="footer-content">
<?php /*        <ul class="nav nav-tabs">
          <li class="active"><a href="#">Details</a></li>
          <li><a href="#">Certificate</a></li>
        </ul>
*/?>
          <div class="media" >
        <?php
              echo "<div class=\"pull-left\" >";
              echo  "<img class=\"media-object\" src=\"photos/" . $member->photo . "\" width=\"150\">";
              echo "</div>";
              echo "<div class=\"media-body\" id=\"person_details\">";
              if ($member->status == "request")
              {
                echo "<div class=\"alert alert-info\" id=\"approval\">Not Approved</div>";
                echo "<a href=\"approve.php?id=" . $member->id . "\"><button type=\"button\" class=\"btn btn-success\" id=\"approval_button\">APPROVE</button></a>";
              }
              else if ($member->status == "approved")
              {
                echo "<div class=\"alert alert-success\" id=\"approval\">Approved</div>";
                echo "<a href=\"certificate.php?id=" . $member->id . "\"><button type=\"button\" class=\"btn btn-info\" id=\"approval_button\">CIRTIFICATE</button></a>";
              }
              else if ($member->status == "denied")
              {
                echo "<div class=\"alert alert-danger\">Denied</div>";
              }
              
              echo "<table class=\"table\">";
              echo "<tr><td>First Name</td><td>" . ucfirst($member->first_name) . "</td></tr>";
              echo "<tr><td>First Name</td><td>" . ucfirst($member->last_name) . "</td></tr>";
              echo "<tr><td>" . ucfirst($member->guardian_relation) . " of</td><td>" . ucfirst($member->guardian) . "</td></tr>";
              echo "<tr><td>Identification Type</td><td>" . $member->id_type . "</td></tr>";
              echo "<tr><td>Identification Number</td><td>" . $member->id_no . "</td></tr>";
              echo "<tr><td>Sex</td><td>" . $member->sex . "</td></tr>";
              echo "<tr><td>Age</td><td>" . $member->age . "</td></tr>";
              echo "<tr><td>Taluk</td><td>" . $member->taluk . "</td></tr>";
              echo "<tr><td>Village</td><td>" . $member->village . "</td></tr>";
              echo "<tr><td>Identification Mark 1</td><td>" . $member->idmark1 . "</td></tr>";
              echo "<tr><td>Identification Mark 2</td><td>" . $member->idmark2 . "</td></tr>";
              echo "<tr><td>Status</td><td>" . $member->status . "</td></tr>";
              echo "</table>";
              echo "</div>";
            
        ?>
          </div>
        </div>
      </div>
</div>
    </div>
  </section>
</header>

<?php include("footer.php"); ?>
